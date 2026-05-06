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
         // $breukh = $request->validate([
        //     'name' => 'required|string|max:255|min:3',
        //     'email' => "required|email|unique:users,email",
        //     'password' => 'required|string|min:6',
        // ]);

        // $breukh = $request->validated();

        $user = User::create($request->validated());

        return response()->json([
            'message' => 'User created successfully',
            'data' => UserResource::make($user)
        ]);

    }

    // Modifier un utilisateur
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return response()->json($user);
    }

    // Supprimer un utilisateur
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}