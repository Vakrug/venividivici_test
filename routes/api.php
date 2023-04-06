<?php

use App\Http\Controllers\CryptoController;
use App\Http\Controllers\UserController;
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

Route::post('/user', [UserController::class, 'create']);
Route::post('/user/login', [UserController::class, 'login']);

Route::get('/btcusd', [CryptoController::class, 'btcusd'])->middleware('auth:sanctum');
Route::get('/ltcusd', [CryptoController::class, 'ltcusd'])->middleware('auth:sanctum');

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
