<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function comment()
    {
        return $this->hasOne(Comment::class, 'id_transaksi');
    }
}
