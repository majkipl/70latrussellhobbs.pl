<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\ThxController;
use App\Http\Middleware\VerifyCsrfTokenForFormSave;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kontakt', [HomeController::class, 'index'])->name('home.contact');
Route::get('/poznaj-nasze-produkty', [HomeController::class, 'index'])->name('home.products');

Route::post('/kontakt/wyslij', [ContactController::class, 'send'])->name('contact.send');

Route::get('/dodaj-zgloszenie', [ApplicationController::class, 'index'])->name('form');
Route::post('/dodaj-zgloszenie/zapisz', [ApplicationController::class, 'store'])->middleware(VerifyCsrfTokenForFormSave::class)->name('form.save');
Route::get('/dodaj-zgloszenie/dziekujemy/{id}', [ThxController::class, 'index'])->name('thx.app');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/panel', [PanelController::class, 'index'])->name('panel');

    // isAdmin // \App\Providers\AuthServiceProvider
    Route::middleware(['can:isAdmin'])->group(function () {
        Route::get('/panel/zgloszenia', [\App\Http\Controllers\Panel\ApplicationController::class, 'index'])->name('panel.apps');
        Route::get('/panel/zgloszenie/{id}', [\App\Http\Controllers\Panel\ApplicationController::class, 'show'])->name('panel.app.show');

        Route::get('/panel/kolekcja', [\App\Http\Controllers\Panel\CollectionController::class, 'index'])->name('panel.collection');
        Route::get('/panel/kolekcja/dodaj', [\App\Http\Controllers\Panel\CollectionController::class, 'create'])->name('panel.collection.create');
        Route::get('/panel/kolekcja/zmien/{collection}', [\App\Http\Controllers\Panel\CollectionController::class, 'edit'])->name('panel.collection.edit');
        Route::get('/panel/kolekcja/{collection}', [\App\Http\Controllers\Panel\CollectionController::class, 'show'])->name('panel.collection.show');


        Route::get('/panel/produkt', [ProductController::class, 'index'])->name('panel.product');
        Route::get('/panel/produkt/dodaj', [ProductController::class, 'create'])->name('panel.product.create');
        Route::get('/panel/produkt/zmien/{product}', [ProductController::class, 'edit'])->name('panel.product.edit');
        Route::get('/panel/produkt/{product}', [ProductController::class, 'show'])->name('panel.product.show');

    });
});

Route::get('/{slug}', [CollectionController::class, 'show'])->name('products.collection');
