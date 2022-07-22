<?php

use App\Http\Controllers\Api\ApplicationController;
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

//Route::middleware(UnauthorizedJsonResponse::class)->group(function () {
    Route::get('/applications', [ApplicationController::class, 'index'])->name('api.app');
//});

