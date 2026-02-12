<?php

namespace App\Http\Controllers;

use App\Http\Requests\Url\StoreUrlRequest;
use App\Http\Requests\Url\UpdateUrlRequest;
use App\Models\Urls;
use Illuminate\Support\Str;

class URLsController extends Controller
{
    public function index()
    {
        $urls = Urls::orderBy('id', 'asc')->paginate(10);
        $searched_url = session('searched_url');

        return view('urls.index', compact('urls', 'searched_url'));
    }

    public function store(StoreUrlRequest $request)
    {
        do {
            $code = Str::random(6);
        } while (Urls::where('shorten_url', $code)->exists());

        $url = Urls::create([
            'original_url' => $request->original_url,
            'shorten_url' => $code,
        ]);

        return redirect()->back()->with(
            'success', 'URL registrada correctamente');
    }

    public function show($shorten_url)
    {

        $url = Urls::where('shorten_url', $shorten_url)->first();

        if (! $url) {
            return redirect()->route('urls.index')
                ->with('error', 'No se encontraron coincidencias para ese código.');
        }
        session()->flash('searched_url', $url);

        return redirect()->route('urls.index');
    }

    public function update(UpdateUrlRequest $request, $id)
    {
        $url = Urls::find($id);

        $url->original_url = $request->original_url;

        $url->save();

        return redirect()->back()->with(
            'success', 'URL actualizada correctamente');

    }

    public function destroy($id)
    {
        $url = Urls::findOrFail($id);

        $url->delete();

        return redirect()->back()->with(
            'success', 'URL eliminada correctamente');
    }

    public function redirect($shorten_url)
    {
        $url = Urls::where('shorten_url', $shorten_url)->firstOrFail();

        if (! $url) {
            return response()->json(['message' => 'url not found']);
        }

        return redirect()->away($url->original_url, 302);
    }

    public function metrics()
    {
        $urls = Urls::withCount('metrics')->paginate(10);

        return view('urls.metrics', compact('urls'));
    }

    public function metricsDetails(string $shorten_url)
    {
        $url = Urls::where('shorten_url', $shorten_url)->with('metrics')
            ->firstOrFail();
        $metrics = $url->metrics()->latest()->paginate(10);

        return view('urls.metrics-details', compact('url', 'metrics'));
    }
}
