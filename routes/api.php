<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\CollectionController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductUrlController;
use App\Http\Middleware\UnauthorizedJsonResponse;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product/url/{id}', [ProductUrlController::class, 'urls'])->name('api.product.urls');

//todo: ograniczyć api tylko do zalogowanych adminów

//Route::middleware(UnauthorizedJsonResponse::class)->group(function () {
Route::get('/applications', [ApplicationController::class, 'index'])->name('api.app');

Route::get('/collection', [CollectionController::class, 'index'])->name('api.collection');
Route::post('/collection', [CollectionController::class, 'add'])->name('api.collection.add');
Route::put('/collection', [CollectionController::class, 'update'])->name('api.collection.update');
Route::delete('/collection/{collection}', [CollectionController::class, 'delete'])->name('api.collection.delete');

Route::get('/product', [ProductController::class, 'index'])->name('api.product');
Route::post('/product', [ProductController::class, 'add'])->name('api.product.add');
Route::put('/product', [ProductController::class, 'update'])->name('api.product.update');
Route::delete('/product/{product}', [ProductController::class, 'delete'])->name('api.product.delete');
//});

