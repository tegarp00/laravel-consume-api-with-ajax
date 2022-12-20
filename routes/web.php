<?php

use App\Http\Controllers\ProductController;
use App\Models\TableProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

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
// user
Route::get("/usejeq", function () {
  return view("frontend.index");
})->name('index');

Route::get("/usejeq/add", function () {
  return view("frontend.add");
})->name('add');

Route::get("/usejeq/detail/{id}", function () {
  return view("frontend.show");
})->name('detail');

// produk
Route::get("/usejeq/products", function () {
  return view("produk.index");
})->name('index');

Route::get("/usejeq/product/create", function () {
  return view("produk.add");
})->name('add');

Route::get("/usejeq/products/{id}", function () {
  return view("produk.show");
})->name('detail');


Route::get('/', function () {
        $produk = TableProduct::paginate(10);

        return view('list', [
            'produk' => $produk
        ]);
});

Route::any("/login", [AuthController::class, "login"])->name("login")->middleware(["noAuth"]);
Route::any("/logout", [AuthController::class, "logout"])->name("logout")->middleware(["withAuth"]);

Route::prefix("product")
  -> name("product.")
  -> controller(ProductController::class)
  ->group(function () {
  Route::any('/upload', 'upload')->name("upload")->middleware(["withAuth"]);
  Route::post('/upload', 'createProduct')->name("createProduct");
  Route::get('/list', 'index')->name("index");
  Route::get('/list/detail/{id}', 'detailProduct')->name("detailProduct");
  Route::get('/list/detail/edit/{id}', 'updateProdct')->name("updateProdct")->middleware(["withAuth"]);
  Route::post('/list/detail/edit/{id}', 'updateProduct')->name("updateProduct");
  Route::get('/list/delete/{id}', 'deleteProduct')->name("deleteProduct")->middleware(["withAuth"]);
});


Route::prefix("blog")
  ->name("blog.")
  ->controller(BlogController::class)
  ->group(function() {
    Route::get('/', 'index')->name("index");
    Route::get('/create', 'createArticle')->name("create")->middleware(["withAuth"]);
    Route::get('/detail/{id}', 'detailArticle')->name("detail");
    Route::get('/edit/{id}', 'editArticle')->name("edit")->middleware(["withAuth"]);

    Route::post('/create', 'postArticle')->name("post")->middleware(["withAuth"]);
    Route::put('/update/{id}', 'updateArticle')->name("update")->middleware(["withAuth"]);
    Route::get('/delete/{id}', 'deleteArticle')->name("delete")->middleware(["withAuth"]);
  });