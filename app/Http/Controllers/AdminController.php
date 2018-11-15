<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    function index(){
        $users = User::where('role','editor')->get();
        return view('admin.home')->with('users',$users);
    }
    function editorView(Request $request){
        $user = User::where('id',$request->id)->first();
        return view('admin.editor.view')->with('user',$user);
    }
    function editorEdit(Request $request){
        $user = User::where('id',$request->id)->first();
        return view('admin.editor.edit')->with('user',$user);
    }
    function editorUpdate(Request $request){
        $user = User::where('id',$request->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        if(isset($request->active)){
            $user->active = 1;
        }else{
            $user->active = 0;
        }
        $user->save();
        return redirect()->route('admin.dashboard');
    }
    function editorDelete(Request $request){
        $user = User::where('id',$request->id)->first();
        $user->delete();
        return redirect()->route('admin.dashboard');
    }
}
