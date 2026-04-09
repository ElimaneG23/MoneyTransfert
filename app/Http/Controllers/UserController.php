<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Afficher tous les users
    public function index()
    {
        return User::all(); // Retourne tous les users en JSON
    }

    // Créer un nouvel utilisateur
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // toujours hasher le mot de passe
        ]);

        return response()->json($user, 201);
    }
}