<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'checkouts';
    protected $fillable = ['id_user', 'nama_depan','nama_belakang','email','alamat','phone','negara','kota','provinsi','zipcode','payment','total_harga_checkout','status','bukti_bayar','kode_order'];
   
}
