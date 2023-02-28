<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cardbalance extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'card_number', 'exp'];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
