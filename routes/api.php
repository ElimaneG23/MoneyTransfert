<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;


// User Routes

// Route pour lister tous les users (Read)
Route::get('/users', [UserController::class, 'index']);

// Route pour créer un nouvel user (Create)
Route::post('/user', [UserController::class, 'createUser']);

// UPDATE
Route::put('/user/{id}', [UserController::class, 'update']);

// DELETE
Route::delete('/user/{id}', [UserController::class, 'destroy']);

// ACCOUNTS ROUTES

// Lister
Route::get('/accounts', [AccountController::class, 'index']);

// AUTH ROUTES
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// // Voir un seul
// Route::get('/account/{id}', [AuthController::class, 'show']);

// // Modifier
// Route::put('/account/{id}', [AccountController::class, 'update']);

// // Supprimer
// Route::delete('/account/{id}', [AccountController::class, 'destroy']);

// Route::post('/register', [AuthController::class, 'register']);


// Route::post('/login', [AuthController::class, 'login']);

// TRANSACTIONS ROUTES

Route::post('/transactions', [TransactionController::class, 'store']);


Route::post('/', [TransactionController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/transactions', [\App\Http\Controllers\TransactionController::class, 'index']);
});

// // Route par défaut Laravel pour l'utilisateur connecté (auth:sanctum)
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');