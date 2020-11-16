@extends('layouts.frontLayout.front_design')
@section('content')



  <div class="jumbotron text-center">
    <h1 class="display-3">Thank You!</h1>
	<h3>YOUR COD ORDER HAS BEEN PLACED</h3>


    <p class="lead">
    <a class="genric-btn danger circle" href="{{ url('/') }}" role="button">Continue Shopping</a>
    </p>
  </div>

@endsection

<?php
Session::forget('grand_total');
Session::forget('order_id');
?>
