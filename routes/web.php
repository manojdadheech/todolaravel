<?php

use App\Http\Controllers\TodolistController;
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

Route::prefix('/')->name('todolist.')->group(function() {
    Route::get('/', [TodolistController::class, 'index'])->name('index');
    Route::post('/', [TodolistController::class, 'store'])->name('store');
    Route::post('/delete', [TodolistController::class, 'destroy'])->name('destroy');
    Route::get('/completetodo/{id}', [TodolistController::class, 'completetodo'])->name('complete');
    Route::post('/update', [TodolistController::class, 'update'])->name('update');
    Route::get('/searchfilter/{id?}', [TodolistController::class, 'filtersSearch'])->name('searchfilter');
});
