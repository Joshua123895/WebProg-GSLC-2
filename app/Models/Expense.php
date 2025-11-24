<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'category',
        'description',
        'date',
        'receipt_file'
    ];

    const CATEGORY = ['Food', 'Transport', 'Shopping', 'Bills', 'Other'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
