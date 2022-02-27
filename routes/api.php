<?php

use App\Http\Controllers\ProductController2;
use App\Http\Controllers\AuthController2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('products', ProductController2::class);

// Public routes ↓↓
Route::post('/register', [AuhController::class, 'register']);
Route::post('/login', [AuhController::class, 'login']);
Route::get('/products', [ProductController2::class, 'index']);
Route::get('/products/{id}', [ProductController2::class, 'show']);
Route::get('/products/search/{name}', [ProductController2::class, 'search']);

// Protected routes ↓↓
Route::group(['middleware' => ['auth:sanctum']], function () {
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::post('/logout', [AuhController::class, 'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
