@extends('layouts.frontLayout.front_design')
@section('content')

    <!-- banner part start-->
    <section class="banner_part">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-12">
                  <div class="banner_slider ">
                      <div class="single_banner_slider">
                          <div class="row">
                              <div class="col-lg-5 col-md-8">
                                  <div class="banner_text">
                                      <div class="banner_text_iner">
                                          <h1>New Collection</h1>

                                          <a href="http://127.0.0.1:8000/products/MenWear" class="genric-btn danger circle"><i class="fas fa-shopping-bag"></i>&nbsp;Shop Now</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="banner_img d-none d-lg-block">
                                  <img src="{{ asset('/images/frontend_images/11.png') }}" alt="">
                              </div>
                          </div>
                      </div>
                      <!-- <div class="single_banner_slider">
                          <div class="row">
                              <div class="col-lg-5 col-md-8">
                                  <div class="banner_text">
                                      <div class="banner_text_iner">
                                          <h1>Cloth $ Wood Sofa</h1>
                                          <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                              suspendisse ultrices gravida. Risus commodo viverra</p>
                                          <a href="#" class="btn_2">buy now</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="banner_img d-none d-lg-block">
                                  <img src="img/banner_img.png" alt="">
                              </div>
                          </div>
                      </div> -->
                  </div>
                  <div class="slider-counter"></div>
              </div>
          </div>
      </div>
  </section>
  <!-- banner part start-->

<section class="ftco-section ftco-no-pt ftco-no-pb">

      <div class="container">
          <div class="row no-gutters ftco-services">
    <div class="col-lg-4 text-center d-flex align-self-stretch ">
      <div class="media block-6 services p-4 py-md-5">
        <div class="icon d-flex justify-content-center align-items-center mb-4">
              <span class="fas fa-shopping-bag"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Free Shipping</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 text-center d-flex align-self-stretch ">
      <div class="media block-6 services p-4 py-md-5">
        <div class="icon d-flex justify-content-center align-items-center mb-4">
              <span class="fas fa-hands-helping"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Support Customer</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 text-center d-flex align-self-stretch ">
      <div class="media block-6 services p-4 py-md-5">
        <div class="icon d-flex justify-content-center align-items-center mb-4">
              <span class="fas fa-shield-alt"></span>
        </div>
        <div class="media-body">
          <h3 class="heading">Secure Payments</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
    </div>
  </div>
      </div>
  </section>




  <section class="ftco-section bg-light">
  <div class="container">
          <div class="row justify-content-center mb-3 pb-3">
    <div class="col-md-12 heading-section text-center ">
        <div class="section-tittle mb-70">
            <h2>Featured Products</h2>
        </div>
    </div>
  </div>
  </div>
  <div class="container">
    <div class="row">



        @foreach($productsAll as $pro)

        <div class="col-sm-12 col-md-6 col-lg-3  d-flex" data-aos="zoom-in-down" >
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
                    <a href="{{ url('/product/'.$pro->id) }}" class="buy-now text-center py-2 "  data-toggle="modal" data-target="#modalQuickView{{$pro->id}}">Quick View&nbsp;<span><i class="far fa-eye"></i></span></a>

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
              <li class="paginate"><span>
                  {{ $productsAll->links() }}</span></li>

            </ul>
          </div>
        </div>
      </div>
  </div>
</section>



