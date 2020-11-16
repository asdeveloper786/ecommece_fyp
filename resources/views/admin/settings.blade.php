@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="settingError" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="settingSuccess" role="alert">

  </div>
@endif
<div id="page-wrapper" >
    <div class="header">
                  <h1 class="page-header">
                       Admin Settings
                  </h1>
                  <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Data</li>
              </ol>

  </div>

      <div id="page-inner">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    <h5 class="title">Edit Password</h5>
                  </div>
                  <div class="card-body">
                    <form method="POST" id="updatePasswordFrom" action="{{ url('/admin/update-pwd') }}">
                        @csrf
                        <div class="row">

                        <div class="col-md-6 px-md-1">
                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="{{ $adminDetails->username }}" readonly="" />
                        </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-md-1">
                          <div class="form-group">
                            <label>Current Password</label>
                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                        </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <div class="form-group">
                              <label>New Password</label>
                              <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                          </div>

                      </div>

                      <div class="row">
                        <div class="col-md-4 pr-md-1">
                          <div class="form-group">
                            <label >New Confirm Password</label>
                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">

                          </div>
                        </div>

                      </div>

                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">

                                <button type="submit" class="btn btn-fill btn-primary">Update Password</button>

                          </div>
                        </div>
                      </div>
                    </form>
                  </div>

                </div>
              </div>

              </div>
          <!-- /.col-lg-12 -->

@endsection
@section('scripts')
<script>
 jQuery(function(){
   //blog Error
   window.setTimeout(function() {
    $(".settingError").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'error',
  title: '{!! session('flash_message_error') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 0);
       //setting Error
       window.setTimeout(function() {
    $(".settingSuccess").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'success',
  title: '{!! session('flash_message_success') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 0);

	// Validate contact form on keyup and submit
	$("#updatePasswordFrom").validate({
		rules:{
			current_password:{
                required:true,
                minlength: 8,
			},
			new_password:{
                required:true,
                minlength: 8,
			},
            new_confirm_password:{
                required:true,
                minlength: 8,
			},







		},
        messages:{


		}
	});





});
  </script>
@endsection
