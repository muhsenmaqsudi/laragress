<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    dd(Str::snake(class_basename(\App\QueryFilters\Active::class)));
//    return view('welcome');
});

Route::get('pay', 'PayOrderController@store');

Route::get('channels', 'ChannelController@index');
Route::get('posts/create', 'PostController@create');

Route::get('/postcards', function (\App\PostCardSendingService $postCardSendingService) {
    $postCardSendingService->hello('Hello from muhsen maqsudi', 'test@test.com');
});

Route::get('/reflection', function () {
   $reflectedClass = new ReflectionClass(\App\Http\Controllers\HomeController::class);
   dd($reflectedClass->getMethods());
});

Route::__callStatic('get', array('/test', function() {
    return 'testing';
}));

\Illuminate\Support\Facades\App::make('router')->get('/test2', function () {
   return 'testing2';
});


Route::get('/facades', function () {
    app()->make('cache')->put('test', '123');
    dd(\Illuminate\Support\Facades\Cache::get('test'));
//    \App\Postcard::hello('234', 'abc');
});

Route::get('example', function () {
    return view('example', [
        'info' => 'Very cool information'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Laravel socialite
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('collections', 'CollectionController@index');

Route::get('posts', 'PostController@index');
Route::get('post/{postId}', 'PostController@show');

Route::get('posts-filter', 'FilterPostsController');


Route::get('macros', function () {
//    return \Illuminate\Support\Str::partNumber(12323252526323);
//    return \Illuminate\Support\Str::prefix('last', 'prefix');
//    return \Illuminate\Support\Facades\Response::errorJson('testing');
});

Route::get('email', 'EmailController@sendEmail');

Route::prefix('api-resources')->group(function () {
    Route::get('users', function () {
        return new \App\Http\Resources\UserCollection(\App\User::all()->load('posts'));
    });
    Route::get('posts', function () {
        return new \App\Http\Resources\PostCollection(\App\Post::all()->load('user'));
    });
    Route::get('user', function () {
        return new \App\Http\Resources\UserResource(\App\User::find(1)->load('posts'));
    });
    Route::get('post', function () {
        return new \App\Http\Resources\PostResource(\App\Post::find(1)->load('user'));
    });
});

Route::prefix('broadcasting')->group(function () {
    Route::get('/fire', function () {
        event(new \App\Events\TestEvent());
        return 'ok';
    });
    Route::view('/socketio', 'broadcasting.socketio');
});


Route::view('login', 'login');
Route::post('login', 'AuthController@login')->name('login');
