<?php

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

Route::middleware(['auth'])->group(function(){

	Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	Route::get('page/{id}', [App\Http\Controllers\PageController::class, 'show'])->name('page-show');
	Route::post('page/store', [App\Http\Controllers\PageController::class, 'store'])->name('page-store');
	Route::post('data/store', [App\Http\Controllers\DataController::class, 'store'])->name('data-store');
	Route::get('data', [App\Http\Controllers\DataController::class, 'index'])->name('data-index');
	Route::get('data/{id}', [App\Http\Controllers\DataController::class, 'show'])->name('data-show');

});