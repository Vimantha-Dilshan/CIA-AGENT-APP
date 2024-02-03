<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AgentController;


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


Route::get('agents/full/{id}', [DataController::class, 'show']);

Route::post('/agents/store', [AgentController::class, 'store']);
Route::get('/agents', [AgentController::class, 'index']);
Route::get('agents/{id}', [AgentController::class, 'show']);
Route::put('agents/{id}', [AgentController::class, 'update']);
Route::delete('agents/{id}', [AgentController::class, 'delete']);
