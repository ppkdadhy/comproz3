<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { // simbol '/' itu adalah root nya
    return view('welcome', ['title' => 'Belajar Laravel 10']); // meretrun file welcome yang berada di folder resource>views>welcome.blade.php
});
Route::get('/home', function(){
    return view('home');
});
Route::get('/edulevels', 'App\Http\Controllers\EdulevelController@data');//data itu method
Route::get('/edulevels/add', 'App\Http\Controllers\EdulevelController@add');//add itu method
Route::post('/edulevels', 'App\Http\Controllers\EdulevelController@addProcess');

//Edit
Route::get('/edulevels/edit/{id}', 'App\Http\Controllers\EdulevelController@edit');
Route::patch('/edulevels/{id}', 'App\Http\Controllers\EdulevelController@editProcess');

//Delete
Route::delete('/edulevels/{id}', 'App\Http\Controllers\EdulevelController@delete');
 
Route::get('/programs/trash', 'App\Http\Controllers\ProgramController@trash');//peletakan get diatas sebelum resource, kalau setelah resource tidak akan tampil
Route::get('/programs/restore/{id?}', 'App\Http\Controllers\ProgramController@restore');
Route::get('/programs/delete/{id?}', 'App\Http\Controllers\ProgramController@delete');
Route::resource('/programs', 'App\Http\Controllers\ProgramController');
