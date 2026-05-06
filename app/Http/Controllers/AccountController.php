<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    // LISTER
    public function index()
    {
        return AccountResource::collection(Account::all());
    }

    // CREER
    public function store(AccountRequest $request)
    {
        $account = Account::create($request->validated());

        return new AccountResource($account);
    }

    // AFFICHER UN SEUL
    public function show($id)
    {
        $account = Account::find($id);

        if (!$account) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return new AccountResource($account);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $account = Account::find($id);

        if (!$account) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $account->update($request->all());

        return new AccountResource($account);
    }

    // DELETE
    public function destroy($id)
    {
        $account = Account::find($id);

        if (!$account) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $account->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
