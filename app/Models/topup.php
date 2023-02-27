<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topup extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'amount', 'topup_method', 'currency'];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    // public function Balance()
    // {
    //     return $this->hasMany(balance::class);
    // }
}
