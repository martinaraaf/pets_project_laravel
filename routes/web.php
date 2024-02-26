<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('guest')->group(
    function(){
        Route::get('register',[AuthController::class,'registerForm'])->name('registerForm');
        Route::post('register',[AuthController::class,'register'])->name('register');

        Route::get('login',[AuthController::class,'loginForm'])->name('loginForm');
        Route::post('login',[AuthController::class,'login'])->name('login');
    });
Route::post('logout',[AuthController::class,'logout']);

Route::get('users',[AuthController::class,'allUsers'])->middleware('isAdmin','auth');



Route::get('/', function () {
    return view('welcome');
});
