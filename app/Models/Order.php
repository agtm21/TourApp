<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'product_name',
        'img_path',
        'product_desc',
        'price',
        'time',
        'place',
        'date',
        'status',
        'method'
    ];

    public function User()
    {
        return $this->belongsToMany(User::class);
    }
    // public function nelayan()
    // {
    //     return $this->hasOne(nelayan::class);
    // }
}
