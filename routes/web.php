<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProudctController;
use App\Http\Middleware\IsAdmin;
use App\Models\Proudct;
use App\Http\Controllers\ImageController;
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

//categoeies
//showall
//read
Route::get("categories",[CategoryController::class,"all"]);
Route::get('categories/show/{id}', [CategoryController::class, 'show']);

//insert
Route::get("categories/create",[CategoryController::class,"create"]);
Route::post("categories",[CategoryController::class,"store"]);
//update
Route::get("categories/edit/{id}",[CategoryController::class,"edit"]);
Route::put("categories/{id}",[CategoryController::class,"update"]);
//delete
Route::delete("categories/{id}",[CategoryController::class,"delete"]);

//proudcts
Route::controller(ProudctController::class)->group(function(){
    // Route::middleware(IsAdmin::class)->group(function(){
    //all
    Route::get('proudcts/all',"all")->name('allProudct');
    Route::get('proudcts/show/{id}',"show")->name('showProudct');
    //create
    Route::get('proudcts/create',"create")->name('createProudct');
    Route::post('products',"store")->name('storeProudct');
    //edit and updatda
    Route::get('proudcts/edit/{id}',"edit")->name('editProudct');
    Route::put('proudcts/{id}/update',"updata")->name('updateProudct');
    //delete
    Route::delete('proudcts/delete/{id}',"delete");
});
// });

Route::controller(ImageController::class)->group(function(){
    Route::get('/image-upload', 'index')->name('image.form');
    Route::post('/upload-image', 'storeImage')->name('image.store');
});




Route::get('/', function () {
    return view('welcome');
});
