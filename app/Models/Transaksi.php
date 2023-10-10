<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function delivery()
    {
        return $this->hasMany(Delivery::class, 'id_transaksi');
    }
}
