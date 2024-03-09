<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\API\ClinicController;
use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\ApiCategoryController;
use App\Http\Controllers\ApiProudctController;

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





Route::middleware('api.auth')->group(function(){

    Route::post('logout',[ApiAuthController::class,'logout']);
    //update
    //http://127.0.0.1:8000/api/categories/update/{id}/?_method=put i do method post and in params type put
    Route::put('categories/update/{id}',[ApiCategoryController::class,'update']);
    // to create new category
    //http://127.0.0.1:8000/api/categories/store
    Route::post('categories/store',[ApiCategoryController::class,'store']);
});


//delete category
//http://127.0.0.1:8000/api/categories/delete/delete/?_method=DELETE
Route::delete('categories/delete/{id}',[ApiCategoryController::class,'delete']);
// to create new product
//http://127.0.0.1:8000/api/proudcts/store
Route::post('proudcts/store',[ApiProudctController::class,'store']);


//http://127.0.0.1:8000/api/proudcts/delete/delete/?_method=DELETE
Route::delete('proudcts/delete/{id}',[ApiProudctController::class,'delete']);
//update product
//http://127.0.0.1:8000/api/proudcts/update/{id}/?_method=put the same in category product about method
Route::put('proudcts/update/{id}',[ApiProudctController::class,'update']);
//auth
Route::post('register',[ApiAuthController::class,'register']);
Route::post('login',[ApiAuthController::class,'login']);


//get all categories api
//http://127.0.0.1:8000/api/categories
Route::get('categories',[ApiCategoryController::class,'all']);

//http://127.0.0.1:8000/api/categories/show/{id}
Route::get('categories/show/{id}',[ApiCategoryController::class,'show']);


//get all proudcts api
//http://127.0.0.1:8000/api/proudcts
Route::get('proudcts',[ApiProudctController::class,'all']);

//http://127.0.0.1:8000/api/proudcts/show/{id}

Route::get('proudcts/show/{id}',[ApiProudctController::class,'show']);


//search
//http://127.0.0.1:8000/api/products/search
Route::get('products/search',[ApiProudctController::class,'search'] )->name('apiProductsSearch');


Route::controller(CartController::class)->prefix('/carts')->group(function(){
// Route::middleware('auth:sanctum')->controller(CartController::class)->prefix('/carts')->group(function(){
    // APIs for cart
    // 1) add item to cart
    // http://127.0.0.1:8000/api/carts/add
    Route::post('/add', 'addToCart');

    // 2) retrive cart items
    // http://127.0.0.1:8000/api/cart/
    Route::get('/', 'getCart');

    // 3) update quantity of specific item in the cart
    // http://127.0.0.1:8000/api/cart/id
    Route::put('/{id}', 'updateCart');

    // 3) delete item in the cart
    // http://127.0.0.1:8000/api/cart/id
    Route::delete('/{id}', 'deleteCartItem');
});


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


Route::controller(AnimalController::class)->prefix('/animals')->group(function(){
Route::post('/', 'create');
Route::get('/', 'All_animals');
Route::get('/new/{id}', [AnimalController::class, 'getAnimalById']);
Route::get('/{animel_type?}','By_Name');
Route::put('/{id}','update');
Route::delete('/{id}', 'destroy');
});


Route::controller(PostController::class)->prefix('/posts')->group(function(){
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::delete('/{id}', 'destroy');


});


Route::get('/posts/{postId}/comments', [CommentControll::class,'index']);
Route::post('/posts/{postId}/comments', [CommentController::class,'store']);
