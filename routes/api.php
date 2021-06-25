<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\NvproductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


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

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });


});

Route::post('addproduct',[ProductController::class,'store']);
Route::get('product',[ProductController::class,'index']);
Route::delete('deletepro/{id}',[ProductController::class,'destroy']);

Route::get('/products',[ProductController::class,'index']);
Route::get('/purchase',[UserController::class,'purchase']);

Route::post('addcategory',[CategoryController::class,'store']);
Route::get('category',[CategoryController::class,'index']);
Route::delete('deletecat/{id}',[CategoryController::class,'destroy']);


Route::post('addnvproduct',[NvproductController::class,'store']);
Route::get('nvproduct',[NvproductController::class,'index']);
Route::delete('deletenvpro/{id}',[NvproductController::class,'destroy']);

Route::post('/login', [AuthController::class,'login']);
Route::post('/register', [AuthController::class,'register']);

Route::post('/logout', [AuthController::class,'logout']);
