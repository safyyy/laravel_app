<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->group(function () {


});
Route::get("/users",[UserController::class, 'index']);
Route::get("/user",[UserController::class, 'getMyDetails']);

Route::post("/setImage",[UserController::class,"updateImage"]);
Route::get("/messages/{id}",[MessageController::class,"getMessages"]);
Route::post("/message",[MessageController::class,"sendMessage"]);

Route::get("/citizens", [UserController::class, "getCitizens"]);
Route::get("/users",[UserController::class, 'index']);
Route::get("/stats",[AdminController::class, 'getStats']);
