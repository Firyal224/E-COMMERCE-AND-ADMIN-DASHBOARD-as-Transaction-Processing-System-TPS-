<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Products;
use App\Models\Pesanan;
use App\Models\Checkout;
use Auth;
class ChekoutController extends Controller
{
    //

    public function index(Request $request){
        $categories = Kategori::all();
        $user = Auth::user();
        $list_product =  Pesanan::with('products')->where('id_user',$user->id)->whereNull('status_order')->get();
        $subtotal = Pesanan::where('id_user',$user->id)->whereNull('status_order')->sum('total_harga');
        $final_total = $subtotal + 10000;
        return view('checkout', compact('categories','subtotal','list_product','final_total'));
    }

    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
                            'payment' => 'required',
                            'negara' => 'required',
                            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                            'zipcode' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:5',
        ]);  
        $randomNumber = random_int(100000, 999999);  
        $request->merge(['kode_order' => $randomNumber]);  
        if($request->email == null){
            $request->merge(['email' => $user->email]);   
        }  
        $input = $request->all();
        $post   =   Checkout::create($input); 
        $update_status_pesanan   =   Pesanan::where('id_user',$user->id)->update([
                'status_order' => 1,  
                'kode_order' => $randomNumber,            
        ]);
        $id_checkout = Checkout::select('id')->where('kode_order',$randomNumber)->first();
        return response()->json(['post' => $post,'id_checkout' => $id_checkout]); 
    }
}
