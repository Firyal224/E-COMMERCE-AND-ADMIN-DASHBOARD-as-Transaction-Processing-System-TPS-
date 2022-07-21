@extends('layouts.index')

@section('navbar')
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
        </a>
    </div>
           
@stop

@section('content')
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
             @foreach ($categories as $categori )
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <p class="text-right">15 Products</p>
                        <a href="" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="img/{{$categori->images}}" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">{{$categori->nama}}</h5>
                    </div>
                </div>
             @endforeach
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
           @foreach ($products as $produk )
           <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="img/{{$produk->images}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$produk->nama}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rp.{{$produk->harga}}</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="#" class="btn btn-sm text-dark p-0" onclick="viewDetail({{$produk->id}})"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="#" class="btn btn-sm text-dark p-0" onclick="addProduct({{$produk->id}})"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>

           @endforeach
           
        </div>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

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
    <script>
        var authUser = null;
        var totalBarang;
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
                
                    },
                    error: function (data) { //jika error tampilkan error pada console
                        console.log('Error:', data);
                                
                    }
                });
            }  
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

