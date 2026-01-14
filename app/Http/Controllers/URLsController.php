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
       $urls = Urls::all();
        if($urls->isEmpty()){
            return response()->back()->with('error','Urls not founds',404);
        };

        return response()->back()->with('success','URLs found successfully',200);
        
    }

    public function store(Request $request)
    {

        $code = Str::random(6);
        $validator= Validator::make($request->all(),[
            'original_url' =>'required|url'
         ]);

         if($validator->fails()){
             return redirect()->back()->with('error','All fields should be completed',400);
         }

         $url= Urls::create([
            'original_url'=>$request->original_url,
            'shorten_url'=> $code
         ]);

         if(!$url){
            return redirect()->back()->withc('error','Error creating register',400);
         }

        return redirect()->back()->with(
            'success','url saved succesfully'
            
        ,200);

    }


    public function show($id)
    {

        $url = Urls::find($id);

        if(!$url){
            return redirect()->back()->with('error');
        }
        return redirect()->back()->with(
            'found_url',$url);
    }



    public function update(Request $request, $id)
    {
        $url = Urls::find($id);
        $code = Str::random(6);

        if(!$url){
            return redirect()->back()->with('error','url not found',404);
        }

        $validator= Validator::make($request->all(),[
            'original_url' =>'required|url'
        ]);

        if($validator->fails()){
             return redirect()->back()->with('error','All fields should be completed',400);
        }

        $url->original_url=$request->original_url;
        $url->shorten_url=$code;

        $url->save();

        return redirect()->back()->with(
            'success','url updated succesfully'
            
        ,200);
        
    }

    public function destroy($id)
    {
        $url = Urls::find($id);
        
        if(!$url){
            return redirect()->back()->with('error','url not found',404);
        }

        $url->delete();

         return redirect()->back()->with(
            'success','url deleted succesfully'
            
        ,200);
    }

    public function redirect($shorten_url){
        $url = Urls::where('shorten_url',$shorten_url)->first();

        if(!$url){
            return response()->json(['message'=>'url not found'],404);
        }

        return redirect()->away($url->original_url,302);
    }

    public function dashboard()
{
    $urls = Urls::orderBy('id','asc')->paginate(10);
    return view('dashboard', compact('urls'));
}

}
