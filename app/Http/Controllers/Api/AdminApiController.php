<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Checkout;
use App\Models\Pesanan;
use App\Models\User;
use Auth;
use DataTables;
class AdminApiController extends Controller
{
    //

    public function datatable_orders(Request $request){

        $user = Auth::user();
        $data = Checkout::all();
    
        return DataTables::of($data)
            ->addColumn('nama_pengirim', function ($data){
                $nama_pengirim =   '<p>'.$data->nama_depan." ".$data->nama_belakang.'</p>';
                return $nama_pengirim;
            }) 
            ->addColumn('user', function ($data){
                $get_user = User::select('name','email')->where('id',$data->id_user)->first();
                $user =   '<p>'.$get_user->name." || ".$get_user->email.'</p>';
                return $user;
            }) 
            ->addColumn('alamat', function ($data){
                 
                $alamat=   '<address>'.$data->alamat.'<br>'.$data->kota.', '.$data->provinsi.'<br> '.$data->negara.', '.$data->zipcode.'</address>';
                return $alamat;
            })
            ->addColumn('status_bayar', function($data){

                if($data->status == 1 || $data->status == null){
                    $button = '<button type="button" name="approve" id="'.$data->id.'" class="approve btn btn-info btn-sm" onclick="approve('.$data->id.')" style="margin-right:10px;margin-left:5px">Approve</button>';  
                    $button .= '<button type="button" name="reject" id="'.$data->id.'" class="reject btn btn-danger btn-sm" onclick="reject('.$data->id.')" style="margin-top:10px;margin-left:5px">Rejected</button>'; 
                    
                }else if($data->status == 3){
                    $button = '<p style="color:#dc3545;margin-left:5px">Rejected</p>';
                }else if($data->status == 2){
                    $button = '<p style="color:#28a745;margin-left:5px">Approved</p>';
                }
                  
                 
               
                return $button;
            })
            ->addColumn('action', function($data){
                  
                $button = '<button type="button" name="show" id="'.$data->id.'" class="show btn btn-primary btn-sm show-post" onclick="show('.$data->id.')" style="margin-left: 3px;margin-right:5px"><i class="fa fa-eye"></i> Show </button>';    
               
                return $button;
            })
            ->rawColumns(['action','nama_pengirim','alamat','status_bayar','user'])
            ->addIndexColumn()
            ->make(true);
    }

    public function updateStatus(Request $request){
        // dd($request->param);
        if($request->param != null){
            $update_status   =   Checkout::where('id',$request->param)->update([
                'status' => 2,              
            ]);
        }else if($request->paramReject){
           
            $update_status   =   Checkout::where('id',$request->paramReject)->update([
                'status' => 3,              
            ]);
        }
      
        return response()->json($update_status);
    }

    public function userDetail(Request $request){
        
        $checkout = Checkout::join('users as u','u.id','=','checkouts.id_user')
                ->where('checkouts.id',$request->param)
                ->get();
        $get_checkout = Checkout::where('id',$request->param)->first();
        $pesanan = Pesanan::with('products')->where('id_user',$get_checkout->id_user)->where('kode_order',$get_checkout->kode_order)->whereNotNull('status_order')->get();
        $subtotal = Pesanan::where('id_user',$get_checkout->id_user)->where('kode_order',$get_checkout->kode_order)->whereNotNull('status_order')->sum('total_harga');
        return response()->json(['checkout' => $checkout,'pesanan' => $pesanan,'subtotal'=> $subtotal]);
    }
}
