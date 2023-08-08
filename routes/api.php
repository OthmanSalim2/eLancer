<?php

use App\Http\Controllers\Api\AuthTokenController;
use App\Http\Controllers\Api\ProjectsController;
use App\Http\Middleware\CheckApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// here I added this middleware in kernel on api level
// Route::group([
//     'middleware' => ['apiKey']
// ], function () {

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api/projects in url
Route::apiResource('projects', ProjectsController::class);

// to show all token for user
Route::get('auth/tokens', [AuthTokenController::class, 'index'])
    ->middleware('auth:sanctum');

// here until make generate for token must ti be user gust mean not logged in
Route::post('auth/tokens', [AuthTokenController::class, 'store'])
    ->middleware('guest');

Route::delete('auth/tokens/{id}', [AuthTokenController::class, 'destroy'])
    ->middleware('auth:sanctum');
// });
