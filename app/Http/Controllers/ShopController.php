<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Pesanan;
use App\Models\Kategori;
use Auth;
class ShopController extends Controller
{
    //

    public function index(Request $request){
        $products = Products::with('kategori')->get();
        $categories = Kategori::all();
        return view('shop', compact('products', 'categories'));
    }

    public function product(Request $request){

        $data = Products::with('kategori')->get();
        // dd($data);

        return response()->json($data);
    }
    public function show($id)
    {
        
       
        $post  = Products::with('kategori')->where('id',$id)->first();
     
        return response()->json($post);
    }
    public function add_chart(Request $request)
    {
        $user = Auth::user();
        $totalBarang_awal =Pesanan::select('total_barang')
        ->where('id_products',$request->id_products)
        ->where('id_user',$user->id)->first();
        $get_harga_pcs = Products::select('harga')->where('id',$request->id_products)->first();
        if($totalBarang_awal == null){
           
            $total_harga = $get_harga_pcs->harga * $request->total_barang;
            $post   =   Pesanan::create([
                            'id_products' => $request->id_products,
                            'id_user' => $request->id_user,
                            'total_barang' => $request->total_barang,
                            'total_harga' => $total_harga,
                            
                        ]); 
        }else{
            $get_totalBarang = $totalBarang_awal->total_barang+1;
            $total_harga = $get_harga_pcs->harga * $get_totalBarang;
            $post   =   Pesanan::where('id_products',$request->id_products)
            ->where('id_user',$user->id)->update([
                'total_barang' => $get_totalBarang,
                'total_harga' => $total_harga,
                
            ]); 
        }             
        return response()->json($post);
    }
    public function get_chart(Request $request)
    {
        $user = Auth::user();
        $total_chart = Pesanan::where('id_user',$user->id)->sum('total_barang');
        return response()->json($total_chart);
    }
}
