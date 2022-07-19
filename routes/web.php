<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BreakfastController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IroningController;
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

Route::get('/produkty-sniadaniowe', [BreakfastController::class, 'index'])->name('products.breakfast');
Route::get('/prasowanie', [IroningController::class, 'index'])->name('products.ironing');
Route::get('/produkty-do-gotowania', [CookingController::class, 'index'])->name('products.cooking');