<section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
  <div class="container">
          <div class="row no-gutters">
              <div class="col-lg-4">
                  <div class="choose-wrap divider-one img p-5 d-flex align-items-end" style="background-image: url('{{ asset('/images/frontend_images/choose-1.jpg') }}');">

                  <div class="text text-center text-white px-2">
                          <span class="subheading">Men's Shoes</span>
                      <h2>Men's Collection</h2>
                      <p></p>
                      <p><a href="http://127.0.0.1:8000/products/MenWear" class="genric-btn primary circle">Shop now</a></p>
                  </div>
              </div>
              </div>
              <div class="col-lg-8">
              <div class="row no-gutters choose-wrap divider-two align-items-stretch">
                  <div class="col-md-12">
                      <div class="choose-wrap full-wrap img align-self-stretch d-flex align-item-center justify-content-end" style="background-image: url('{{ asset('/images/frontend_images/choose-2.jpg') }}');">
                          <div class="col-md-7 d-flex align-items-center">
                              <div class="text text-white px-5">
                                  <span class="subheading">Women's Shoes</span>
                                  <h2>Women's Collection</h2>
                                  <p></p>
                                  <p><a href="http://127.0.0.1:8000/products/Womenwear" class="genric-btn primary circle">Shop now</a></p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="row no-gutters">
                          <div class="col-md-6">
                              <div class="choose-wrap wrap img align-self-stretch bg-light d-flex align-items-center">
                                  <div class="text text-center px-5">
                                      <span class="subheading">Summer Sale</span>
                                      <h2>Extra 50% Off</h2>
                                      <p></p>
                                      <p><a href="http://127.0.0.1:8000/products/MenWear" class="genric-btn primary circle">Shop now</a></p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="choose-wrap wrap img align-self-stretch d-flex align-items-center" style="background-image: url('{{ asset('/images/frontend_images/choose-3.jpg') }}');">
                                  <div class="text text-center text-white px-5">
                                      <span class="subheading">Shoes</span>
                                      <h2>Best Sellers</h2>
                                      <p></p>
                                      <p><a href="http://127.0.0.1:8000/products/MenWear" class="genric-btn primary circle">Shop now</a></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
  </div>
</section>




<section class="ftco-gallery">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8 heading-section text-center mb-4 ">
            <div class="section-tittle mb-70">
                <h2>Follow Us On Instagram</h2>
            </div>
      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
    </div>
      </div>
  </div>
  <div class="container-fluid px-0">
      <div class="row no-gutters">
              <div class="col-md-4 col-lg-2 ">
                  <a href="{{ asset('/images/frontend_images/gallery-1.jpg') }}" class="gallery  img d-flex align-items-center" data-lightbox="roadtrip"  style="background-image: url('{{ asset('/images/frontend_images/gallery-1.jpg') }}');">
                      <div class="icon mb-4 d-flex align-items-center justify-content-center">
                      <span class="fab fa-instagram"></span>
                  </div>
                  </a>
              </div>
              <div class="col-md-4 col-lg-2 ">
                  <a href="{{ asset('/images/frontend_images/gallery-2.jpg') }}" class="gallery  img d-flex align-items-center" data-lightbox="roadtrip"  style="background-image: url('{{ asset('/images/frontend_images/gallery-2.jpg') }}');">
                      <div class="icon mb-4 d-flex align-items-center justify-content-center">
                      <span class="fab fa-instagram"></span>
                  </div>
                  </a>
              </div>
              <div class="col-md-4 col-lg-2 ">
              <a href="{{ asset('/images/frontend_images/gallery-3.jpg') }}" class="gallery  img d-flex align-items-center" data-lightbox="roadtrip"  style="background-image: url('{{ asset('/images/frontend_images/gallery-3.jpg') }}');">
                      <div class="icon mb-4 d-flex align-items-center justify-content-center">
                      <span class="fab fa-instagram"></span>
                  </div>
                  </a>
              </div>
              <div class="col-md-4 col-lg-2 ">
              <a href="{{ asset('/images/frontend_images/gallery-4.jpg') }}" class="gallery  img d-flex align-items-center" data-lightbox="roadtrip"  style="background-image: url('{{ asset('/images/frontend_images/gallery-4.jpg') }}');">
                      <div class="icon mb-4 d-flex align-items-center justify-content-center">
                      <span class="fab fa-instagram"></span>
                  </div>
                  </a>
              </div>
              <div class="col-md-4 col-lg-2 ">
              <a href="{{ asset('/images/frontend_images/gallery-5.jpg') }}" class="gallery  img d-flex align-items-center" data-lightbox="roadtrip"  style="background-image: url('{{ asset('/images/frontend_images/gallery-5.jpg') }}');">
                      <div class="icon mb-4 d-flex align-items-center justify-content-center">
                      <span class="fab fa-instagram"></span>
                  </div>
                  </a>
              </div>
              <div class="col-md-4 col-lg-2 ">
              <a href="{{ asset('/images/frontend_images/gallery-6.jpg') }}" class="gallery  img d-flex align-items-center" data-lightbox="roadtrip"  style="background-image: url('{{ asset('/images/frontend_images/gallery-6.jpg') }}');">
                      <div class="icon mb-4 d-flex align-items-center justify-content-center">
                      <span class="fab fa-instagram"></span>
                  </div>
                  </a>
              </div>
  </div>
  </div>
</section>

    @endsection
