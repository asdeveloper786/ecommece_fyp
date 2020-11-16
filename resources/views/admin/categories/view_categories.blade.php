@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="categoryError2" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="categorySuccess2" role="alert">

  </div>
@endif

<div id="page-wrapper" >
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

      <div class="row">
          <div class="col-md-12">
              <!-- Advanced Tables -->
              <div class="card">
                  <div class="card-action">
                    Categories List
                  </div>
                  <div class="card-content">
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover" id="categoryTable">
                              <thead>
                                  <tr>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Level</th>
                                    <th>Category URL</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($categories as $category)
                                  <tr class="odd gradeX">
                                    <td class="center">{{ $category->id }}</td>
                                    <td class="center">{{ $category->name }}</td>
                                    <td class="center">{{ $category->parent_id }}</td>
                                    <td class="center">{{ $category->slug }}</td>
                                    <td class="center">
                                    @if($category->status == 1)
                                    <i style="color: rgb(106, 216, 106)" class="far fa-check-circle"></i>
                                    @elseif($category->status==0)
                                    <i style="color: rgb(214, 83, 83)" class="far fa-times-circle"></i>

                                    @endif

                                    </td>
                                    <td class="center">

                                        <a href="{{ url('/admin/edit-category/'.$category->id) }}" class="btn btn-primary btn-mini"><i class="fas fa-edit"></i></a>


                                        <a   href="{{ url('/admin/delete-category/'.$category->id) }}" class="btn btn-danger btn-mini delete-confirm"><i class="far fa-trash-alt"></i></a></td>
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

   //category Error
   window.setTimeout(function() {
    $(".categoryError2").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'error',
  title: '{!! session('flash_message_error') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 0);
       //category Error
       window.setTimeout(function() {
    $(".categorySuccess2").fadeTo(0, 0).slideUp(0, function(){
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

$('#categoryTable').DataTable();




});
  </script>
@endsection
