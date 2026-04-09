<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; // <- Important

// Route pour lister tous les users (Read)
Route::get('/users', [UserController::class, 'index']);

// Route pour créer un nouvel user (Create)
Route::post('/user', [UserController::class, 'store']);

// Route par défaut Laravel pour l'utilisateur connecté (auth:sanctum)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');