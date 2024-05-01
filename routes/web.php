<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('web.home.index');
});

Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
});
