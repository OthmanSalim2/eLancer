<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
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


Route::view('view', 'layouts.front');

Route::group([
    // 'prefix' => LaravelLocalization::setLocale(),
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Route::get('projects/{project}', [ProjectsController::class, 'show'])
    //     ->name('projects.show');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::group(
//     [
//         'prefix' => 'admin',
//         'as' => 'admin.',
//     ],
//     function () {
//         require __DIR__ . '/auth.php';
//     }
// );

Route::get('projects/{project}', [ProjectsController::class, 'show'])
    ->name('projects.show');

require __DIR__ . '/auth.php';

require __DIR__ . '/dashboard.php';

require __DIR__ . '/freelancer.php';

require __DIR__ . '/client.php';
