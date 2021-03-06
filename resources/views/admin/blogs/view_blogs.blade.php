@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="blogError2" role="alert">

</div>
@endif
@if(Session::has('flash_message_success'))

<div class="blogSuccess2" role="alert">

</div>
@endif

<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Blog List
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
                        Blog List
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="blogTable">
                                <thead>
                                    <tr>
                                        <th>Blog ID</th>
                                        <th>Blog Title</th>
                                        <th>Blog Url</th>
                                        <th>Blog Image</th>
                                        <th>Blog Desription</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                    <tr>
                                        <td class="center">{{ $blog->id }}</td>
                                        <td class="center">{{ $blog->title }}</td>
                                        <td class="center">{{ $blog->slug }}</td>
                                        <td class="center">
                                            @if(!empty($blog->image))
                                            <img src="{{ asset('/images/frontend_images/blog/small/'.$blog->image) }}"
                                                style="width:50px;">
                                            @endif
                                        </td>
                                        <td class="center">{{ $blog->description }}</td>
                                        <td class="center">

                                            <a href="{{ url('/admin/edit-blog/'.$blog->id) }}" class="btn btn-primary btn-mini">Edit</a>


                                            <a  href="{{ url('/admin/delete-blog/'.$blog->id) }}" class="btn btn-danger btn-mini delete-confirm"> Delete</a></td>
                                    </tr>
                                  </tbody>
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
            jQuery(function () {

                //product Error
                window.setTimeout(function () {
                    $(".blogError2").fadeTo(0, 0).slideUp(0, function () {
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
                //blog Error
                window.setTimeout(function () {
                    $(".blogSuccess2").fadeTo(0, 0).slideUp(0, function () {
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

                $('#blogTable').DataTable();




            });

        </script>
        @endsection
