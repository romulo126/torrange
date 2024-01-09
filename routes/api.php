<?php

use App\Http\Middleware\userMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\tokenApiMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => userMiddleware::class
], function () {
    Route::group([
        'prefix' => '/search',
        'namespace' => 'App\Http\Controllers\Api'
    ], function () {
        Route::get('/categoria/{categoria}/{subCategoria?}', 'CategoriaController')->name('api.categoria');
        Route::get('/{search}', 'SearchController')->name('api.search');

    });
    
    Route::group([
        'prefix' => '/torrange',
        'namespace' => 'App\Http\Controllers\Api'
    ], function () {
        Route::get('/destaque', 'DestaqueController')->name('api.destaque');
        Route::get('/{id}', 'TorrentController')->name('api.torrent');
        Route::get('/download/{id}', 'TorrentDownloadController')->name('api.torrent.download');
    });
});

Route::group([
    'namespace' => 'App\Http\Controllers\Api'
],function () {
    // Route::post('register', 'RegisterUserController');
    Route::post('login', 'LoginUserController')->name('api.login');
});

Route::group([
    'prefix' => '/stream',
    'middleware' => tokenApiMiddleware::class,
    'namespace' => 'App\Http\Controllers\Stream'
], function () {
    Route::get('/search/{name}', 'DestaqueController')->name('api.token.destaque');
});