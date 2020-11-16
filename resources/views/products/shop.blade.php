
@extends('layouts.frontLayout.front_design')
@section('content')
<?php $url = url()->current(); ?>

<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/images/frontend_images/banner/bg_6.jpg/') }}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9   text-center" id="ftco-animate">
            <p class="breadcrumbs"><span class="mr-2"><?php echo $breadcrumb; ?></span></p>
          <h1 class="mb-0 bread">
            @if(!empty($search_product))
            {{ $search_product }} Item
        @else
            {{ $categoryDetails->name }} Items
        @endif
            ({{ count($productsAll) }})

          </h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 order-md-last">
                <div class="row">


                    @foreach($productsAll as $pro)

                    <div class="col-sm-4 col-md-3 col-lg-4 " data-aos="zoom-in-down" >
                        <div class="product">
                            <a href="#" class="img-prod"><img class="img-fluid" src="{{ asset('/images/backend_images/product/small/'.$pro->image) }}" alt="Colorlib Template">
                                <span class=""></span>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 px-3">
                                <h3><a href="#">{{ $pro->product_name }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="mr-2 price-dc"></span><span class="price-sale">PKR {{ $pro->price }}</span></p>
                                    </div>

                                </div>
                                <p class="bottom-area d-flex px-3">
                                    <a href="{{ url('/product/'.$pro->id) }}" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="fas fa-cart-plus"></i></span></a>
                                <a  id="myurl"  url="{{ url('/product/'.$pro->id) }}"  class="buy-now text-center py-2 "  data-toggle="modal"  data-target="#modalQuickView{{$pro->id}}">Quick View&nbsp;<span><i class="far fa-eye"></i></span></a>

                                </p>
                            </div>
                        </div>
                    </div>
  <!-- Modal: modalQuickView -->
  <div class="modal fade" id="modalQuickView{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content ">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-5">
              <!--Carousel Wrapper-->
              <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                data-ride="carousel">
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <img class="d-block w-100"
                      src="{{ asset('/images/backend_images/product/large/'.$pro->image) }}"
                      alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100"
                      src="{{ asset('/images/backend_images/product/large/'.$pro->image) }}"
                      alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100"
                      src="{{ asset('/images/backend_images/product/large/'.$pro->image) }}"
                      alt="Third slide">
                  </div>
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(23).jpg" width="60">
                  </li>
                  <li data-target="#carousel-thumb" data-slide-to="1">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(24).jpg" width="60">
                  </li>
                  <li data-target="#carousel-thumb" data-slide-to="2">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(25).jpg" width="60">
                  </li>
                </ol>
              </div>
              <!--/.Carousel Wrapper-->
            </div>
            <div class="col-lg-7">
              <h2 class="h2-responsive product-name">
                <strong>{{ $pro->product_name }}</strong>
              </h2>
              <h4 class="h4-responsive">
                <span class="green-text">
                  <strong>PKR{{ $pro->price }}</strong>
                </span>

              </h4>

            <div class="col-lg-10">
                <p>
                    {{ $pro->description }}
                </p>
            </div>




              <!-- Add to Cart -->
              <div class="card-body">
                <div class="row">

                  <div class="col-md-6">



                  </div>
                </div>
                <div class="text-center">

                  <button type="button" class="genric-btn danger circle" data-dismiss="modal">Close</button>
                  <a style="color: white" href="{{ url('/product/'.$pro->id) }}" class="genric-btn danger circle">View Details
                    <i class="far fa-eye"></i>
                  </a href="">
                </div>
              </div>
              <!-- /.Add to Cart -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

                @endforeach
                </div>




                <div class="row mt-5">
              <div class="col text-center">
                <div class="block-27">
                  <ul>
                   <?php if (preg_match("/products/i", $url)){ ?>
                    <li class="paginate"><span>
                        {{ $productsAll->links() }}</span></li>
                    <?php } ?>




                  </ul>
                </div>
              </div>
            </div>
            </div>

            <div class="col-sm-6 col-md-7 col-lg-3  sidebar">
                @include('layouts.frontLayout.front_sidebar')
            </div>
        </div>
    </div>
</section>


    @endsection
@section('scripts')
<script>

jQuery(function(){
    $('.mdb-select').materialSelect();
    var myurl = $('#myurl').attr('url');


       $.ajax({
         url: myurl,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;
           $('#userTable tbody').empty(); // Empty <tbody>
           if(response['data'] != null){
              len = response['data'].length;
           }

           if(len > 0){
              for(var i=0; i<len; i++){
                 var id = response['data'][i].id;
                 var image = response['data'][i].image;


                 var tr_str = "<tr>" +
                   "<td align='center'>" + (i+1) + "</td>" +
                   "<td align='center'>" + image + "</td>" +

                 "</tr>";

                 $("#userTable tbody").append(tr_str);
              }
           }else{
              var tr_str = "<tr>" +
                  "<td align='center' colspan='4'>No record found.</td>" +
              "</tr>";

              $("#userTable tbody").append(tr_str);
            }

}
});


});
</script>

@endsection
