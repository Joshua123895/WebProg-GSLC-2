<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'source',
        'description',
        'date',
        'receipt_file'
    ];

    const SOURCE = ['Salary', 'Gift', 'Bonus', 'Business', 'Other'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
