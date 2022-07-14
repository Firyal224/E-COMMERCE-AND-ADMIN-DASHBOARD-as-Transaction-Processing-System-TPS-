<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $fillable = ['id_products', 'id_user','total_barang','total_harga'];
    public function products()
    {
        return $this->belongsTo(Products::class, 'id_products');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
