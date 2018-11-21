<?php

use Illuminate\Http\Request;

Route::post('/add','Api\EditorController@add');
Route::post('/update','Api\EditorController@update');
Route::post('/delete','Api\EditorController@delete');
Route::get('/list','Api\EditorController@list');
Route::get('/listEditor','Api\EditorController@listEditor');
