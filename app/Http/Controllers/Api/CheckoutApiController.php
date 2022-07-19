<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Products;
use App\Models\Pesanan;
use App\Models\Checkout;
use Auth;
class CheckoutApiController extends Controller
{
    //
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
        ]);
        $id_checkout = Checkout::select('id')->where('kode_order',$randomNumber)->first();
        return response()->json(['post' => $post,'id_checkout' => $id_checkout]); 
    }
}
