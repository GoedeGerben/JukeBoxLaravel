<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('homePage');
})->middleware('auth');

Route::get('/logout', [UserController::class, 'logout'], function () {
    return view('logOut');
})->middleware('auth');

Route::get('/song', function () {
    return view('song');
})->middleware('auth');

Route::get('/lists', function () {
    return view('list');
})->middleware('auth');

Route::get('/genres', function () {
    return view('genres');
})->middleware('auth');

Route::get('/currentList', function () {
    return view('currentList');
})->middleware('auth');
