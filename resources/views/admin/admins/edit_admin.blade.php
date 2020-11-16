@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="adminError1" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="adminSuccess1" role="alert">

  </div>
@endif
<div id="page-wrapper" >
    <div class="header">
                  <h1 class="page-header">
                       Admins
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
                    <h5 class="title">Edit Admin/SubAdmin</h5>
                  </div>
                  <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{ url('admin/edit-admin/'.$adminDetails->id) }}" name="edit_admin" id="edit_admin" novalidate="novalidate">{{ csrf_field() }}
                        @csrf
                        <div class="row">

                        <div class="col-md-3 px-md-1">
                          <div class="form-group">
                            <label>Type</label>
                            <input type="text" name="type" id="type" readonly="" value="{{ $adminDetails->type }}">
                        </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-3 pr-md-1">
                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" readonly="" value="{{ $adminDetails->username }}">
                        </div>
                        </div>
                        <div class="col-md-3 pl-md-1">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" required="" >
                        </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12 pl-md-1">
                          <div id="access">
                            <div class="switch">
                                <label>

                                  <input type="checkbox" name="categories_view_access"  value="1" style="margin-top: -3px;" @if($adminDetails->categories_view_access == "1") checked @endif>&nbsp;View Categories Only&nbsp;&nbsp;&nbsp;
                                  <span class="lever"></span>

                                </label>
                              </div>
                              <div class="switch">
                                <label>

                                    <input type="checkbox" name="categories_edit_access" id="categories_edit_access" value="1" style="margin-top: -3px;" @if($adminDetails->categories_edit_access == "1") checked @endif>&nbsp;View and Edit Categories&nbsp;&nbsp;&nbsp;
                                    <span class="lever"></span>

                                </label>
                              </div>
                              <div class="switch">
                                <label>

                                    <input type="checkbox" name="categories_full_access" id="categories_full_access" value="1" style="margin-top: -3px;"  @if($adminDetails->categories_full_access == "1") checked @endif>&nbsp;Full Categories Access&nbsp;&nbsp;&nbsp;
                                    <span class="lever"></span>

                                </label>
                              </div>
                              <div class="switch">
                                <label>

                                    <input type="checkbox" name="products_access" id="products_access" value="1" style="margin-top: -3px;"  @if($adminDetails->products_access == "1") checked @endif>&nbsp;Products&nbsp;&nbsp;&nbsp;
                                    <span class="lever"></span>

                                </label>
                              </div>
                              <div class="switch">
                                <label>

                                    <input type="checkbox" name="orders_access" id="orders_access" value="1" style="margin-top: -3px;" @if($adminDetails->orders_access == "1") checked @endif>&nbsp;Orders&nbsp;&nbsp;&nbsp;
                                    <span class="lever"></span>

                                </label>
                              </div>
                              <div class="switch">
                                <label>

                                    <input type="checkbox" name="users_access" id="users_access" value="1" style="margin-top: -3px;" @if($adminDetails->users_access == "1") checked @endif>&nbsp;Users
                                    <span class="lever"></span>

                                </label>
                              </div>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 pr-md-1">
                          <div class="form-group">
                            <input name="status"  type="checkbox" value="1" id="test6" @if($adminDetails->status == "1") checked @endif />
                            <label for="test6">Enable/Disable</label>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">

                                <button type="submit" class="btn btn-fill btn-primary">Edit Admin</button>

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

   //admin Error
   window.setTimeout(function() {
    $(".adminError1").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'error',
  title: '{!! session('flash_message_error') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 0);
       //admin Error
       window.setTimeout(function() {
    $(".adminSuccess1").fadeTo(0, 0).slideUp(0, function(){
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
	$("#edit_admin").validate({
		rules:{
			username:{
				required:true,
			},
			password:{
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
