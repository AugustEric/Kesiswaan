<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/simpan', [App\Http\Controllers\HomeController::class, 'simpan'])->name('simpan');
Route::delete('/home/{id}/destroy', [App\Http\Controllers\HomeController::class, 'destroy'])->name('home.destroy');
Route::get('/home/{id}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('home.edit');
Route::put('/home/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('home.update');


