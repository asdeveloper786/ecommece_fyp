@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="orderError" role="alert">

</div>
@endif
@if(Session::has('flash_message_success'))

<div class="orderSuccess" role="alert">

</div>
@endif

<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Order Detail
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data</li>
        </ol>

    </div>

    <div id="page-inner">


        <div class="row">
            <div class="col-md-12">

                <table class="table table-striped table-bordered">
                    <tbody>
                      <tr>
                        <td class="taskDesc">Order Date</td>
                        <td class="taskStatus">{{ $orderDetails->created_at }}</td>
                      </tr>
                      <tr>
                        <td class="taskDesc">Order Status</td>
                        <td class="taskStatus">{{ $orderDetails->order_status }}</td>
                      </tr>
                      <tr>
                        <td class="taskDesc">Order Total</td>
                        <td class="taskStatus">PKR {{ $orderDetails->grand_total }}</td>
                      </tr>
                      <tr>
                        <td class="taskDesc">Shipping Charges</td>
                        <td class="taskStatus">PKR {{ $orderDetails->shipping_charges }}</td>
                      </tr>


                      <tr>
                        <td class="taskDesc">Payment Method</td>
                        <td class="taskStatus">{{ $orderDetails->payment_method }}</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5>Billing Address</h5>
                <table class="table table-striped table-bordered">
                    <tbody>
                      <tr>
                        <td     {{ $userDetails->name }} <br>
                            {{ $userDetails->address }} <br>
                            {{ $userDetails->city }} <br>
                            {{ $userDetails->state }} <br>
                            {{ $userDetails->country }} <br>
                            {{ $userDetails->pincode }} <br>
                            {{ $userDetails->mobile }} <br></td>

                      </tr>

                    </tbody>
                  </table>
            </div>
            <div class="col-md-6">
                <h5>Shiping Address</h5>
                <table class="table table-striped table-bordered">
                    <tbody>
                      <tr>
                        <td     {{ $userDetails->name }} <br>
                            {{ $userDetails->address }} <br>
                            {{ $userDetails->city }} <br>
                            {{ $userDetails->state }} <br>
                            {{ $userDetails->country }} <br>
                            {{ $userDetails->pincode }} <br>
                            {{ $userDetails->mobile }} <br></td>

                      </tr>

                    </tbody>
                  </table>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <h5>Customer Details</h5>
                <table class="table table-striped table-bordered">
                    <tbody>
                      <tr>
                        <td class="taskDesc">Customer Name</td>
                        <td class="taskStatus">{{ $orderDetails->name }}</td>
                      </tr>
                      <tr>
                        <td class="taskDesc">Customer Email</td>
                        <td class="taskStatus">{{ $orderDetails->user_email }}</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="col-md-3">
                <h5>Update Order Status</h5>
                <form action="{{ url('admin/update-order-status') }}" method="post">{{ csrf_field() }}
                    <input type="hidden" name="order_id" value="{{ $orderDetails->id }}">

                          <select name="order_status" id="order_status" class="form-control" >
                            <option value="New" @if($orderDetails->order_status == "New") selected @endif>New</option>
                            <option value="Pending" @if($orderDetails->order_status == "Pending") selected @endif>Pending</option>
                            <option value="Cancelled" @if($orderDetails->order_status == "Cancelled") selected @endif>Cancelled</option>
                            <option value="In Process" @if($orderDetails->order_status == "In Process") selected @endif>In Process</option>
                            <option value="Shipped" @if($orderDetails->order_status == "Shipped") selected @endif>Shipped</option>
                            <option value="Delivered" @if($orderDetails->order_status == "Delivered") selected @endif>Delivered</option>
                            <option value="Paid" @if($orderDetails->order_status == "Paid") selected @endif>Paid</option>
                          </select>

                          <div style="margin-top: 10px;" class="row">
                            <div class="col-md-8">
                              <div class="form-group">

                                    <button type="submit" class="btn btn-fill btn-primary">Update</button>

                              </div>
                            </div>
                          </div>
                  </form>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="card">
                    <div class="card-action">
                        Ordered Products
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="orderProductTable">
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
                                        <td>{{ $pro->product_name }}</td>
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
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        @endsection
        @section('scripts')
        <script>
            jQuery(function () {

                //order Error
                window.setTimeout(function () {
                    $(".orderError").fadeTo(0, 0).slideUp(0, function () {
                        swal({
                            position: 'top-end',
                            icon: 'error',
                            title: '{!! session('
                            flash_message_error ') !!}',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    });
                }, 0);
                //order Error
                window.setTimeout(function () {
                    $(".orderSuccess").fadeTo(0, 0).slideUp(0, function () {
                        swal({
                            position: 'top-end',
                            icon: 'success',
                            title: '{!! session('flash_message_success ') !!}',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    });
                }, 0);


                $('#orderProductTable').DataTable();




            });

        </script>
        @endsection

