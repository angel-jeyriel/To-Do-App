<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Login;
use App\Http\Livewire\Logout;
use App\Http\Livewire\Signin;
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
    return view('app');
})->middleware('auth')->name('dashboard');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/signup', [AuthController::class, 'signin'])->name('signin');

    Route::post('/signup', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
