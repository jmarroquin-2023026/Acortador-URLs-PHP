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
            return response()->json(['message'=>'Urls not founds'],404);
        };

        return response()->json(['data'=>$urls],200);
        
    }

    public function store(Request $request)
    {

        $code = Str::random(6);
        $validator= Validator::make($request->all(),[
            'original_url' =>'required|url'
         ]);

         if($validator->fails()){
             return response()->json(['message'=>'All fields should be completed'],400);
         }

         $url= Urls::create([
            'original_url'=>$request->original_url,
            'shorten_url'=> $code
         ]);

         if(!$url){
            return response()->json(['message'=>'Error creating register'],400);
         }

        return response()->json([
            'message'=>'url saved succesfully',
            'data'=>$url,
            'NewUrl'=>"http://localhost:8000/api/$code"
            
        ],200);

    }


    public function show($id)
    {
        $url = Urls::find($id);

        if(!$url){
            return response()->json(['message'=>'url not found'],404);
        }
        return response()->json([
            'message:'=>'URL found',
            'data'=>$url,
        ],200);
    }



    public function update(Request $request, $id)
    {
        $url = Urls::find($id);
        $code = Str::random(6);

        if(!$url){
            return response()->json(['message'=>'url not found'],404);
        }

        $validator= Validator::make($request->all(),[
            'original_url' =>'required|url'
        ]);

        if($validator->fails()){
             return response()->json(['message'=>'All fields should be completed'],400);
        }

        $url->original_url=$request->original_url;
        $url->shorten_url=$code;

        $url->save();

        return response()->json([
        'message' => 'URL updated successfully',
        'data' => $url,
    ], 200);
        
    }

    public function destroy($id)
    {
        $url = Urls::find($id);
        
        if(!$url){
            return response()->json(['message'=>'url not found'],404);
        }

        $url->delete();

        return response()->json([
            'message'=>'url found and deleted successfully',
        ],200);
    }

    public function redirect($shorten_url){
        $url = Urls::where('shorten_url',$shorten_url)->first();

        if(!$url){
            return response()->json(['message'=>'url not found'],404);
        }

        return redirect()->away($url->original_url,302);
    }
}
