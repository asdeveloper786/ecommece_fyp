@extends('layouts.frontLayout.front_design')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/images/frontend_images/26.jpg/') }}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9   text-center" id="ftco-animate">
            <p class="breadcrumbs"><span class="mr-2"></span></p>
          <h1 class="mb-0 bread">

          My Orders
          </h1>
        </div>
      </div>
    </div>
  </div>


<div class="order_details_table">

    <div class="table-responsive">
        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="1" width="100%">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Ordered Products</th>
                    <th>Payment Method</th>
                    <th>Grand Total</th>
                    <th>Created on</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        @foreach($order->orders as $pro)
                            <a style="color:red" href="{{ url('/orders/'.$order->id) }}">{{ $pro->product_code }}</a><br>
                        @endforeach
                    </td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ $order->grand_total }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function () {
$('#dtBasicExample').DataTable();

});
    </script>

@endsection
