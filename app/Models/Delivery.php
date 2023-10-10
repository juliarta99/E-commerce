<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'deliverys';
    protected $guarded = ['id'];

    public function transaksi() 
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
