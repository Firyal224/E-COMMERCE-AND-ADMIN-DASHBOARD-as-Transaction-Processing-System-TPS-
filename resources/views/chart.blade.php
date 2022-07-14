@extends('layouts.index')
@section('content')
    
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0" id="table_chart">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1" id="subtotal">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2" id="total">
                            <h5 class="font-weight-bold">Total</h5>
                           
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
    @section('javascript')
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


    <script>
        var shipping = 10000;
        var total;
        $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });      
        });  

        $(document).ready(function () {
            
            $.ajax({
                            type:'get',
                            url:"/subtotal",
                            success:function(data){ 
                                 total = parseInt(data)+shipping;
                                 console.log(total);
                                 document.getElementById("subtotal").innerHTML += '<h6 class="font-weight-medium" id="total_belanja">Rp.'+data+'</h6>';
                                 document.getElementById("total").innerHTML += ' <h5 class="font-weight-bold" id="total_plusShipping">Rp.'+total+'</h5>';     
                            },
                            error: function (data) { //jika error tampilkan error pada console
                                console.log('Error:', data);
                                        
                            }
            });
            $('#table_chart').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side      
                ajax: {   
                    url: "/data-chart",
                    type: 'GET',
                },
                columns: [
                    {
                        data: 'product',
                        name: 'product'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'total_harga',
                        name: 'total_harga'
                    },
                    
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                order: [
                    [0, 'asc']
                ]
            });
        });
    
        $(document).on('click', '.delete', function () {
            console.log("hyg");
            dataId = $(this).attr('id');
            document.getElementById("total_belanja").remove();
            document.getElementById("total_plusShipping").remove();
            $.ajax({
                url: "/delete/"+dataId, 
                type: 'delete',
                success: function (data) {      
                    var oTable = $('#table_chart').dataTable(); 
                    oTable.fnDraw(false); 
                    $.ajax({
                            type:'get',
                            url:"/subtotal",
                            success:function(data){ 
                                 total = parseInt(data)+shipping;
                                 document.getElementById("subtotal").innerHTML += '<h6 class="font-weight-medium" id="total_belanja">Rp.'+data+'</h6>';
                                 document.getElementById("total").innerHTML += ' <h5 class="font-weight-bold">Rp.'+total+'</h5>';     
                            },
                            error: function (data) { //jika error tampilkan error pada console
                                console.log('Error:', data);
                                        
                            }
                    });
                    
                }
            })
        });
        $(document).on('click', '.quantity button', function () {
            console.log("hyy");
            var button = $(this);
            var newVal;
            dataId = $(this).attr('id');
            var oldValue = button.parent().parent().find('input').val();
            if (button.hasClass('btn-plus')) {
                newVal = parseFloat(oldValue) + 1;
                console.log("kondisi 1");
            } else {
                if (oldValue > 0) {
                    newVal = parseFloat(oldValue) - 1;
                     console.log("kondisi 2");
                } else {
                    newVal = 0;
                     console.log("kondisi 3");
                }
            }
            document.getElementById("total_belanja").remove();
            document.getElementById("total_plusShipping").remove();
             $.ajax({
                    type:'POST',
                    url:"/update-chart",
                    data:{id_products:dataId,total_barang:newVal},
                    dataType: 'json',
                    success:function(data){
                        var oTable = $('#table_chart').dataTable(); 
                        oTable.fnDraw(false);  
                        $.ajax({
                            type:'get',
                            url:"/subtotal",
                            success:function(data){ 
                                 total = parseInt(data)+shipping;
                                 document.getElementById("subtotal").innerHTML += '<h6 class="font-weight-medium" id="total_belanja">Rp.'+data+'</h6>';
                                 document.getElementById("total").innerHTML += ' <h5 class="font-weight-bold">Rp.'+total+'</h5>';     
                            },
                            error: function (data) { //jika error tampilkan error pada console
                                console.log('Error:', data);
                                        
                            }
                         });
                
                    },
                    error: function (data) { //jika error tampilkan error pada console
                        console.log('Error:', data);
                                
                    }
            });
           
            button.parent().parent().find('input').val(newVal);
            
        });
       

    
    </script>
           
    @stop
    
@endsection