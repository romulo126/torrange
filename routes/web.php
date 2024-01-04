<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\userV0;

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
Route::group([
    'namespace' => 'App\Http\Controllers\Web'
], function () {
    Route::get('/login', 'LoginController')->name('web.login');
    Route::post('/sign', 'LoginPostController')->name('web.login.post');
});

Route::group([
    'prefix' => '/',
    'namespace' => 'App\Http\Controllers\Web',
    'middleware' => userV0::class
], function () {
    Route::get('/', 'DestaqueController')->name('web.index');
    Route::get('/destaque', 'DestaqueController')->name('web.destaque');
    Route::get('/serch/categoria/{categoria}/{subCategoria?}', 'CategoriaController')->name('web.categoria');
    Route::get('/serch/{search}', 'SearchController')->name('web.serch');
    Route::get('/torrange/{id}', 'TorrentController')->name('web.torrents');
});