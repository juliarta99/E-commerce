<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_product');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }

    public function transaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_product');
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'onUpdate' => true,
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
