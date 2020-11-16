@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="productAttributeError" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="productAttributeSuccess" role="alert">

  </div>
@endif
<div id="page-wrapper" >
    <div class="header">
                  <h1 class="page-header">
                       Product Attributes
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
                    <h5 class="title">Add Product Attributes</h5>
                  </div>
                  <div class="card-body">
                    <form  enctype="multipart/form-data" method="POST" action="{{ url('admin/add-attributes/'.$productDetails->id) }}" id="addAttributeForm" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                        <div class="form-group row">
                            <label for="productName" class="col-md-4 col-form-label text-md-right">Category Name:</label>

                            <div class="col-md-6">
                                <label class="col-md-4 col-form-label text-md-right">{{ $category_name }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productName" class="col-md-4 col-form-label text-md-right">Product Name:</label>

                            <div class="col-md-6">
                                <label class="col-md-4 col-form-label text-md-right">{{ $productDetails->product_name }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productName" class="col-md-4 col-form-label text-md-right">Product Code:</label>

                            <div class="col-md-6">
                                <label class="col-md-4 col-form-label text-md-right">{{ $productDetails->product_code }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productName" class="col-md-4 col-form-label text-md-right">Product Color:</label>
                            <div class="col-md-6">
                                <label class="col-md-4 col-form-label text-md-right">{{ $productDetails->product_color }}</label>
                            </div>
                        </div>



                        <div class="control-group">
                            <label class="control-label"></label>
                            <div class="controls field_wrapper">
                              <input  required title="Required" type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;">
                              <input required title="Required" type="text" name="size[]" id="size" placeholder="Size" style="width:120px;">
                              <input required title="Required" type="text" name="price[]" id="price" placeholder="Price" style="width:120px;">
                              <input required title="Required" type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;">
                              <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                            </div>
                          </div>



                        <div class="card-footer">
                            <div class="col-md-8 offset-md-4">
                                <input type="submit" value="Add Attribute" class="btn btn-primary">

                            </div>
                        </div>
                    </form>
                  </div>

                </div>
              </div>

              </div>
          <!-- /.col-lg-12 -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-action">
                Categories List
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <form action="{{ url('admin/edit-attributes/'.$productDetails->id) }}" method="post">{{ csrf_field() }}

                    <table class="table table-striped table-bordered table-hover" id="productAttributeTable">
                        <thead>
                            <tr>
                                <th>Attribute ID</th>
                                <th>SKU</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php /*echo "<pre>"; print_r($productDetails->attributes); die;*/ ?>
                                @foreach($productDetails->attributes as $attribute)
                                <tr class="gradeX">
                                  <td class="center"><input type="hidden" name="idAttr[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
                                  <td class="center">{{ $attribute->sku }}</td>
                                  <td class="center">{{ $attribute->size }}</td>
                                  <td class="center"><input name="price[]" type="text" value="{{ $attribute->price }}" /></td>
                                  <td class="center"><input name="stock[]" type="text" value="{{ $attribute->stock }}" required /></td>
                                  <td class="center">
                                    <input type="submit" value="Update" class="btn btn-primary btn-mini" />
                                    <?php /* <a rel="{{ $attribute->id }}" rel1="delete-attribute" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a> */ ?>
                                    <a href="{{ url('admin/delete-attribute/'.$attribute->id) }}" class="btn btn-danger btn-mini delete-confirm">Delete</a>
                                  </td>

                                </tr>
                                @endforeach
                    </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
 jQuery(function(){
    $('#productAttributeTable').DataTable();
   //product Error
   window.setTimeout(function() {
    $(".productAttributeError").fadeTo(0, 0).slideUp(0, function(){
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
    $(".productAttributeSuccess").fadeTo(0, 0).slideUp(0, function(){
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
	$("#addAttributeForm").validate({
		rules:{
            sku:{
				required:true
			},
			size:{
				required:true
			},

			price:{
				required:true,
				number:true
			},
			stock:{
				required:true
			}

		},
        messages:{


		}
	});


    var maxField = 10; //Input fields increment limitation
	    var addButton = $('.add_button'); //Add button selector
	    var wrapper = $('.field_wrapper'); //Input field wrapper
	    var fieldHTML = '<div class="controls field_wrapper" style="margin-left:-2px;"><input type="text" name="sku[]" style="width:120px"/>&nbsp;<input type="text" name="size[]" style="width:120px"/>&nbsp;<input type="text" name="price[]" style="width:120px"/>&nbsp;<input type="text" name="stock[]" style="width:120px"/><a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a></div>'; //New input field html
	    var x = 1; //Initial field counter is 1
	    $(addButton).click(function(){ //Once add button is clicked
	        if(x < maxField){ //Check maximum number of input fields
	            x++; //Increment field counter
	            $(wrapper).append(fieldHTML); // Add field html
	        }
	    });
	    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
	        e.preventDefault();
	        $(this).parent('div').remove(); //Remove field html
	        x--; //Decrement field counter
	    });


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





});
  </script>
@endsection
