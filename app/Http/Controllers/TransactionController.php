<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $transactions = Transaction::where('sender_account_id', $user->id)
            ->orWhere('receiver_account_id', $user->id)
            ->get();
        return response()->json([
            'message' => 'Transactions retrieved successfully',
            'data' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        //
        $validatedData = $request->validated();

        $senderAccount = Account::where('id', $validatedData['sender_account_id'])->first();
        $receiverAccount = Account::where('id', $validatedData['receiver_account_id'])->first();
        $fee = 0; // 1% fee
        $totalAmount = $validatedData['amount'];
        
        if ($validatedData['type'] === TransactionType::TRANSFER) {
            $fee = $validatedData['amount'] * 0.01;
            $totalAmount = $validatedData['amount'] + $fee;
        }

        if ($senderAccount->balance < $totalAmount) {
            return response()->json([
                'message' => 'Insufficient funds in sender account'
            ], 400);
        }

        $transaction = Transaction::create([
            'type' => $validatedData['type'],
            'amount' => $validatedData['amount'],
            'sender_account_id' => $validatedData['sender_account_id'],
            'receiver_account_id' => $validatedData['receiver_account_id'],
            'status' => Status::PENDING,
            'code' => rand(1000, 9999),
        ]);
        return response()->json([
            'message' => 'Transaction created successfully',
            'data' => $transaction
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}