<?php

use App\Http\Controllers\TouristPointController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Outras rotas que você quiser adicionar
    Route::get('/tourist-points', [TouristPointController::class, 'index']);
    Route::post('/tourist-points', [TouristPointController::class, 'store']);
    Route::delete('/tourist-points/{uid}', [TouristPointController::class, 'destroy']);
   
});
