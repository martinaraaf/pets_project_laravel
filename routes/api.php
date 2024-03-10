<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\API\ClinicController;
use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


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


Route::get('user', [ApiAuthController::class, 'getUser']);



Route::middleware('api.auth')->group(function(){

    Route::post('logout',[ApiAuthController::class,'logout']);
    //update
    //http://127.0.0.1:8000/api/categories/update/{id}/?_method=put i do method post and in params type put
    Route::put('categories/update/{id}',[ApiCategoryController::class,'update']);
    // to create new category
    //http://127.0.0.1:8000/api/categories/store
    Route::post('categories/store',[ApiCategoryController::class,'store']);
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
});


//auth
Route::post('register',[ApiAuthController::class,'register']);
Route::get('allUsers',[ApiAuthController::class,'allUsers']);

Route::post('login',[ApiAuthController::class,'login']);
// Route::get('login',[ApiAuthController::class,'login']);




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


// Route::controller(CartController::class)->prefix('/carts')->group(function(){
Route::middleware('api.auth')->controller(CartController::class)->prefix('carts')->group(function(){
    // APIs for cart
    // 1) add item to cart
    // http://127.0.0.1:8000/api/carts/add
    Route::post('/add', 'addToCart');

    // 2) retrive cart items
    // http://127.0.0.1:8000/api/carts/{id}
    Route::get('/{id}', 'getCart');

    // 3) update quantity of specific item in the cart
    // http://127.0.0.1:8000/api/carts/edit/id
    Route::post('/edit/{id}', 'updateCart');

    // 4) delete item in the cart
    // http://127.0.0.1:8000/api/cart/id
    Route::delete('/{user_id}/{id}', 'deleteCartItem');

    // 5) transfere cart items from the cart to the Order table
    // http://127.0.0.1:8000/api/carts/{id}
    Route::post('/checkout/{id}', 'checkout');
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
Route::get('/user', 'user_animals');

Route::get('/{animel_type?}','By_Name');
Route::put('/{id}','update');
Route::delete('/{id}', 'destroy');
});




Route::get('/animals/new/{id}', [AnimalController::class, 'getAnimalById']);
Route::get('/animals', [AnimalController::class, 'All_animals']);



Route::controller(PostController::class)->prefix('/posts')->group(function(){
    Route::get('/', 'index');
    Route::get('/user', 'user_posts');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::delete('/{id}', 'destroy');


});


Route::get('/posts/{postId}/comments', [CommentControll::class,'index']);
Route::post('/posts/{postId}/comments', [CommentController::class,'store']);
