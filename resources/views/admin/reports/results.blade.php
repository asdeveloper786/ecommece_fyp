@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Categories List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data</li>
        </ol>

    </div>

    <div id="page-inner">

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">

          <div class="card">
            <div class="card-action">
                All Orders of
                @php
                if(isset($start_week)){
                    echo 'Previous Week';
                }elseif(isset($month) && isset($year)){
                    echo $month.'-'.$year;

                }elseif(isset($year)){
                    echo $year;
                }else{
                    echo $from.'-----'.$to;
                }

                 @endphp
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="orderTable">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
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
          <td class="center">{{ $order->created_at }}</td>
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
                    <h4>Total Amount ={{$sum}}</h4>

                </div>

            </div>
        </div>
        </div>
      </div>
    </div>
  </div>

@endsection
