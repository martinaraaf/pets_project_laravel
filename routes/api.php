<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\API\ClinicController;
use App\Http\Controllers\AuthController;

// use App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;


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






