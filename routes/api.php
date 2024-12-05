<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Post\AssignTagsController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\RemoveTagsController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagConroller;
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

Route::group([], function (){
    Route::get('/posts', IndexController::class);
    Route::get('/post/{id}', ShowController::class);
    Route::post('/post/create', StoreController::class);
    Route::put('/post/update/{id}', UpdateController::class);
    Route::post('/post/{id}/assign-tags', AssignTagsController::class);
    Route::post('/post/{id}/remove-tags', RemoveTagsController::class);
    Route::delete('/post/delete/{id}', DestroyController::class);
});

// Route::controller(PostController::class)->group(function () {
//     Route::get('/posts', 'index');
//     Route::get('/post/{id}', 'show');
//     Route::post('/post/create', 'store');
//     Route::put('/post/update/{id}', 'update');
//     Route::post('/post/{id}/assign-tags', 'assignTags');
//     Route::post('/post/{id}/remove-tags', 'removeTags');
//     Route::delete('/post/delete/{id}', 'destroy');
// });

Route::controller(ClientController::class)->group(function () {
    Route::get('/clients', 'index');
    Route::get('/client/{id}', 'show');
    Route::post('/client/create', 'store');
    Route::put('/client/update/{id}', 'update');
    Route::delete('/client/delete/{id}', 'destroy');
});



Route::controller(CommentController::class)->group(function () {
    Route::post('/post/{id}/comment/create', 'store');
});

Route::controller(TagConroller::class)->group(function () {
    Route::post('/tag/create', 'store');
    Route::get('/tags', 'index');
});
