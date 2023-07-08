<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthenticationController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\VehiclesController;


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


Route::post('/register',[UserAuthenticationController::class,'register']);
Route::post('/login',[UserAuthenticationController::class,'login']);




Route::middleware('auth:api')->group(function (){
    Route::resource('/services',ServicesController::class);
    Route::resource('/vehicles',VehiclesController::class);
    Route::post('/logout',[UserAuthenticationController::class,'logout']);
});
