<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('pay', 'PayOrderController@store');

Route::get('channels', 'ChannelController@index');
Route::get('posts/create', 'PostController@create');

Route::get('/postcards', function (\App\PostCardSendingService $postCardSendingService) {
    $postCardSendingService->hello('Hello from muhsen maqsudi', 'test@test.com');
});

Route::get('/facades', function () {
    \App\Postcard::hello('234', 'abc');
});
