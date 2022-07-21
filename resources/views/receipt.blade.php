@extends('layouts.index')

@section('css')
<link href="{{ asset('css/receipt.css') }}" rel="stylesheet">
@stop
@section('content')
    
  <div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                    @foreach ($contact as $contact )
                        <strong>{{$contact->nama_depan." ".$contact->nama_belakang}}</strong>
                        <br>
                        {{$contact->alamat}}
                        <br>
                        {{$contact->kota}},{{$contact->provinsi}} 
                        <br>
                        {{$contact->negara}},{{$contact->zipcode}}
                        <br>
                        <abbr title="Phone">P:</abbr> {{$contact->phone}}
                    @endforeach
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: {{$date}}</em>
                    </p>
                    <p>
                        <em>Receipt #: {{$kode_order}}</em>
                    </p>
                    @if($status == null)
                    <p>
                        <em>Status: Belum bayar</em>
                    </p>
                    @elseif($status == 1)
                    <p>
                        <em>Status: Pending</em>
                    </p>
                    @elseif ($status == 2)
                    <p>
                        <em>Status: Approved</em>
                    </p>
                    @else ($status == 2)
                    <p>
                        <em>Status: Rejected</em>
                    </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>#</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($list_product as $product )
                        <tr>
                            <td class="col-md-9"><em>{{$product->products->nama}}</em></h4></td>
                            <td class="col-md-1" style="text-align: center">{{$product->total_barang}}</td>
                            <td class="col-md-1 text-center">{{$product->products->harga}}</td>
                            <td class="col-md-1 text-center">{{$product->total_harga}}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Shipping: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>Rp.{{$subtotal}}</strong>
                            </p>
                            <p>
                                <strong>Rp. 10000</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4 style="font-size:18px"><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4 style="font-size:15px"><strong>Rp. {{$final_total}}</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                <div style="margin-bottom:10px">
                        <h5>* Langkah-langkah pembayaran</h5>
                        <ul class="check-list">
                        @if($payment == 1)
                            <li>Transfer ke Bank BCA <p style="color:blue">2826526728829</p></li>
                        @else
                            <li>Transfer ke Shope <p style="color:blue">0895360735691</p></li>
                        @endif
                   
                        <li>Setelah itu Upload bukti bayar</li>
                        </ul>
                </div>
                @if($status == null)
                    <button type="button" onclick="payNow()" class="btn btn-lg btn-block" style="background-color:#D19C97">
                            Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                    </button></td>
                @else
                    <button type="button" class="btn btn-lg btn-block">
                            Tunggu Konfirmasi   <span class="glyphicon glyphicon-chevron-right"></span>
                     </button disabled></td>
                @endif
                    
            </div>
        </div>
        <div class="file-upload col-md-5" id="file-upload" style="display:none">
            <form id="form-bukti-bayar" method="post" name="form-bukti-bayar" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                <div class="image-upload-wrap">
                    <input class="form-control" type="hidden" name="id" id="id" value={{$id_checkout}}>
                    <input class="file-upload-input" type='file' name="image" id="image" onchange="readURL(this);" accept="image/*" />
                    <div class="drag-text">
                    <h3>Drag and drop a file or select add Image</h3>
                    </div>
                </div>
                <div class="file-upload-content">
                    <img class="file-upload-image" src="#" alt="your image" />
                    <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload()" class="remove-image">Remove</button>
                    <button type="submit"  class="submit-image font-weight-bold" id="submit-bukti-bayar">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
  @section('javascript')
  <script>
    $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

    });  
    authUser = {!! App\Models\User::where('id', auth()->id())->first(); !!}
    console.log(authUser);
    $(document).ready(function () {   
            if(authUser == null){
             
             document.getElementById("total-chart").innerHTML += '<span class="badge" id="integer">0</span>';
            }else{   
                $.ajax({
                            headers : {'Authorization' : 'Bearer '+authUser.api_token},
                            type:'get',
                            url:"/api/v1/get-chart",
                            success:function(data){ 
                                console.log(data);
                                document.getElementById("total-chart").innerHTML += '<span class="badge" id="integer">'+data+'</span>';
                        
                            },
                            error: function (data) { //jika error tampilkan error pada console
                                console.log('Error:', data);
                                        
                            }
                });
            }
    }); 

    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function () {
            $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
    });
    function payNow(){
        document.getElementById("file-upload").style.display = "block"; 
    }

    $("#form-bukti-bayar").submit(function(e) {
            e.preventDefault();
            $.ajax({
                            headers : {'Authorization' : 'Bearer '+authUser.api_token},
                            url: "/api/v1/upload-pembayaran",
                            type: "POST", 
                            data: new FormData($("#form-bukti-bayar")[0]),
                            contentType: false,
                            processData: false,
                            success:function(data){ 
                                window.location.href = "/list-order";
                            },
                            error: function (data) { //jika error tampilkan error pada console
                                console.log('Error:', data);
                                        
                            }
            });
    });

    $('#total-chart').click(function () {
            console.log("jj");
            if(authUser == null){
                console.log("jju");
                window.location.href = "/login";
                
            }else{
                console.log("y");
                window.location.href = "/chart";
                
            }
    });
    
  </script>

  @stop
@endsection