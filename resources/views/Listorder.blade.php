@extends('layouts.index')
@section('content')
    
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">List Orders</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping List Orders</p>
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
                            <th>Kode Order</th>
                            <th>Nama Pengirim</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
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
          
            $('#table_chart').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side      
                ajax: {  
                    headers : {'Authorization' : 'Bearer '+authUser.api_token},
                    url: "/api/v1/data-list-order",
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
        $(document).on('click', '.show', function () {
            dataId = $(this).attr('id');
             window.location.href = "/receipt/"+dataId+"";
        });
    </script>
           
    @stop
    
@endsection