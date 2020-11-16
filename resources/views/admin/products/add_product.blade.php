@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="productError" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="productSuccess" role="alert">

  </div>
@endif
<div id="page-wrapper" >
    <div class="header">
                  <h1 class="page-header">
                       Products
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
                    <h5 class="title">Add Product</h5>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ url('admin/add-product') }}" id="addProductForm" >
                        @csrf
                        <div class="row">

                        <div class="col-md-6 px-md-1">
                          <div class="form-group">
                            <label>Product Name</label>
                            <input id="product_name" type="text" class="form-control" name="product_name" autocomplete="category_name">
                        </div>
                        </div>
                        <div class="col-md-6 pr-md-1">
                            <div class="form-group">
                              <label>Price</label>
                              <input id="price" type="text" class="form-control" name="price" autocomplete="price">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-md-1">
                          <div class="form-group">
                            <label>Under Category</label>
                            <select class="form-control" name="category_id" id="category_id" style="width:220px;">
                                <?php echo $categories_drop_down; ?>
                              </select>                        </div>
                        </div>
                        <div class="col-md-6 pl-md-1">
                          <div class="form-group">
                            <label>Product Code</label>
                            <input id="product_code" type="text" class="form-control" name="product_code" autocomplete="product_code">
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <div class="form-group">
                              <label>Product Color</label>
                              <input id="product_color" type="text" class="form-control" name="product_color" autocomplete="product_color">
                            </div>
                          </div>
                        <div class="col-md-6 pr-md-1">
                          <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" autocomplete="description" class="form-control" class="textarea_editor span12"></textarea>
                        </div>
                        </div>
                      </div>
                      <div class="row">

                        <div class="col-md-6 px-md-1">
                          <div class="form-group">
                            <label>Material & Care</label>
                            <textarea  id="care" name="care" autocomplete="care" class="form-control" class="textarea_editor span12"></textarea>
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
                        <div class="col-md-6 px-md-1">
                            <div class="form-group">

                              <input type="checkbox" name="feature_item" id="test5" value="1">
                              <label for="test5">Featured Item</label>
                          </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 pr-md-1">
                          <div class="form-group">

                            <label >Image</label>
                            <div  id="uniform-undefined"><input  class="form-control" name="image" id="image" type="file"></div>

                          </div>
                        </div>
                        <div class="col-md-4 px-md-1">
                            <div class="form-group">
                                <label >Video</label>
                                <div  id="uniform-undefined"><input  class="form-control" name="video" id="video" type="file"></div>

                          </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">

                                <button id="btnUpload" type="submit" class="btn btn-fill btn-primary">Save</button>

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
// Validate contact form on keyup and submit
$("#addProductForm").validate({
		rules:{
			product_name:{
				required:true,
			},
			product_code:{
				required:true
			},
            product_color:{
				required:true
			},
            price:{
				required:true
			},
            image:{
                required:true

			},
            category_id:{
				required:true
			},





		},
        messages:{


		}
	});





   //product Error
   window.setTimeout(function() {
    $(".productError").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'error',
  title: '{!! session('flash_message_error') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 0);
       //product Error
       window.setTimeout(function() {
    $(".productSuccess").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'success',
  title: '{!! session('flash_message_success') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 0);




});
  </script>
@endsection
