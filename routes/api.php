<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// GRUPO PRUEBAS UNITARIAS
Route::group([
	"prefix" => "v1",
    "namespace" => "Api\V1",
    "middleware" => ["auth:api"]
], function(){
    Route::apiResources([
        'posts' => 'PostController',
        'users' => 'UserController'
    ]);

    Route::get('posts/{post}/relationships/user', 'PostRelationShipController@user')
        ->name('posts.relationships.user');

    Route::get('posts/{post}/user', 'PostRelationShipController@user')
        ->name('posts.user');

    Route::get('posts/{post}/relationships/comments', 'PostRelationShipController@comments')
        ->name('posts.relationships.comments');

    Route::get('posts/{post}/comments', 'PostRelationShipController@comments')
        ->name('posts.comments');

});

Route::post('login', 'Api\AuthController@login');
Route::post('signup', 'Api\AuthController@signup');
