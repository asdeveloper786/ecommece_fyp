@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="orderError2" role="alert">

</div>
@endif
@if(Session::has('flash_message_success'))

<div class="orderSuccess2" role="alert">

</div>
@endif

<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Orders
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
                <!-- Advanced Tables -->
                <div class="card">
                    <div class="card-action">
                        Orders List
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="orderTable">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>

                                        <th>Customer Email</th>

                                        <th>Order Status</th>
                                        <th>Payment Method</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                	@foreach($orders as $order)
                <tr class="gradeX">
                  <td class="center">{{ $order->id }}</td>

                  <td class="center">{{ $order->user_email }}</td>

                  <td class="center">{{ $order->order_status }}</td>
                  <td class="center">{{ $order->payment_method }}</td>
                  <td class="center">
                    <a target="_blank" href="{{ url('admin/view-order/'.$order->id)}}" class="btn btn-success btn-mini"><i class="far fa-eye"></i></a>
                    @if($order->order_status == "Shipped" || $order->order_status == "Delivered" || $order->order_status == "Paid")
                      <a target="_blank" href="{{ url('admin/view-order-invoice/'.$order->id)}}" class="btn btn-warning btn-mini"><i class="fas fa-file-invoice"></i></a>
                      <a target="_blank" href="{{ url('admin/view-pdf-invoice/'.$order->id)}}" class="btn btn-primary btn-mini"><i class="fas fa-file-pdf"></i></a>
                    @endif
                  </td>
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
                    $(".orderError2").fadeTo(0, 0).slideUp(0, function () {
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
                    $(".orderSuccess2").fadeTo(0, 0).slideUp(0, function () {
                        swal({
                            position: 'top-end',
                            icon: 'success',
                            title: '{!! session('
                            flash_message_success ') !!}',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    });
                }, 0);


                $('#orderTable').DataTable();




            });

        </script>
        @endsection

