@extends('layouts.frontLayout.front_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="cartError" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="cartSuccess" role="alert">

  </div>
@endif
<?php use App\Product;
$cartCount = Product::cartCount();
?>

<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/images/frontend_images/banner/bg_6.jpg/') }}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9   text-center" id="ftco-animate">
            <p class="breadcrumbs"><span class="mr-2"></span></p>
          <h1 class="mb-0 bread">

            Shopping Cart
          </h1>
        </div>
      </div>
    </div>
  </div>
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
        <div class="col-md-12 ">
            <div class="cart-list">
                <table class="table">
                    <thead class="thead-primary">
                      <tr class="text-center">
                        <th>Remove</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $total_amount = 0; ?>
                        @foreach($userCart as $cart)
                      <tr class="text-center">
                        <td class="product-remove"><a href="{{ url('/cart/delete-product/'.$cart->id) }}"><span class="far fa-trash-alt"></span></a></td>

                        <td class="product-thumbnail"><a href="#"><img style="width:100px;" src="{{ asset('/images/backend_images/product/small/'.$cart->image) }}" alt="does not exit" /></a></td>

                        <td class="product-name">
                            <h3>{{ $cart->product_name }}</h3>
                            <p>Product Code: {{ $cart->product_code }}</p>
                        </td>
                        <?php $product_price = Product::getProductPrice($cart->product_id,$cart->size); ?>
                        <td class="price">{{ $product_price }}</td>

                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{ url('/cart/update-quantity/'.$cart->id.'/1') }}"> <i style="color: black;" class="fas fa-plus"></i> </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="1">
                                @if($cart->quantity>1)
                                    <a class="cart_quantity_down" href="{{ url('/cart/update-quantity/'.$cart->id.'/-1') }}"> <i style="color: black;" class="fas fa-minus"></i> </a>
                                @endif
                            </div>
                        </td>

                        <td class="total">PKR {{ $product_price*$cart->quantity }}</td>
                      </tr><!-- END TR-->

                  	<?php $total_amount = $total_amount + ($product_price*$cart->quantity); ?>
						@endforeach
                    </tbody>
                  </table>
              </div>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ">
            <div class="cart-total mb-3">
                <h3>Cart Totals</h3>

                <hr>
                <p class="d-flex total-price">
                    <span>Total</span>
                    <span>PKR<?php echo $total_amount; ?></span>
                </p>
            </div>
            @if($cartCount>0)
            <p style="margin-bottom: 50px;" class="text-center"><a href="{{ url('/checkout') }}" class="genric-btn danger circle">Proceed to Checkout</a></p>
       @endif
        </div>
    </div>
    </div>
</section>

@endsection

@section('scripts')
<script>

jQuery(function(){
           //cart Error
           window.setTimeout(function() {
    $(".cartError").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'error',
  title: '{!! session('flash_message_error') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 1000);
       //cart Error
       window.setTimeout(function() {
    $(".cartSuccess").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'success',
  title: '{!! session('flash_message_success') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 1000);





});

</script>
@endsection


