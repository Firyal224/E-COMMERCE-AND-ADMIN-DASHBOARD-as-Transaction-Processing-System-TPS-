<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Products;
use App\Models\Pesanan;
use App\Models\Checkout;
use Auth;
class ReceiptController extends Controller
{
    //
    public function index($id){
        $categories = Kategori::all();
        $user = Auth::user();
        $list_product =  Pesanan::with('products')->where('id_user',$user->id)->whereNotNull('status_order')->get();
        $subtotal = Pesanan::where('id_user',$user->id)->whereNotNull('status_order')->sum('total_harga');
        $final_total = $subtotal + 10000;

        $contact = Checkout::where('id',$id)->get();
        $get_date = Checkout::select('created_at')->where('id',$id)->first();
        $date = date('d-m-Y', strtotime($get_date->created_at));
        
        $get_data = Checkout::select('kode_order','status','payment')->where('id',$id)->first();
        $kode_order = $get_data->kode_order;
        $status = $get_data->status;
        $payment = $get_data->payment;
        $id_checkout=$id;
        return view('receipt', compact('categories','subtotal','list_product','final_total','contact','date','kode_order','status','id_checkout','payment'));
    }

    public function store(Request $request){

        $input = $request->all();
        $tes="";
        if($request->image !=null){
            $file= $request->file('image');
            $filename= $file->getClientOriginalName();
            $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/'), $filename);
            $tes= $file->getClientOriginalName(); 
        }
        $post   =  Checkout::where('id',$request->id)->update([
                'bukti_bayar' => $tes,
                'status' => 1,
                
        ]);
        return response()->json($post);
    }
   
}
