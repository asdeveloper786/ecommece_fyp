@extends('layouts.frontLayout.front_design')
@section('content')
<?php use App\Product;
$cartCount = Product::cartCount();
?>
<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/images/frontend_images/banner/bg_6.jpg/') }}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9   text-center" id="ftco-animate">
            <p class="breadcrumbs"><span class="mr-2"><?php ?></span></p>
          <h1 class="mb-0 bread">
Order Review

          </h1>
        </div>
      </div>
    </div>
  </div>
	<!--================Order Details Area =================-->
	<section style="margin-bottom: 30px;" class="order_details section_gap">
		<div class="container">

			<div class="row order_d_inner">

				<div class="col-lg-6">
					<div class="details_item">
						<h4>Billing Address</h4>
						<ul class="list">
							<li><a href="#"><span>Name</span> : {{ $userDetails->name }}</a></li>
							<li><a href="#"><span>Address</span> : {{ $userDetails->address }}</a></li>
							<li><a href="#"><span>City</span> : {{ $userDetails->city }}</a></li>
                            <li><a href="#"><span>State </span> : {{ $userDetails->state }}</a></li>
                            <li><a href="#"><span>Country </span> : {{ $userDetails->country }}</a></li>
                            <li><a href="#"><span>Pincode </span> : {{ $userDetails->pincode }}</a></li>
                            <li><a href="#"><span>Mobile </span> : 	{{ $userDetails->mobile }}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Shipping Address</h4>
						<ul class="list">
                            <li><a href="#"><span>Name</span> : {{ $shippingDetails->name }}</a></li>
							<li><a href="#"><span>Address</span> : {{ $shippingDetails->address }}</a></li>
							<li><a href="#"><span>City</span> : {{ $shippingDetails->city }}</a></li>
                            <li><a href="#"><span>State </span> : {{ $shippingDetails->state }}</a></li>
                            <li><a href="#"><span>Country </span> : {{ $shippingDetails->country }}</a></li>
                            <li><a href="#"><span>Pincode </span> : {{ $shippingDetails->pincode }}</a></li>
                            <li><a href="#"><span>Mobile </span> : 	{{ $shippingDetails->mobile }}</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Order Details</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
                                <td class="image">Item</td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
							</tr>
						</thead>
						<tbody>
                            <?php $total_amount = 0; ?>
                            @foreach($userCart as $cart)
							<tr>
								<td>
                                    <a href=""><img style="width:130px;" src="{{ asset('/images/backend_images/product/small/'.$cart->image) }}" alt=""></a>

								</td>
								<td>
									<h4>{{ $cart->product_name }}</h4>
								<p>Product Code: {{ $cart->product_code }}</p>
                                </td>
                                <?php $product_price = Product::getProductPrice($cart->product_id,$cart->size); ?>

								<td>
									<p>PKR {{ $product_price}}</p>
								</td>

								<td>
									<p>	{{ $cart->quantity }}</p>
                                </td>
                                @endforeach

								<td>
									<p>PKR {{ $product_price*$cart->quantity }}</p>
								</td>
							</tr>
                            <?php $total_amount = $total_amount + ($product_price*$cart->quantity); ?>

							<tr>
								<td>
                                    <h4>Total</h4>
                                    <?php
										$grand_total = $total_amount
									 ?>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>	PKR {{ $grand_total }} </p>
								</td>
                            </tr>
                            <tr>
                                <form style="margin-left: 500px;margin-top:20px;" name="paymentForm" id="paymentForm" action="{{ url('/place-order') }}" method="post">{{ csrf_field() }}
                                    <input type="hidden" name="grand_total" value="{{ $grand_total }}">
                                    <div class="payment-options">
                                        <span>
                                            <label><strong>Select Payment Method:</strong></label>
                                        </span>

                                        <span>
                                            <label><input class=" pixel-radio" type="radio" name="payment_method" id="COD" value="COD"> <strong>COD</strong></label>
                                        </span>


                                        <span>
                                            <label><input class=" pixel-radio" type="radio" name="payment_method" id="Paypal" value="Paypal"> <strong>Paypal</strong></label>
                                        </span>


                                        <span style="">
                                            @if($cartCount>0)
                                            <button type="submit" class="genric-btn danger circle" onclick="return selectPaymentMethod();">Place Order</button>
                                       @endif
                                        </span>
                                    </div>
                                </form>
                            </tr>
						</tbody>
					</table>
				</div>
			</div>
        </div>


    </section>

	<!--================End Order Details Area =================-->
@endsection

@section('scripts')

<script>



function selectPaymentMethod(){
	if($('#Paypal').is(':checked') || $('#COD').is(':checked') ){
	}else{
		alert("Please select Payment Method");
		return false;
	}
}

</script>


@endsection
