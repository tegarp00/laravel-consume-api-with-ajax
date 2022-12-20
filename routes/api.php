<?php

use App\Http\Controllers\Backend\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PenggunaController;
use App\Http\Controllers\Backend\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ajax
Route::post("/pengguna/{id}", [PenggunaController::class, "destroy"]);
Route::post("/pengguna/{id}", [PenggunaController::class, 'update']);
// produk
Route::post("/product/{id}", [ProductController::class, 'update']);
Route::post("/product/{id}", [ProductController::class, 'destroy']);

// user
Route::get("/pengguna/list", [PenggunaController::class, 'index']);
Route::get("/pengguna/{id}", [PenggunaController::class, 'show']);
Route::post("/pengguna", [PenggunaController::class, 'store']);
Route::put("/pengguna/{id}", [PenggunaController::class, 'update']);
Route::delete("/pengguna/{id}", [PenggunaController::class, 'destroy']);


// product
Route::get("/product/list", [ProductController::class, 'index']);
Route::get("/product/{id}", [ProductController::class, 'show']);
Route::post("/product", [ProductController::class, 'store']);
Route::put("/product/{id}", [ProductController::class, 'update']);
Route::delete("/product/{id}", [ProductController::class, 'destroy']);

// article
Route::get("/article/list", [ArticleController::class, 'index']);
Route::get("/article/{id}", [ArticleController::class, 'show']);
Route::post("/article", [ArticleController::class, 'store']);
Route::put("/article/{id}", [ArticleController::class, 'update']);
Route::delete("/article/{id}", [ArticleController::class, 'destroy']);