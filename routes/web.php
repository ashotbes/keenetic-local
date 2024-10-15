<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '{locale?}'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('home');
    Route::get('/{id}', [ProductController::class, 'show']);
});


Route::get('/', function () {
    return redirect('/en');
});

