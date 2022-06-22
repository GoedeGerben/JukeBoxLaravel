<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongController;

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

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('/logout', [UserController::class, 'logout'], function () {
    return view('logOut');
})->middleware('auth');

Route::get('/genre/{genre:name}', [SongController::class, 'index'])->middleware('auth');

Route::get('/song/{song:name}', [SongController::class, 'song'])->middleware('auth');

Route::get('/lists', function () {
    return view('list');
})->middleware('auth');

Route::get('/genres', [GenreController::class, 'index'])->middleware('auth');

Route::get('/currentList', function () {
    return view('currentList');
})->middleware('auth');

Route::post('/addToList', [ListController::class, 'addToList'])->middleware('auth');
Route::post('/flushList', [ListController::class, 'flushList'])->middleware('auth');
Route::get('/lists', [ListController::class, 'showList'])->middleware('auth');

