<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/thankyou', function () {
    return view('thankyou');
});

Route::prefix('admin')->name('admin.')->middleware('web','auth','auth.admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::prefix('editor')->name('editor.')->group(function(){
        Route::get('/', 'AdminController@index');
        Route::get('/view', 'AdminController@editorView')->name('view');
        Route::get('/edit', 'AdminController@editorEdit')->name('edit');
        Route::post('/update', 'AdminController@editorUpdate')->name('update');
        Route::get('/delete', 'AdminController@editorDelete')->name('delete');    
    }); 
});

Route::prefix('editor')->name('editor.')->middleware('web','auth','auth.editor')->group(function(){
    Route::get('/', 'EditorController@index')->name('dashboard');
});
