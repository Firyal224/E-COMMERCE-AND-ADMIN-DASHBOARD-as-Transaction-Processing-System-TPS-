@extends('layouts.index')
@section('css')
    <link rel="stylesheet" href="{{asset('css/paginationDocumentation.css')}}">
    <style type="text/css">
        .data-container{
            width: 100%;
            align-items: center;
            justify-content: center;
        }
    </style>
@stop
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->
                
                <!-- Color Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class=" row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Sort by
                                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="row data-container pr-3" style="margin-left:10px"></div>
                    <div class="col-12 pb-1" id="pagination-demo1">
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

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
                <div class="modal-body" id="modalBody"></div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
   
    @section('javascript')
     <script src="{{asset('js/paginationDocumentation.js')}}"></script>
    <script>  
      var authUser = null;
     
      var totalBarang;
     
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'get',
                url:"/loaddata",
                success:function(data){ 
                  console.log(data);
                  loadData(data);
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
                            type:'get',
                            url:"/get-chart",
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
        function loadData($value){
            console.log($value[0].images);
            $(function() {
            (function(name) {
            var container = $('#pagination-' + name);
            var sources = function () {
                                    var result = [];
                            
                                    for (var i = 1; i <= $value.length; i++) {
                                    result.push(i);
                                    }
                            
                                    return result;
            }();                       
            var options = {
                                    dataSource: sources,
                                    callback: function (response, pagination) {
                                    window.console && console.log(response, pagination);
                            
                                    var dataHtml = '';
                            
                                    $.each(response, function (index, item,harga) {
                                        dataHtml += '<div class="col-lg-4 col-md-6 col-sm-12 pb-1 "> <div class="card product-item border-0 mb-4"><div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0"><img class="img-fluid w-100" src="img/'+$value[index].images+'" alt=""></div> <div class="card-body border-left border-right text-center p-0 pt-4 pb-3"><h6 class="text-truncate mb-3">'+$value[index].nama+'</h6><div class="d-flex justify-content-center"> <h6>Rp.'+$value[index].harga+'</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6></div></div><div class="card-footer d-flex justify-content-between bg-light border"><a href="#" class="btn btn-sm text-dark p-0" onclick="viewDetail('+$value[index].id+')"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a><a href="#" class="btn btn-sm text-dark p-0" onclick="addProduct('+$value[index].id+')"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a></div></div></div>';
                                    });
                            
                            
                                    container.prev().html(dataHtml);
                                    }
            };                  
            //$.pagination(container, options);            
            container.addHook('beforeInit', function () {
                                    window.console && console.log('beforeInit...');
            });
            container.pagination(options);
                            
            container.addHook('beforePageOnClick', function () {
                                    window.console && console.log('beforePageOnClick...');
                                    //return false
            });
            })('demo1');
        })
        

        }
        function viewDetail($id) {
            $.ajax({
                type:'get',
                url: "/show-detail/"+$id+"",
                success:function(data){ 
                  console.log(data);
                  document.getElementById("modalBody").innerHTML 
                  += '<div class="container-fluid py-5" id="shop-detail"><div class="row px-xl-5"><div class="col-lg-5 pb-5"><div id="product-carousel" class="carousel slide" data-ride="carousel"><div class="carousel-inner border"><div class="carousel-item active"><img class="w-100 h-100" src="img/'+data.images+'" alt="Image"></div></div><a class="carousel-control-prev" href="#product-carousel" data-slide="prev"> <i class="fa fa-2x fa-angle-left text-dark"></i></a><a class="carousel-control-next" href="#product-carousel" data-slide="next"><i class="fa fa-2x fa-angle-right text-dark"></i></a> </div></div><div class="col-lg-7 pb-5"><h3 class="font-weight-semi-bold">'+data.nama+'</h3><div class="d-flex mb-3"><div class="text-primary mr-2"><small class="fas fa-star"></small> <small class="fas fa-star"></small><small class="fas fa-star"></small><small class="fas fa-star-half-alt"></small><small class="far fa-star"></small> </div> <small class="pt-1">(50 Reviews)</small></div> <h3 class="font-weight-semi-bold mb-4">$'+data.harga+'</h3><p class="mb-4">'+data.detail+'</p><div class="d-flex align-items-center mb-4 pt-2"><div class="input-group quantity mr-3" style="width: 130px;"><div class="input-group-btn"><button class="btn btn-primary btn-minus" ><i class="fa fa-minus"></i></button></div><input type="text" class="form-control bg-secondary text-center" value="1"><div class="input-group-btn"><button class="btn btn-primary btn-plus"><i class="fa fa-plus"></i></button> </div>  </div><button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button> </div><div class="d-flex pt-2"><p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p><div class="d-inline-flex"><a class="text-dark px-2" href=""> <i class="fab fa-facebook-f"></i> </a><a class="text-dark px-2" href=""><i class="fab fa-twitter"></i> </a> <a class="text-dark px-2" href="">   <i class="fab fa-linkedin-in"></i>  </a><a class="text-dark px-2" href=""> <i class="fab fa-pinterest"></i></a></div> </div>  </div> </div> <div class="row px-xl-5"> <div class="col"> <div class="nav nav-tabs justify-content-center border-secondary mb-4"><a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a> <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a> <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a> </div> <div class="tab-content"><div class="tab-pane fade show active" id="tab-pane-1"><h4 class="mb-3">Product Description</h4><p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p> <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.</p> </div><div class="tab-pane fade" id="tab-pane-2"><h4 class="mb-3">Additional Information</h4><p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p><div class="row"> <div class="col-md-6"> <ul class="list-group list-group-flush">     <li class="list-group-item px-0">Sit erat duo lorem duo ea consetetur, et eirmod takimata.</li> <li class="list-group-item px-0"> Amet kasd gubergren sit sanctus et lorem eos sadipscing at.</li><li class="list-group-item px-0"> Duo amet accusam eirmod nonumy stet et et stet eirmod.</li>  <li class="list-group-item px-0">  Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.  </li> </ul>   </div>   <div class="col-md-6"><ul class="list-group list-group-flush"> <li class="list-group-item px-0">  Sit erat duo lorem duo ea consetetur, et eirmod takimata.   </li>   <li class="list-group-item px-0">  Amet kasd gubergren sit sanctus et lorem eos sadipscing at.  </li> <li class="list-group-item px-0"> Duo amet accusam eirmod nonumy stet et et stet eirmod.</li>  <li class="list-group-item px-0"> Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy. </li> </ul> </div> </div> </div><div class="tab-pane fade" id="tab-pane-3"><div class="row">  <div class="col-md-6"> <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4> <div class="media mb-4"> <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;"> <div class="media-body"> <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6> <div class="text-primary mb-2"> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>  <i class="far fa-star"></i>  </div>   <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>  </div> </div> </div> <div class="col-md-6"> <h4 class="mb-4">Leave a review</h4> <small>Your email address will not be published. Required fields are marked *</small><div class="d-flex my-3">  <p class="mb-0 mr-2">Your Rating * :</p>  <div class="text-primary"><i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i>  <i class="far fa-star"></i> <i class="far fa-star"></i></div>  </div><form> <div class="form-group"> <label for="message">Your Review *</label><textarea id="message" cols="30" rows="5" class="form-control"></textarea> </div><div class="form-group">  <label for="name">Your Name *</label>  <input type="text" class="form-control" id="name">  </div> <div class="form-group"><label for="email">Your Email *</label>  <input type="email" class="form-control" id="email"> </div> <div class="form-group mb-0"> <input type="submit" value="Leave Your Review" class="btn btn-primary px-3"> </div>  </form>  </div> </div> </div></div> </div></div></div>';
                   $('#view-detail').modal('show');
                }
            });
              
              console.log($id);
        }

        $('#close').click(function () {
            document.getElementById("shop-detail").remove();
            
        });
       
        function addProduct($id){
            totalBarang = 1;
            if(authUser == null){
                console.log("jju");
                window.location.href = "/login"; 
            }else{
                console.log("y");
                $.ajax({
                    type:'POST',
                    url:"/add-chart",
                    data:{id_user:authUser.id,id_products:$id,total_barang:totalBarang},
                    dataType: 'json',
                    success:function(data){ 
                        document.getElementById("integer").remove();
                        $.ajax({
                            type:'get',
                            url:"/get-chart",
                            success:function(data){ 
                                console.log(data);
                                document.getElementById("total-chart").innerHTML += '<span class="badge" id="integer">'+data+'</span>';
                        
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
            }

           
            
        }
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

