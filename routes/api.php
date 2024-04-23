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


Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/getCurrentUser', [UserController::class, 'getCurrentUser']);
    Route::get('/user/getUser', [UserController::class, 'getUser']);
    Route::post('/user/logout', [UserController::class, 'logout']);
    Route::get('/user/index', [UserController::class, 'index']);
    Route::post('/friend/add', [FriendController::class, 'addFriend']);
    Route::get('/friend/{id}/list', [FriendController::class, 'friendsList']);
    Route::post('/friend/remove', [FriendController::class, 'removeFriend']);
});