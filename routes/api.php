<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\NoDuplicates;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/movies',[MovieController::class,'index']);
Route::get('/movies/{movie}',[MovieController::class,'show']);
Route::post('/movies',[MovieController::class,'store'])->Middleware(NoDuplicates::class);;
Route::put('/movies/{movie}',[MovieController::class,'update'])->Middleware(NoDuplicates::class);
Route::delete('movies/{movie}', [MovieController::class,'delete']);
