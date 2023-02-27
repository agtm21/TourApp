<?php

namespace App\Models;

use App\Notifications\NotifyNelayan;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // variable guarded berfungsi agar kolom yang disebutkan tidak diisi, kalau fillable yang bisa diisi
    protected $guarded = [];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $fillable = ['uuid', 'username', 'email', 'password'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param string $role
     * @return bool
     */
    public function Order()
    {
        return $this->hasMany(Order::class);
    }
    public function Topup()
    {
        return $this->hasMany(topup::class);
    }
    public function balance()
    {
        return $this->hasOne(balance::class);
    }
    // public function User()
    // {
    //     $this->morphTo();
    // }
    public function notifyNewMessage($user)
    {
        $this->notify(new NotifyNelayan($user));
    }
}
