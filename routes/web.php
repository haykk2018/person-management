<?php

use App\Http\Controllers\PersonController;
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
//Route::resources(['/' => PersonController::class,]);
//Route::resource('/','App\Http\Controllers\PersonController');
Route::controller(PersonController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/edit/{id}', 'edit');
    Route::get('/view/{id}', 'show');
    Route::get('/create', 'create');
    Route::post('/', 'store');
    Route::put('/{post}','update');
    Route::delete('delete/{id}','destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
