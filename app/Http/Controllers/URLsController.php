<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Urls;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;


class URLsController extends Controller
{
     public function index()
    {
        $urls = Urls::orderBy('id','asc')->paginate(10);
        return view('urls.index', compact('urls'));
    }

    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'original_url' =>'required|url'
         ]);

         if($validator->fails()){
             return redirect()->back()->with('error','All fields should be completed');
         }

        do{
            $code = Str::random(6);
        }while(Urls::where('shorten_url',$code)->exists());

         $url= Urls::create([
            'original_url'=>$request->original_url,
            'shorten_url'=> $code
         ]);

         if(!$url){
            return redirect()->back()->with('error','Error creating register');
         }

        return redirect()->back()->with(
            'success','url saved succesfully');

    }


    public function show($shorten_url)
    {

        $url = Urls::where('shorten_url',$shorten_url)->first();

        if(!$url){
            return redirect()->back()->with('error','URL not found');
        }
        return redirect()->to(
            $url->original_url);
    }

 

    public function update(Request $request, $id)
    {
        $url = Urls::find($id);

        if(!$url){
            return redirect()->back()->with('error','url not found');
        }

        $validator= Validator::make($request->all(),[
            'original_url' =>'required|url'
        ]);

        if($validator->fails()){
             return redirect()->back()->with('error','All fields should be completed');
        }

        do{
            $code = Str::random(6);
        }while(Urls::where('shorten_url',$code)->exists());


        $url->original_url=$request->original_url;
        $url->shorten_url=$code;

        $url->save();

        return redirect()->back()->with(
            'success','url updated succesfully');
        
    }

    public function destroy($id)
    {
        $url = Urls::find($id);
        
        if(!$url){
            return redirect()->back()->with('error','url not found');
        }

        $url->delete();

         return redirect()->back()->with(
            'success','url deleted succesfully');
    }

    public function redirect($shorten_url){
        $url = Urls::where('shorten_url',$shorten_url)->first();

        if(!$url){
            return response()->json(['message'=>'url not found']);
        }

        return redirect()->away($url->original_url,302);
    }


    

}
