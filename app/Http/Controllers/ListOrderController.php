<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Checkout;
use Auth;
use DataTables;
class ListOrderController extends Controller
{
    //

    public function index(Request $request){
  
        $categories = Kategori::all();
        return view('Listorder', compact('categories'));
    }

    public function datatable_orders(Request $request){

        $user = Auth::user();
        $data = Checkout::where('id_user',$user->id)->get();
    
        return DataTables::of($data)
            ->addColumn('nama_pengirim', function ($data){
                $nama_pengirim =   '<p>'.$data->nama_depan." ".$data->nama_belakang.'</p>';
                return $nama_pengirim;
            }) 
            ->addColumn('alamat', function ($data){
                 
                $alamat=   '<address>'.$data->alamat.'<br>'.$data->kota.', '.$data->provinsi.'<br> '.$data->negara.', '.$data->zipcode.'</address>';
                return $alamat;
            })
            ->addColumn('status_bayar', function($data){

                if($data->status == null){
                    $button = '<a type="button" name="show" id="'.$data->id.'" class="status btn btn-primary btn-sm show-post" style="  margin-left: 3px;
                    margin-left: 10px;margin-top:10px;background-color:#ffc107;border:none">Belum Bayar</a>';  

                }else if($data->status == 1){
                    $button = '<a type="button" name="show" id="'.$data->id.'" class="status btn btn-primary btn-sm show-post" style="  margin-left: 3px;
                    margin-left: 10px;margin-top:10px;background-color:#0078ff;border:none">Pending </a>';  

                }else if($data->status == 2){
                    $button = '<a type="button" name="show" id="'.$data->id.'" class="status btn btn-primary btn-sm show-post" style="  margin-left: 3px;
                    margin-left: 10px;margin-top:10px;background-color:#28a745;border:none"> Approved </a>';  
                }else{
                    $button = '<a type="button" name="show" id="'.$data->id.'" class="status btn btn-primary btn-sm show-post" style="  margin-left: 3px;
                    margin-left: 10px;margin-top:10px;background-color:#dc3545;border:none">Rejected </a>';  
                }
                  
                 
               
                return $button;
            })
            ->addColumn('action', function($data){
                  
                $button = '<button type="button" name="show" id="'.$data->id.'" class="show btn btn-primary btn-sm show-post" style="  margin-left: 3px;
                margin-left: 10px;margin-top:10px;background-color:#17a2b8;border:none"><i class="fa fa-eye" style="margin-right:3px"></i> Show </button>';    
               
                return $button;
            })
            ->rawColumns(['action','nama_pengirim','alamat','status_bayar'])
            ->addIndexColumn()
            ->make(true);
    }
}
