<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/home', function () {
    return view('homePage');
})->middleware('auth.basic');

Route::get('/logout', [UserController::class, 'logout'], function () {
    return view('logOut');
})->middleware('auth.basic');

Route::get('/song', function () {
    return view('song');
})->middleware('auth.basic');

Route::get('/lists', function () {
    return view('list');
})->middleware('auth.basic');

Route::get('/genres', function () {
    return view('genres');
})->middleware('auth.basic');

Route::get('/currentList', function () {
    return view('currentList');
})->middleware('auth.basic');
