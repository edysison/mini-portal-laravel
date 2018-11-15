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
        $users = User::where('id',$request->id)->first();
        return view('admin.editor.view')->with('users',$users);
    }
    function editorEdit(Request $request){
        $users = User::where('id',$request->id)->first();
        return view('admin.editor.edit')->with('users',$users);
    }
    function editorUpdate(Request $request){
        $users = User::where('id',$request->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->active = $request->active;
    }
    function editorDelete(Request $request){

    }
}
