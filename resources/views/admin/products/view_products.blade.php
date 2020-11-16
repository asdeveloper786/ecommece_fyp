@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="productError2" role="alert">

</div>
@endif
@if(Session::has('flash_message_success'))

<div class="productSuccess2" role="alert">

</div>
@endif

<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Products List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data</li>
        </ol>

    </div>

    <div id="page-inner">
        <div style="margin-left:20px;">
            <a href="{{ url('/admin/export-products') }}" class="btn btn-primary btn-mini">Export&nbsp;<i class="fas fa-download"></i></a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="card">
                    <div class="card-action">
                        Products List
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="productTable">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>

                                        <th>Category Name</th>
                                        <th>Product Name</th>
                                        <th>Featured Item</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($products as $product)


                                    <tr>
                                        <td class="center">{{ $product->id }}</td>

                                        <td class="center">{{ $product->category_name }}</td>
                                        <td class="center">{{ $product->product_name }}</td>

                                        <td class="center">@if($product->feature_item==1)<i
                                                style="color: rgb(106, 216, 106)" class="far fa-check-circle"></i>
                                            @elseif($product->feature_item==0) <i style="color: rgb(214, 83, 83)"
                                                class="far fa-times-circle"></i>
                                            @endif</td>
                                        <td class="center">@if($product->status==1) <i style="color: rgb(106, 216, 106)"
                                                class="far fa-check-circle"></i> @elseif($product->status==0) <i
                                                style="color: rgb(214, 83, 83)" class="far fa-times-circle"></i>
                                            @endif</td>


                                        <td class="center">
                                            @if(!empty($product->image))
                                            <img src="{{ asset('/images/backend_images/product/small/'.$product->image) }}"
                                                style="width:50px;">
                                            @endif
                                        </td>
                                        <td class="center">


                                            <a href="{{ url('/admin/add-attributes/'.$product->id) }}"
                                                class="btn btn-success btn-mini"><i class="fas fa-plus-circle"></i></a>
                                            <a href="{{ url('/admin/edit-product/'.$product->id) }}"
                                                class="btn btn-primary btn-mini"><i class="fas fa-edit"></i></a>
                                            <a href="{{ url('/admin/add-images/'.$product->id) }}"
                                                class="btn btn-info btn-mini"><i class="fas fa-images"></i></a>
                                            <a href="/admin/delete-product/{{$product->id}}"
                                                class="btn btn-danger btn-mini delete-confirm"><i class="far fa-trash-alt"></i></a>
             <!-- Modal -->
             <div class="modal fade" id="myModal{{ $product->id }}" tabindex="-1"
                role="dialog" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                {{ $product->product_name }} Full Details</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Product ID: {{ $product->id }}</p>
                            <p>Category ID: {{ $product->category_id }}</p>
                            <p>Product Code: {{ $product->product_code }}</p>
                            <p>Product Color: {{ $product->product_color }}</p>
                            <p>Price: PKR {{ $product->price }}</p>
                            <p>Material & Care {{ $product->care }} </p>
                            <p>Description: {{ $product->description }}</p>
                        </div>

                    </div>
                </div>
            </div>
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
    </div>
</div>
        @endsection
        @section('scripts')
        <script>
            jQuery(function () {

                //product Error
                window.setTimeout(function () {
                    $(".productError2").fadeTo(0, 0).slideUp(0, function () {
                        swal({
                            position: 'top-end',
                            icon: 'error',
                            title: '{!! session('
                            flash_message_error ') !!}',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    });
                }, 0);
                //product Error
                window.setTimeout(function () {
                    $(".productSuccess2").fadeTo(0, 0).slideUp(0, function () {
                        swal({
                            position: 'top-end',
                            icon: 'success',
                            title: '{!! session('
                            flash_message_success ') !!}',
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
                    }).then(function (value) {
                        if (value) {
                            window.location.href = url;
                        }
                    });
                });

                $('#productTable').DataTable();




            });

        </script>
        @endsection
