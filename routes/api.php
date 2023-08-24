<?php

use App\Http\Controllers\api\FriendController;
use App\Http\Controllers\api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/users/register', [UserController::class, 'register']);
Route::post('/users/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users/getCurrentUser', [UserController::class, 'getCurrentUser']);
    Route::post('/users/logout', [UserController::class, 'logout']);
    Route::get('/users/index', [UserController::class, 'index']);
    Route::post('/friends/add', [FriendController::class, 'addFriend']);
    Route::get('/friends/list/{id}', [FriendController::class, 'friendsList']);
});