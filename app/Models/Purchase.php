<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'amount',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 