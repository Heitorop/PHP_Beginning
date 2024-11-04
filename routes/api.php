<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group([], function (): void {
//     Route::get('/', [ClientController::class, 'index']);
//     Route::post('/create', [ClientController::class, 'store']);
//     Route::put('/update/{id}', [ClientController::class, 'update']);
//     Route::delete('/delete/{id}', [ClientController::class, 'destroy']);
// });

Route::controller(ClientController::class)->group(function () {
    Route::get('/clients', 'index');
    Route::get('/client/{id}', 'show');
    Route::post('/client/create', 'store');
    Route::put('/client/update/{id}', 'update');
    Route::delete('/client/delete/{id}', 'destroy');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/post/{id}', 'show');
    Route::post('/post/create', 'store');
    Route::put('/post/update/{id}', 'update');
    Route::delete('/post/delete/{id}', 'destroy');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/post/{id}/comment/create', 'store');
});
