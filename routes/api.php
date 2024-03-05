<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\API\ClinicController;
use App\Http\Controllers\ApiCategoryController;
use App\Http\Controllers\ApiProudctController;
// use App\Http\Controllers\API;
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

//auth

Route::post('register',[ApiAuthController::class,'register']);
Route::post('login',[ApiAuthController::class,'login']);
Route::post('logout',[ApiAuthController::class,'logout']);
//get all categories api
//http://127.0.0.1:8000/api/categories
Route::get('categories',[ApiCategoryController::class,'all']);

//http://127.0.0.1:8000/api/categories/show/{id}
Route::get('categories/show/{id}',[ApiCategoryController::class,'show']);

// to create new category
//http://127.0.0.1:8000/api/categories/store
Route::post('categories/store',[ApiCategoryController::class,'store']);

//update
//http://127.0.0.1:8000/api/categories/update/{id}/?_method=put i do method post and in params type put
Route::put('categories/update/{id}',[ApiCategoryController::class,'update']);
//delete category
//http://127.0.0.1:8000/api/categories/delete/delete/?_method=DELETE
Route::delete('categories/delete/{id}',[ApiCategoryController::class,'delete']);









//get all proudcts api
//http://127.0.0.1:8000/api/proudcts
Route::get('proudcts',[ApiProudctController::class,'all']);

//http://127.0.0.1:8000/api/proudcts/show/{id}

Route::get('proudcts/show/{id}',[ApiProudctController::class,'show']);

// to create new product
//http://127.0.0.1:8000/api/proudcts/store
Route::post('proudcts/store',[ApiProudctController::class,'store']);
//update product
//http://127.0.0.1:8000/api/proudcts/update/{id}/?_method=put the same in category product about method
Route::put('proudcts/update/{id}',[ApiProudctController::class,'update']);


//http://127.0.0.1:8000/api/proudcts/delete/delete/?_method=DELETE
Route::delete('proudcts/delete/{id}',[ApiProudctController::class,'delete']);

// APIs for clinics
Route::controller(ClinicController::class)->prefix('/clinics')->group(function(){
    // Get all clinics
    // http://127.0.0.1:8000/api/clinics
    Route::get('/', 'index');
    // Search clinics
    // http://127.0.0.1:8000/api/clinics/search
    Route::get('/search', 'search');

    // Get a clinic by ID (optional)
    // http://127.0.0.1:8000/api/clinics/1
    Route::get('/{id}', 'show');
});
