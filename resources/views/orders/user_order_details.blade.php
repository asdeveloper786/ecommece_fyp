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
        <table id="orders" class="table table-striped table-bordered" cellspacing="100" width="100%">
            <thead>
                <tr>
                    <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Size</th>
                        <th>Product Color</th>
                        <th>Product Price</th>
                        <th>Product Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderDetails->orders as $pro)
                <tr>
                    <td>{{ $pro->product_code }}</td>
                    <td>{{ $pro->product_name }} <span></span></td>
                    <td>{{ $pro->product_size }}</td>
                    <td>{{ $pro->product_color }}</td>
                    <td>{{ $pro->product_price }}</td>
                    <td>{{ $pro->product_qty }}</td>
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
$('#orders').DataTable();
$('.dataTables_length').addClass('bs-select');
});
    </script>

@endsection
