<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'type' => 'required|in:deposit,withdrawal,transfer',
            'amount' => 'required|numeric|min:100',
            'sender_account_id' => 'required|string|exists:accounts,id',
            'receiver_account_id' => 'required|string|exists:accounts,id',    
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Transaction type is required',
            'type.in' => 'Transaction type must be either deposit, withdrawal, or transfer',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Amount must be a number',
            'amount.min' => 'Amount must be at least 100',
            'sender_account_id.required' => 'Sender account ID is required',
            'sender_account_id.string' => 'Sender account ID must be a string',
            'sender_account_id.exists' => 'Sender account ID does not exist',
            'receiver_account_id.required' => 'Receiver account ID is required',
            'receiver_account_id.string' => 'Receiver account ID must be a string',
            'receiver_account_id.exists' => 'Receiver account ID does not exist',
        ];
    }
}
