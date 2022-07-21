@extends('layouts.index')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form id="form-order" method="post" name="form-order" >
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                            <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="nama_depan" id="nama_depan" placeholder="John" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="nama_belakang" id="nama_belakang" placeholder="Doe" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" name="email" id="email" placeholder="example@email.com">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" name="phone" id="phone" placeholder="+123 456 789" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Address Line 1</label>
                                    <input class="form-control" type="text" name="alamat" id="alamat" placeholder="123 Street" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Negara</label>
                                    <select class="custom-select">
                                        <option selected>Indonesia</option>
                                        <input class="form-control" type="hidden" name="negara" id="negara" value="indonesia" required>
                                    
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Provinsi</label>
                                    <input class="form-control" type="text" name="provinsi" id="provinsi"  placeholder="Jawa Timur" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Kota</label>
                                    <input class="form-control" type="text" name="kota" id="kota"  placeholder="Surabaya" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" name="zipcode" id="zipcode" placeholder="123" required>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-4">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-medium mb-3">Products</h5>
                                @foreach ($list_product as $product)
                                <div class="d-flex justify-content-between">
                                    <p>{{$product->products->nama}} {{$product->total_barang}}</p>
                                    <p>Rp.{{$product->products->harga}}</p>
                                </div>
                                @endforeach
                                <hr class="mt-0">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    <h6 class="font-weight-medium">Rp.{{$subtotal}}</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Shipping</h6>
                                    <h6 class="font-weight-medium">$10</h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <input class="form-control" type="hidden" name="total_harga_checkout" id="total_harga_checkout" value={{$final_total}}>
                                    <input class="form-control" type="hidden" name="kode_order" id="kode_order" value= 1>
                                    <input class="form-control" type="hidden" name="id_user" id="id_user" value= {{auth()->user()->id}}>
                                        <h5 class="font-weight-bold">Rp.{{$final_total}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Payment</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" id="banktransfer" required value = 1 >
                                        <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" id="shope" value=2>
                                        <label class="custom-control-label" for="shope">Shope</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" id="order_checkout" type="submit" name="simpan" id="simpan">Place Order</button>
                            </div>
                        </div>
                </div>
                
            </div>
        </form>
    </div>
    <!-- Checkout End -->

    @section('javascript')
    <script>
        $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });      
        });  
        var authUser = {!! App\Models\User::where('id', auth()->id())->first(); !!};
        
        $("#form-order").submit(function(e) {
            e.preventDefault();
            $.ajax({
                            headers : {'Authorization' : 'Bearer '+authUser.api_token},
                            type:'post',
                            data: $('#form-order').serialize(),
                            url:"/api/v1/order",
                            dataType: 'json',
                            success:function(data){ 
                                window.location.href = "/receipt/"+data.id_checkout.id+"";
                            },
                            error: function (data) { //jika error tampilkan error pada console
                                console.log('Error:', data);
                                        
                            }
            });
        });
        
       
    </script>

    @stop
@endsection