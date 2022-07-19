<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Products;
use App\Models\Pesanan;
use Auth;
use DataTables;

class ChartApiController extends Controller
{
    //
    public function datatable_chart(Request $request){

        $user = Auth::user();
        $data = Pesanan::with('products')->where('id_user',$user->id)->whereNull('status_order')->get();
    
        return DataTables::of($data)
            ->addColumn('product', function ($data){
                $produk =   '<img src="http://localhost:8000/img/'.$data->products['images'].'" alt="" style="width: 50px;">'.$data->products['nama'].'';
                return $produk;
            }) 
            ->addColumn('price', function ($data){
                 
                // dd($data->nama);
                return $data->products['harga'];
            })
            ->addColumn('quantity', function($data){
                  
                $button = '<div class="quantity input-group mx-auto" style="width: 100px;"><div class="input-group-btn"><button class="btn btn-sm btn-primary btn-minus" id="'.$data->id.'" ><i class="fa fa-minus"></i></button></div><input type="text" class="form-control form-control-sm bg-secondary text-center" value="'.$data->total_barang.'"><div class="input-group-btn"><button class="btn btn-sm btn-primary btn-plus" id="'.$data->id.'"><i class="fa fa-plus"></i></button></div></div>';     
               
                return $button;
            })
            ->addColumn('action', function($data){
                  
                $button = '<button name="delete" id="'.$data->id.'" class="delete btn btn-sm btn-primary"><i class="fa fa-times"></i></button> ';               
                return $button;
            })
            ->rawColumns(['action','product','price','quantity'])
            ->addIndexColumn()
            ->make(true);
    }
    public function update(Request $request)
    {
      
        $user = Auth::user();
        $id_products = Pesanan::select('id_products')->where('id',$request->id_pesanan)->first();
        $get_harga_pcs = Products::select('harga')->where('id',$id_products->id_products)->first();
        $total_harga = $get_harga_pcs->harga * $request->total_barang;

        $post   =   Pesanan::where('id_products',$id_products->id_products)
                    ->where('id_user',$user->id)->whereNull('status_order')->update([
                        'total_barang' => $request->total_barang,
                        'total_harga' => $total_harga,             
                    ]); 
     
        return response()->json($post);
    }
    public function destroy($id)
    {
        $post = Pesanan::where('id',$id)->delete();
     
        return response()->json($post);
    }

    public function get_subtotal(Request $request){
        $user = Auth::user();
        $subtotal = Pesanan::where('id_user',$user->id)->whereNull('status_order')->sum('total_harga');
        return response()->json($subtotal);
    }
}
