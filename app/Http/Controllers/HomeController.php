<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Kategori;
use App\Models\Pesanan;
use Auth;
class HomeController extends Controller
{
    //

    public function index(Request $request){

        $products = Products::with('kategori')->get();
        $categories = Kategori::all();
        // $user = Auth::user();
        // $total_chart = Pesanan::where('id_user',$user->id)->sum('total_barang');
        // dd($data);

        return view('home', compact('products', 'categories'));
    }
}
