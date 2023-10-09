<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'citys';
    protected $guarded = ['id'];

    public function alamats() 
    {
        return $this->hasMany(Alamat::class, 'id_city');
    }

    public function tokos() 
    {
        return $this->hasMany(Toko::class, 'id_city');
    }
}
