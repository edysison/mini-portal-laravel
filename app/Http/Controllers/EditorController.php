<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class EditorController extends Controller
{
    function index(){
        $posts = Post::where('user_id',\Auth::id())->get();
        return view('editor.home')->with('posts',$posts);
    }
    function postView(Request $request){
        $post = Post::where('id',$request->id)->first();
        return view('editor.post.view')->with('post',$post);
    }
    function postEdit(Request $request){
        if(!isset($request->id)){
            return view('editor.post.edit');
        }
        $post = Post::where('id',$request->id)->first();
        return view('editor.post.edit')->with('post',$post);
    }
    function postUpdate(Request $request){
        $post = Post::where('id',$request->id)->first();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect()->route('editor.dashboard');
    }
    function postAdd(Request $request){
        $title = Post::where('user_id',\Auth::id())->where('title',$request->title)->first();
        if(isset($title)){
            return redirect()->route('editor.post.edit');
        }
        
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = \Auth::id();
        $post->save();
        return redirect()->route('editor.dashboard');
    }
    function postDelete(Request $request){
        $post = Post::where('id',$request->id)->first();
        $post->delete();
        return redirect()->route('editor.dashboard');
    }
}
