<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;

class EditorController extends Controller
{
    public function list(Request $request){
        $post = Post::get();
        return response()->json(['sucess'=>true,'post'=>$post]);
    }
    public function listEditor(Request $request){
        $post = User::where('role','editor')->get();
        return response()->json(['sucess'=>true,'post'=>$post]);
    }
    public function update(Request $request){
        $post = Post::where('id',$request->id)->first();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return response()->json(['sucess'=>true]);
    }
    public function add(Request $request){
        $title = Post::where('user_id',\Auth::id())->where('title',$request->title)->first();
        if(isset($title)){
            return response()->json(['error'=>true]);    
        }
        
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->save();
        return response()->json(['sucess'=>true]);
    }
    public function delete(Request $request){
        $post = Post::where('id',$request->id)->first();
        $post->delete();
        return response()->json(['sucess'=>true]);
    }
}
