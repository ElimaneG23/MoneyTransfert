<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'account_number',
        'balance',
        'code',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
