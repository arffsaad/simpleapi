<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Str;
use Auth;

class TestController extends Controller
{
    public function posted(Request $request){
        $cont = $request->input('content');
        Test::create([
            'content' => $cont
        ]);
        return response()->json("success", 201);
    }

    public function retrieve(Request $request, $id){
        $ret = Test::find($id);
        return response()->json([
            'id' => $ret['id'],
            'content' => $ret['content']
        ]);
    }

    public function generate(){
        $newkey = Auth::user();
        $newkey->api_key = str::random(60);
        $newkey->save();
        return view('home');
    }

    public function revoke(){
        $rev = Auth::user();
        $rev->api_key = null;
        $rev->save();
        return view('home');
    }
}
