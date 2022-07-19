<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Products;
use App\Models\Pesanan;
use App\Models\Checkout;
use Auth;
class ReceiptApiController extends Controller
{
    //
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
