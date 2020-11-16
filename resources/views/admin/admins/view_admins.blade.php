@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="adminError2" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="adminSuccess2" role="alert">

  </div>
@endif

<div id="page-wrapper" >
    <div class="header">
                  <h1 class="page-header">
                      Admins List
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
                    Admins List
                  </div>
                  <div class="card-content">
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover" id="adminTable">
                              <thead>
                                  <tr>
                                    <th style="text-align: left">ID</th>
                                    <th style="text-align: left">Username</th>
                                    <th style="text-align: left">Type</th>
                                    <th style="text-align: left">Roles</th>
                                    <th style="text-align: left">Status</th>
                                    <th style="text-align: left">Created on</th>
                                    <th style="text-align: left">Updated on</th>
                                    <th style="text-align: left">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($admins as $admin)
                                <?php if($admin->type=="Admin"){
                                  $roles = "All";
                                }else{
                                  $roles = "";
                                  if($admin->categories_access==1){
                                    $roles .= "Categories, ";
                                  }
                                  if($admin->products_access==1){
                                    $roles .= "Products, ";
                                  }
                                  if($admin->orders_access==1){
                                    $roles .= "Orders, ";
                                  }
                                  if($admin->users_access==1){
                                    $roles .= "Users, ";
                                  }
                                }
                                ?>
                                <tr class="gradeX">
                                  <td class="center">{{ $admin->id }}</td>
                                  <td class="center">{{ $admin->username }}</td>
                                  <td class="center">{{ $admin->type }}</td>
                                  <td class="center">{{ $roles }}</td>
                                  <td class="center">
                                    @if($admin->status==1)
                                      <span style="color:green">Active</span>
                                    @else
                                      <span style="color:red">Inactive</span>
                                    @endif
                                  </td>
                                  <td class="center">{{ $admin->created_at }}</td>
                                  <td class="center">{{ $admin->updated_at }}</td>
                                  <td class="center">
                                    <a href="{{ url('/admin/edit-admin/'.$admin->id) }}" class="btn btn-primary btn-mini">Edit</a>
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
 jQuery(function(){

   //admin Error
   window.setTimeout(function() {
    $(".adminError2").fadeTo(0, 0).slideUp(0, function(){
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
    $(".adminSuccess2").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'success',
  title: '{!! session('flash_message_success') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 0);


    $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});

$('#adminTable').DataTable();




});
  </script>
@endsection
