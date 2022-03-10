<?php

use App\Models\Post;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use app\Http\Controllers\PagesController;
use app\Http\Controllers\vehicleController;

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


Route::get('/', 'PagesController@home');

Route::get('/contact', 'PagesController@contact');

Route::get('/about', 'PagesController@about');

Route::get('/showroom', 'VehicleController@showroom');

Route::get('/sandbox', 'PagesController@sandbox');

Route::get('/sandbox', 'PagesController@sandbox');

Route::get('/game', 'PagesController@game');

Route::get('/crudapp', 'PagesController@crudapp');

Route::get('/crudapp/search', 'PagesController@search');

Route::get('/crudapp/edit', 'PagesController@crudedit');
Route::get('/crudapp/edit/{part}', 'PagesController@editpart');
Route::get('/crudapp/edit_parts', 'PagesController@editparts');

Route::put('/crudapp/update_part/{id}', 'PagesController@update');
Route::put('/crudapp/update_parts', 'PagesController@updatemany');

Route::put('/crudapp/create_part', 'PagesController@create');
Route::put('/crudapp/delete_part/{id}', 'PagesController@delete');

Route::get('/crudapp/create', 'PagesController@crudcreate');

Route::get('/posts', function(){
    return view('posts', [
        'posts' => Post::all()
        ]);
});

Route::get('/posts/{post}', function(Post $post){ //can do {post:??} to search for somthing other than id i.e name slug etc..

    return view('post', [
        'post' => $post
    ]);
});

Route::get('/vehicle/{vehicle}', function(Vehicle $vehicle){ //can do {post:??} to search for somthing other than id i.e name slug etc..
    return view('vehicle', [
        'vehicle' => $vehicle
    ]);
});


