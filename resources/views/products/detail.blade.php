@extends('layouts.frontLayout.front_design')
@section('content')
@if(Session::has('flash_message_success'))

<div class="productReviewSuccess" role="alert">

  </div>
@endif


<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/images/frontend_images/banner/bg_6.jpg/') }}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9   text-center" id="ftco-animate">
            <p class="breadcrumbs"><span class="mr-2"><?php echo $breadcrumb; ?></span></p>
          <h1 class="mb-0 bread">


          </h1>
        </div>
      </div>
    </div>
  </div>
  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner justify-content-between">
        <div class="col-lg-7 col-xl-7">
          <div class="product_slider_img" data-aos="fade-down-right">
            <div id="vertical">
                @if(count($productAltImages)>0)
                @foreach($productAltImages as $altimg)
                <div data-thumb="{{ asset('images/backend_images/product/medium/'.$altimg->image) }}">
                    <img src="{{ asset('images/backend_images/product/medium/'.$altimg->image) }}" />
                  </div>
                @endforeach
                @endif

            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xl-4">
            <form  name="addtoCartForm" id="addtoCartForm" action="{{ url('add-cart') }}" method="post" data-aos="flip-left">{{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
                <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
                <input type="hidden" name="product_color" value="{{ $productDetails->product_color }}">
                <input type="hidden" name="price" id="price" value="{{ $productDetails->price }}">
          <div class="s_product_text">

            <h3>{{ $productDetails->product_name }}</h3>
            <h2 id="getPrice">PKR {{ $productDetails->price}}</h2>
            <ul class="list">
              <li>

                  <span>Product Code: {{ $productDetails->product_code }}</span>
              </li>
              <li>
                <span>Product Color: {{ $productDetails->product_color }} </span>

              </li>
              <li>
                <select id="selSize"  name="size" style="width:150px;" required>
                    <option value="">Select</option>
                    @foreach($productDetails->attributes as $sizes)
                    <option value="{{ $productDetails->id }}-{{ $sizes->size }}">{{ $sizes->size }}</option>
                    @endforeach
                </select>

              </li>
              <li>
                 <span>&nbsp;Availibility: <span id="Availability"> @if($total_stock>0) In Stock @else Out Of Stock @endif</span></span>
              </li>
            </ul>
            <p>

            </p>
            <div class="card_area d-flex justify-content-between align-items-center">
              <div class="product_count">
                <span class="inumber-decrement"> <i class="fas fa-minus"></i></span>
                <input name="quantity" class="input-number" type="text" value="1" min="0" max="10">
                <span class="number-increment"> <i class="fas fa-plus"></i></span>
              </div>
              @if($total_stock>0)
              <div id="cartButton" class="single-pro-add-cart">
                  <button type="submit" class="genric-btn danger circle" id="cartButton" name="cartButton" value="Shopping Cart">
                          <i class="fa fa-shopping-cart"></i>
                          Add to cart
                      </button>
                  </div>

              @endif
                </form>

            </div>
            <div class="single-pro-share">
                <div class="addthis_inline_share_toolbox" data-url="{{ url('/product/'.$productDetails->id) }}"></div>
                <div class="sharethis-inline-share-buttons"></div>
                       </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->
  <section class="product_description_area" >
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Material & Care</a>
        </li>
        @if(!empty($productDetails->video))
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
            aria-selected="false">Video</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
            aria-selected="false">Reviews</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab" data-aos="fade-right">
          <p>
            {{$productDetails->description}}
          </p>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" data-aos="fade-right">
            <p>
                {{$productDetails->care}}
              </p>
        </div>
        @if(!empty($productDetails->video))
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" data-aos="fade-right">
          <div class="row">
            <div class="col-lg-6">
                <video controls width="640" height="480">
                    <source src="{{ url('videos/'.$productDetails->video)}}" type="video/mp4">
                  </video>
            </div>

        </div>
    </div>
        @endif
        <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab" data-aos="fade-right">
          <div class="row">
            <div class="col-lg-6">

              <div class="review_list">
                @foreach($comments as $comment)
                @if($comment->approve==1)
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="img/product/single-product/review-1.png" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>{{$comment->name}}</h4>
                      <h4>{{$comment->created_at}}</h4>
                      @if($comment->rating==1)
                      <i class="fa fa-star"></i>
                      @elseif($comment->rating==2)
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      @elseif($comment->rating==3)
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      @elseif($comment->rating==4)
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      @elseif($comment->rating==5)
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      @endif
                    </div>

                  </div>
                  <p>
                    {{$comment->comment}}
                  </p>
                </div>
                @endif
                @endforeach
              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Add a Review</h4>
                <form id="productReviewForm" action="{{url('/add-comment')}}" method="POST">  {{csrf_field()}}
                    <input type="hidden" name="product_id" value="{{$productDetails->id}}"/>

                <p>Your Rating:</p>

<p>
    <div class="rating">
        <input id="star5" name="rating" type="radio" value="5" class="radio-btn hide" />
        <label for="star5" >☆</label>
        <input id="star4" name="rating" type="radio" value="4" class="radio-btn hide" />
        <label for="star4" >☆</label>
        <input id="star3" name="rating" type="radio" value="3" class="radio-btn hide" />
        <label for="star3" >☆</label>
        <input id="star2" name="rating" type="radio" value="2" class="radio-btn hide" />
        <label for="star2" >☆</label>
        <input id="star1" name="rating" type="radio" value="1" class="radio-btn hide" />
        <label for="star1" >☆</label>
        <div class="clear"></div>
    </div>

</p>


                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" placeholder="Your Full name" />
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="comment" rows="1" placeholder="Review"></textarea>
                    </div>
                  </div>
                  <input type="hidden" name="approve"  id="status" value="0" />
                  <div class="col-md-12 text-right">
                    <input type="submit" value="Submit Now" class="genric-btn danger circle"  />

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->

  <div class="row justify-content-center">
<div class="col-md-8 heading-section text-center mb-4 ">
    <div class="section-tittle mb-70">
        <h2>Recommended Products</h2>
    </div>
</div>
</div>
  <section class="ftco-section bg-light" >
    <div class="container">
        <div class="row">



            <div class="col-lg-12">
                <div class="row">
                    @foreach($relatedProducts as $pro)

                    <div class="col-sm-4 col-md-3 col-lg-3 " >
                        <div class="product" data-aos="fade-right">
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
                                    <a href="{{ url('/product/'.$pro->id) }}" class="buy-now text-center py-2 ">Quick View&nbsp;<span><i class="far fa-eye"></i></span></a>
                                </p>
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

                  </ul>
                </div>
              </div>
            </div>
            </div>


        </div>
    </div>
</section>


 @endsection
 @section('scripts')
 <script>
 jQuery(function(){



        window.setTimeout(function() {
    $(".productReviewSuccess").fadeTo(0, 0).slideUp(0, function(){
        swal({
  position: 'top-end',
  icon: 'success',
  title: '{!! session('flash_message_success') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 1000);

	// Validate product review form on keyup and submit
	$("#productReviewForm").validate({
		rules:{

			name:{
				required:true
			},
            comment:{
				required:true
			},


		},
		messages:{


		}
	});


 	// Change Price with Size
     $("#selSize").change(function(){
		var idsize = $(this).val();
		if(idsize==""){
			return false;
		}
		$.ajax({
			type:'get',
			url:'/get-product-price',
			data:{idsize:idsize},
			success:function(resp){
                var arr = resp.split('#');
				$("#getPrice").html("PKR "+arr[0]);
                $("#price").val(arr[0]);
                if(arr[1]==0){
					$("#cartButton").hide();
					$("#Availability").text("Out Of Stock");
				}else{
					$("#cartButton").show();
					$("#Availability").text("In Stock");
				}

			},error:function(){
				alert("Error");
			}
		});
	});




 });
   </script>
 @endsection
