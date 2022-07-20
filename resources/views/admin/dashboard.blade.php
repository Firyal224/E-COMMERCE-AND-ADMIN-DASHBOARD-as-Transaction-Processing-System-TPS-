@extends('layoutsAdmin.index')

@section('content')

    <div class="content">
         <!-- MULAI TABLE -->      
        <div class="col-lg-12 col-sm-12 hero-feature" >
                        <div class="table-responsive">

                        <table class="table table-striped table-bordered table-sm" id="table_admin" >
                        <button class="btn btn-primary" id="button-add" type="submit" style="float:right;margin-right:50px;height:30px;padding-bottom:25px;margin-top:15px">Add New</button>
                        <thead style=" background-image: linear-gradient(to bottom right, ##B0C4DE, #f7f7f7);" >
                            <tr>
                                <th>Kode Order</th>
                                <th>Nama Pengirim</th>
                                 <th>Akun User</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        </table>

                        </div>
        </div> 
        <!-- AKHIR TABLE --> 
        <!-- Modal -->
        <div class="modal fade" id="view-detail">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Detail Products</h4>
                    <button type="button" class="close" id="close" data-dismiss="modal">&times;</button>
                    </div>        
                    <!-- Modal body -->
                    <div class="modal-body" id="modalBody">
                     
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->  
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
        var authUser = {!! App\Models\User::where('id', auth()->id())->first(); !!};
     
        $(document).ready(function () {     
            console.log("kk");
            $('#table_admin').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side      
                ajax: {  
                    headers : {'Authorization' : 'Bearer '+authUser.api_token},
                    url: "/api/admin/data-order-user",
                    type: 'GET',
                },
                columns: [
                   
                    {
                        data: 'kode_order',
                        name: 'kode_order'
                    },
                    {
                        data: 'nama_pengirim',
                        name: 'nama_pengirim'
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'status_bayar',
                        name: 'status_bayar'
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

        function approve($id){
            console.log($id);
             $.ajax({
                    headers : {'Authorization' : 'Bearer '+authUser.api_token},
                    type:'POST',
                    url:"/api/admin/update-status",
                    data:{param:$id},
                    dataType: 'json',
                    success:function(data){ 
                        var oTable = $('#table_admin').dataTable(); 
                        oTable.fnDraw(false);  
                    },
                    error: function (data) { //jika error tampilkan error pada console
                        console.log('Error:', data);
                                
                    }
                });
        }

        function reject($id){
            console.log($id);
             $.ajax({
                    headers : {'Authorization' : 'Bearer '+authUser.api_token},
                    type:'POST',
                    url:"/api/admin/update-status",
                    data:{paramReject:$id},
                    dataType: 'json',
                    success:function(data){ 
                        var oTable = $('#table_admin').dataTable(); 
                        oTable.fnDraw(false);  
                    },
                    error: function (data) { //jika error tampilkan error pada console
                        console.log('Error:', data);
                                
                    }
                });
        }
        function show($id){
            $.ajax({
                headers : {'Authorization' : 'Bearer '+authUser.api_token},
                type:'post',
                url:"/api/admin/get-detail-user",
                data:{param:$id},
                dataType: 'json',
                success:function(data){ 
                    console.log(data);
                    console.log(data.checkout[0].bukti_bayar);
                    document.getElementById("modalBody").innerHTML += '   <div class="col-lg-12 mb-4 mb-sm-5" id="user-detail"><div class="card card-style1 border-0"><div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7"> <div class="row align-items-center"><div class="col-lg-6 mb-4 mb-lg-0"><img src="images/'+data.checkout[0].bukti_bayar+'" alt="..."> </div> <div class="col-lg-6 px-xl-10"><div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded"><h3 class="h2 text-white mb-0"> '+data.checkout[0].name+'</h3> <span class="text-primary"> '+data.checkout[0].kode_order+'</span></div> <ul class="list-unstyled mb-1-9"><li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Nama Pengirim:</span> '+data.checkout[0].nama_depan+' '+data.checkout[0].nama_belakang+'</li><li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Alamat:</span>  '+data.checkout[0].alamat+','+data.checkout[0].kota+' ,'+data.checkout[0].provinsi+' ,'+data.checkout[0].zipcode+'</li> <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> '+data.checkout[0].email+'</li> <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span> '+data.checkout[0].phone+'</li></ul></div> <table class="table table-hover" ><thead> <tr><th>Product</th><th>#</th><th class="text-center">Price</th><th class="text-center">Total</th></tr></thead> <tbody id="table_product"> <div id="list-product"></div><tr><td></td><td>   </td> <td class="text-right"> <p> <strong>Subtotal: </strong></p><p><strong>Shipping: </strong></p></td><td class="text-center"><p><strong> Rp.'+data.subtotal+'</strong> </p> <p> <strong>Rp. 10000</strong> </p></td>  </tr> <tr> <td>   </td>  <td>   </td> <td class="text-right"><h4 style="font-size:18px"><strong>Total: </strong></h4></td><td class="text-center text-danger"><h4 style="font-size:15px"><strong>Rp. '+data.checkout[0].total_harga_checkout+'</strong></h4></td> </tr> </tbody> </table> </div> </div> </div> </div>';

                    

                    data.pesanan.forEach(function(e,i){
                        document.getElementById("table_product").innerHTML ='<tr><td class="col-md-9"><em>'+data.pesanan[i].products.nama+'</em></h4></td><td class="col-md-1">'+data.pesanan[i].total_barang+'</td><td class="col-md-1 text-center">'+data.pesanan[i].products.harga+'</td><td class="col-md-1 text-center">'+data.pesanan[i].total_harga+'</td></tr>'+document.getElementById("table_product").innerHTML;
                    })
                },
                error: function (data) { //jika error tampilkan error pada console
                 console.log('Error:', data);                        
                }
            });
            $('#view-detail').modal('show');
        }
        $('#close').click(function () {
          document.getElementById("user-detail").remove();
            
        });
    </script>
    @stop
     
@endsection

