<?php

use App\Http\Middleware\userV0;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    'middleware' => userV0::class
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
