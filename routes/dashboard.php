<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use Illuminate\Support\Facades\Route;



Route::prefix('/dashboard')->resource('categories', CategoriesController::class)->middleware('auth:admin,web');


// other way to access for any route
// Route::middleware('auth')->group(function () {
//     Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
//     Route::get('categories/create', [CategoriesController::class, 'create'])->name('categories.create');
//     Route::post('categories', [CategoriesController::class, 'store'])->name('categories.store');
//     Route::get('categories/{category}', [CategoriesController::class, 'show'])->name('categories.show');
//     Route::get('categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
//     Route::put('categories/{category}', [CategoriesController::class, 'update'])->name('categories.update');
//     Route::post('categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
// });
