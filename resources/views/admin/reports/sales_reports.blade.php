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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Search by Previous week</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/check-report') }}" id=">{{ csrf_field() }}
                        @csrf

                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach
                         @if(Session::has('flash_message_error'))
                         <div class="alert alert-error alert-block">
                             <button type="button" class="btn btn danger" data-dismiss="alert">×</button>
                                 <strong>{!! session('flash_message_error') !!}</strong>
                         </div>
                     @endif

                     @if(Session::has('flash_message_success'))
                         <div class="alert alert-success alert-block">
                             <button type="button" class="btn btn-danger" data-dismiss="alert">×</button>
                                 <strong>{!! session('flash_message_success') !!}</strong>
                         </div>
                     @endif
                        <div class="form-group row">
                            <label for="productName" class="col-md-4 col-form-label text-md-right">Previous Week</label>

                            <div class="col-md-6">
                                <select class="form-control" name="week">
                                    <option value="1">Last Week</option>


                                </select>                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" value="Search" class="btn btn-primary">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Search by month</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/check-report') }}" id=">{{ csrf_field() }}
                        @csrf

                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach
                         @if(Session::has('flash_message_error'))
                         <div class="alert alert-error alert-block">
                             <button type="button" class="btn btn danger" data-dismiss="alert">×</button>
                                 <strong>{!! session('flash_message_error') !!}</strong>
                         </div>
                     @endif

                     @if(Session::has('flash_message_success'))
                         <div class="alert alert-success alert-block">
                             <button type="button" class="btn btn-danger" data-dismiss="alert">×</button>
                                 <strong>{!! session('flash_message_success') !!}</strong>
                         </div>
                     @endif
                        <div class="form-group row">
                            <label for="productName" class="col-md-4 col-form-label text-md-right">Take a Date</label>

                            <div class="col-md-6">
                                    <select class="form-control" name="month">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">Nuvember</option>
                                        <option value="12">December</option>

                                    </select>
                                    <select class="form-control" name="year">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>


                                    </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" value="Search by month" class="btn btn-primary">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Search by Year</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/check-report') }}" id=">{{ csrf_field() }}
                        @csrf

                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach
                         @if(Session::has('flash_message_error'))
                         <div class="alert alert-error alert-block">
                             <button type="button" class="btn btn danger" data-dismiss="alert">×</button>
                                 <strong>{!! session('flash_message_error') !!}</strong>
                         </div>
                     @endif

                     @if(Session::has('flash_message_success'))
                         <div class="alert alert-success alert-block">
                             <button type="button" class="btn btn-danger" data-dismiss="alert">×</button>
                                 <strong>{!! session('flash_message_success') !!}</strong>
                         </div>
                     @endif
                        <div class="form-group row">
                            <label for="productName" class="col-md-4 col-form-label text-md-right">Take a Date</label>

                            <div class="col-md-6">

                                    <select class="form-control" name="year">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>


                                    </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" value="Search by year" class="btn btn-primary">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Search by date</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/check-report') }}" id=">{{ csrf_field() }}
                        @csrf

                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach
                         @if(Session::has('flash_message_error'))
                         <div class="alert alert-error alert-block">
                             <button type="button" class="btn btn danger" data-dismiss="alert">×</button>
                                 <strong>{!! session('flash_message_error') !!}</strong>
                         </div>
                     @endif

                     @if(Session::has('flash_message_success'))
                         <div class="alert alert-success alert-block">
                             <button type="button" class="btn btn-danger" data-dismiss="alert">×</button>
                                 <strong>{!! session('flash_message_success') !!}</strong>
                         </div>
                     @endif
                        <div class="form-group row">
                            <label for="productName" class="col-md-4 col-form-label text-md-right">Take a Date</label>

                            <div class="col-md-6">
                                <input id="product_name" type="date" class="form-control" name="from" autocomplete="category_name">
                                <input id="product_name" type="date" class="form-control" name="to" autocomplete="category_name">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" value="Search by date" class="btn btn-primary">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>





@endsection
@section('scripts')
<script>

  </script>
@endsection
