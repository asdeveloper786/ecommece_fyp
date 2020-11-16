@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="productError1" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="productSuccess1" role="alert">

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
                    <h5 class="title">Edit Product</h5>
                  </div>
                  <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ url('admin/edit-product/'.$productDetails->id) }}" id="editProductForm" >
                        @csrf
                        <div class="row">

                        <div class="col-md-6 px-md-1">
                          <div class="form-group">
                            <label>Product Name</label>
                            <input value="{{ $productDetails->product_name }}" id="product_name" type="text" class="form-control" name="product_name" autocomplete="category_name">
                        </div>
                        </div>
                        <div class="col-md-6 pr-md-1">
                            <div class="form-group">
                              <label>Price</label>
                              <input value="{{ $productDetails->price }}" id="price" type="text" class="form-control" name="price" autocomplete="price">
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
                            <input value="{{ $productDetails->product_code }}" id="product_code" type="text" class="form-control" name="product_code" autocomplete="product_code">
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <div class="form-group">
                              <label>Product Color</label>
                              <input value="{{ $productDetails->product_color }}" id="product_color" type="text" class="form-control" name="product_color" autocomplete="product_color">
                            </div>
                          </div>
                        <div class="col-md-6 pr-md-1">
                          <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" autocomplete="description" class="form-control" class="textarea_editor span12">{{ $productDetails->description }}</textarea>
                        </div>
                        </div>
                      </div>
                      <div class="row">

                        <div class="col-md-6 px-md-1">
                          <div class="form-group">
                            <label>Material & Care</label>
                            <textarea  id="care" name="care" autocomplete="care" class="form-control" class="textarea_editor span12">{{ $productDetails->care }}</textarea>
                        </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-4 pr-md-1">
                          <div class="form-group">
                            <input id="test6" type="checkbox" name="status" id="status" @if($productDetails->status == "1") checked @endif value="1">
                            <label for="test6">Enable/Disable</label>
                          </div>
                        </div>
                        <div class="col-md-6 px-md-1">
                            <div class="form-group">

                                <input id="test5" type="checkbox" name="feature_item" id="feature_item" @if($productDetails->feature_item == "1") checked @endif value="1">
                                <label for="test5">Featured Item</label>
                          </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-md-1">
                          <div class="form-group">

                            <label >Image</label>
                            <table>
                                <tr>
                                  <td>
                                    <input class="form-control"  name="image" id="image" type="file" value="{{ $productDetails->image }}">
                                    @if(empty($productDetails->image))
                                      <input  type="hidden" name="current_image" value="{{ $productDetails->image }}">
                                    @endif
                                  </td>
                                  <td>
                                    @if(!empty($productDetails->image))
                                      <img style="width:30px;" src="{{ asset('/images/backend_images/product/small/'.$productDetails->image) }}"> | <a href="{{ url('/admin/delete-product-image/'.$productDetails->id) }}">Delete</a>
                                    @endif
                                  </td>
                                </tr>
                              </table>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-4 px-md-1">
                            <div class="form-group">
                                <label >Video</label>
                                <div  id="uniform-undefined"><input  class="form-control" name="video" id="video" type="file">
                                    @if(!empty($productDetails->video))
                                    <input type="hidden" name="current_video" value="{{ $productDetails->video }}">
                                    <a target="_blank" href="{{ url('videos/'.$productDetails->video) }}">View</a> |
                                    <a href="{{ url('/admin/delete-product-video/'.$productDetails->id) }}">Delete</a>
                                  @endif
                                </div>

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
   //product Error
   window.setTimeout(function() {
    $(".productError1").fadeTo(0, 0).slideUp(0, function(){
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
    $(".productSuccess1").fadeTo(0, 0).slideUp(0, function(){
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
	$("#editProductForm").validate({
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





});
  </script>
@endsection
