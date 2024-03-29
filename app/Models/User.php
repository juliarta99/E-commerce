<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Alamat;
use App\Models\Toko;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function toko()
    {
        return $this->hasOne(Toko::class, 'id_user');
    }

    public function keranjangs()
    {
        return $this->hasMany(Keranjang::class, 'id_user');
    }

    public function alamats()
    {
        return $this->hasMany(Alamat::class, 'id_user');
    }

    public function favorits()
    {
        return $this->hasMany(Favorit::class, 'id_user');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_user');
    }
}
