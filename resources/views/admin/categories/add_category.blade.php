@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="categoryError" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="categorySuccess" role="alert">

  </div>
@endif
<div id="page-wrapper" >
    <div class="header">
                  <h1 class="page-header">
                       Categories
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
                    <h5 class="title">Add Category</h5>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ url('admin/add-category') }}" id="addCategoryForm">
                        @csrf
                        <div class="row">

                        <div class="col-md-3 px-md-1">
                          <div class="form-group">
                            <label>Category Name</label>
                            <input id="category_name" type="text" class="form-control" name="category_name" autocomplete="category_name">
                        </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-md-1">
                          <div class="form-group">
                            <label>Category Level</label>
                            <select name="parent_id" class="form-control" style="width:220px;">
                                <option value="0">Main Category</option>
                                @foreach($levels as $val)
                                <option value="{{ $val->id }}">{{ $val->name }}</option>
                                @endforeach
                              </select>                          </div>
                        </div>
                        <div class="col-md-6 pl-md-1">
                          <div class="form-group">
                            <label>URL</label>
                            <input id="url" type="text" class="form-control" name="slug" autocomplete="url">
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" autocomplete="description" class="form-control" class="textarea_editor span12"></textarea>
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 pr-md-1">
                          <div class="form-group">
                            <input name="status"  type="checkbox" value="1" id="test6"  />
                            <label for="test6">Enable/Disable</label>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">

                                <button type="submit" class="btn btn-fill btn-primary">Save</button>

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
   //category Error
   window.setTimeout(function() {
    $(".categoryError").fadeTo(0, 0).slideUp(0, function(){
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
    $(".categorySuccess").fadeTo(0, 0).slideUp(0, function(){
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
	$("#addCategoryForm").validate({
		rules:{
			category_name:{
				required:true,
			},
			slug:{
				required:true
			},
            description:{
				required:true
			},




		},
        messages:{
			category_name:{
				required: "Required",
			},
			slug:{
				required:"Required",
			},
            description:{
				required:"Required",
			},

		}
	});





});
  </script>
@endsection
