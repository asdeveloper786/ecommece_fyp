@extends('layouts.frontLayout.front_design')
@section('content')

@if(Session::has('flash_message_error'))

<div class="checkoutError" role="alert">

  </div>
@endif

<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/images/frontend_images/banner/bg_6.jpg/') }}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9   text-center" id="ftco-animate">
            <p class="breadcrumbs"><span class="mr-2"><?php ?></span></p>
          <h1 class="mb-0 bread">
Check Out

          </h1>
        </div>
      </div>
    </div>
  </div>
		<!-- Checkout-Billing-details and order start -->
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-xl-12 ">

            <form  action="{{ url('/checkout') }}" method="post">{{ csrf_field() }}
                <h3 style="margin-top: 50px;" class="mb-4 billing-heading">Billing Details</h3>
                <div class="row">
                    <div style="margin-top: 30px;" class="col-md-6">
                        <div class="checkout-bill">

                        </div>
                        <div class="row coupon-info">
                            <div class="col-md-6">
                                <p class="form-group">
                                    <label>Billing Name <span class="required"></span></label>
                                    <input name="billing_name" id="billing_name" @if(!empty($userDetails->name)) value="{{ $userDetails->name }}" @endif type="text" placeholder="Billing Name" class="form-control" />
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="form-group">
                                    <label>Billing Address   <span class="required"></span></label>
                                    <input name="billing_address" id="billing_address" @if(!empty($userDetails->address)) value="{{ $userDetails->address }}" @endif type="text" placeholder="Billing Address" class="form-control" />
                                </p>
                            </div>
                        </div>
                        <div class="row coupon-info">
                            <div class="col-md-6">
                                <p class="form-group">
                                    <label>Billing City </label>
                                    <input name="billing_city" id="billing_city" @if(!empty($userDetails->city)) value="{{ $userDetails->city }}" @endif type="text" placeholder="Billing City" class="form-control" />
                                </p>
                            </div>
                        </div>
                        <div class="row coupon-info">
                            <div class="col-md-6">
                                <p class="form-group">
                                    <label>Billing State<span class="required"></span></label>
                                    <input name="billing_state" id="billing_state" @if(!empty($userDetails->state)) value="{{ $userDetails->state }}" @endif type="text" placeholder="Billing State" class="form-control" />
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="form-group">
                                    <select id="billing_country" name="billing_country" class="form-control">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->country_name }}" @if(!empty($userDetails->country) && $country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="row coupon-info">
                            <div class="col-md-6">
                                <p class="form-group">
                                    <label>Billing Pincode </label>
                                    <input name="billing_pincode" id="billing_pincode" @if(!empty($userDetails->name)) value="{{ $userDetails->pincode }}" @endif type="text" placeholder="Billing Pincode" class="form-control" />
                                </p>
                            </div>
                        </div>
                        <div class="row coupon-info">
                            <div class="col-md-6">
                                <p class="form-group">
                                    <label>Billing Mobile </label>
                                    <input name="billing_mobile" id="billing_mobile" @if(!empty($userDetails->mobile)) value="{{ $userDetails->mobile }}" @endif type="text" placeholder="Billing Mobile" class="form-control" />

                                </p>
                            </div>
                        </div>
                        <div class="row coupon-info">
                            <div class="col-md-7">
                                <p style="margin-left: 25px;" class="form-group">
                                    <label  >Shipping Address same as Billing Address</label>

                                    <input type="checkbox" placeholder="Shipping Address same as Billing Address" class="pixel-radio" id="copyAddress">

                                </p>
                            </div>
                        </div>

                        </div>

                        <div class="col-sm-1">
                            <h2></h2>
                        </div>
                        <div class="col-sm-4">
                            <div style="margin-bottom: 50px;" class="signup-form"><!--sign up form-->
                                <h3 class="mb-4 billing-heading">Shipping Details</h3>
                                    <div class="form-group">
                                        <input name="shipping_name" id="shipping_name" @if(!empty($shippingDetails->name)) value="{{ $shippingDetails->name }}" @endif type="text" placeholder="Shipping Name" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input name="shipping_address" id="shipping_address" @if(!empty($shippingDetails->address)) value="{{ $shippingDetails->address }}" @endif type="text" placeholder="Shipping Address" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input name="shipping_city" id="shipping_city" @if(!empty($shippingDetails->city)) value="{{ $shippingDetails->city }}" @endif type="text" placeholder="Shipping City" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input name="shipping_state" id="shipping_state" @if(!empty($shippingDetails->state)) value="{{ $shippingDetails->state }}" @endif type="text" placeholder="Shipping State" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <select id="shipping_country" name="shipping_country" class="form-control">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                                <option class="list" value="{{ $country->country_name }}" @if(!empty($shippingDetails->country) && $country->country_name == $shippingDetails->country) selected @endif>{{ $country->country_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="shipping_pincode" id="shipping_pincode" @if(!empty($shippingDetails->pincode)) value="{{ $shippingDetails->pincode }}" @endif type="text" placeholder="Shipping Pincode" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input name="shipping_mobile" id="shipping_mobile" @if(!empty($shippingDetails->mobile)) value="{{ $shippingDetails->mobile }}" @endif type="text" placeholder="Shipping Mobile" class="form-control" />
                                    </div>
                                    <button type="submit" class="genric-btn danger circle">Check Out</button>
                            </div><!--/sign up form-->
                        </div>


                </div>
            </form>
                    </div>

                </div>

        </div>


        <!-- Checkout-Billing-details and order end -->

@endsection

@section('scripts')
<script>

jQuery(function(){
           //checkout Error
           window.setTimeout(function() {
    $(".checkoutError").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'error',
  title: '{!! session('flash_message_error') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 1000);



  // Copy Billing Address to Shipping Address Script
  $("#copyAddress").click(function(){
    	if(this.checked){
    		$("#shipping_name").val($("#billing_name").val());
    		$("#shipping_address").val($("#billing_address").val());
    		$("#shipping_city").val($("#billing_city").val());
    		$("#shipping_state").val($("#billing_state").val());
    		$("#shipping_pincode").val($("#billing_pincode").val());
    		$("#shipping_mobile").val($("#billing_mobile").val());
    		$("#shipping_country").val($("#billing_country").val());
    	}else{
    		$("#shipping_name").val('');
    		$("#shipping_address").val('');
    		$("#shipping_city").val('');
    		$("#shipping_state").val('');
    		$("#shipping_pincode").val('');
    		$("#shipping_mobile").val('');
    		$("#shipping_country").val('');
    	}
    });


});

</script>
@endsection


