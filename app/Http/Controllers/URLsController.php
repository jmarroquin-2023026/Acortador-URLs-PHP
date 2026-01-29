<?php

namespace App\Http\Controllers;

use App\Http\Requests\Url\StoreUrlRequest;
use App\Http\Requests\Url\UpdateUrlRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Urls;


class URLsController extends Controller
{
     public function index()
    {
        $urls = Urls::orderBy('id','asc')->paginate(10);
        return view('urls.index', compact('urls'));
    }

    public function store(StoreUrlRequest $request)
    {
        do{
            $code = Str::random(6);
        }while(Urls::where('shorten_url',$code)->exists());

         $url= Urls::create([
            'original_url'=>$request->original_url,
            'shorten_url'=> $code
         ]);
        return redirect()->back()->with(
            'success','URL registrada correctamente');
    }


    public function show($shorten_url)
    {

        $url = Urls::where('shorten_url',$shorten_url)->first();

        if(!$url){
            return redirect()->route('urls.index')
            ->with('error', 'No se encontraron coincidencias para ese código.');
    }

    return view('urls.index', [
        'urls' => Urls::orderBy('id','asc')->paginate(10),
        'searched_url' => $url
    ]);
    }

 

    public function update(UpdateUrlRequest $request, $id)
    {
        $url = Urls::find($id);

        $url->original_url=$request->original_url;

        $url->save();

        return redirect()->back()->with(
            'success','URL registrada correctamente');
        
    }

    public function destroy($id)
    {
        $url = Urls::findOrFail($id);

        $url->delete();

         return redirect()->back()->with(
            'success','url deleted succesfully');
    }

    public function redirect($shorten_url){
        $url = Urls::where('shorten_url',$shorten_url)->firstOrFail();

        if(!$url){
            return response()->json(['message'=>'url not found']);
        }

        return redirect()->away($url->original_url,302);
    }



    public function metrics()
    {
        $urls = Urls::withCount('metrics')->get();

        return view('urls.metrics', compact('urls'));
    }

    public function metricsDetails(string $shorten_url)
    {
        $url = Urls::where('shorten_url',$shorten_url)->with('metrics')
        ->firstOrFail();

        return view('urls.metrics-details',compact('url'));
    }

}
