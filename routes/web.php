<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
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
Route::get('/dodaj-zgloszenie', [ApplicationController::class, 'index'])->name('form');
Route::post('/dodaj-zgloszenie/zapisz', [ApplicationController::class, 'store'])->middleware(VerifyCsrfTokenForFormSave::class)->name('form.save');
Route::get('/dodaj-zgloszenie/dziekujemy/{id}', [ThxController::class, 'index'])->name('thx.app');
