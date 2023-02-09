<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topup extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'amount', 'currency', 'topup_method'];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
