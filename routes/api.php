<?php

use Illuminate\Http\Request;

use App\Http\Controllers\Api\UserController;

// Public routes
Route::post('/login', [UserController::class, 'login'])->name('api.login');

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'userData']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/user-list', [UserController::class, 'userList']);
});
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
// });