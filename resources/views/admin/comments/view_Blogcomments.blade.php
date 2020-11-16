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

<div id="page-wrapper" >
    <div class="header">
                  <h1 class="page-header">
                      Blogs Comment List
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
                    Blogs Comment List
                  </div>
                  <div class="card-content">
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover" id="blogCommentTable">
                              <thead>
                                  <tr>
                                    <th>Comment ID</th>
                                    <th> Name</th>
                                    <th>Message</th>

                                    <th>Approval</th>
                                    <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td class="center">{{ $comment->id }}</td>
                                    <td class="center">{{ $comment->name }}</td>
                                    <td class="center">{{ $comment->comment }}</td>

                                    @if($comment->approve==0)
                                    <td class="center">Disapproved</td>
                                    @elseif($comment->approve==1)
                                    <td class="center">Approved</td>
                                    @endif
                                    <td>
                                        <form action="{{url('/toggle-Blogapprove/{id}')}}" method="POST">
                                            {{csrf_field()}}
                                            <div class="switch">
                                                <label>

                                                  <input type="checkbox" name="approve"  value="{{$comment->approve}}" style="margin-top: -3px;" @if($comment->approve == "1") checked @endif >&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <span class="lever"></span>

                                                </label>
                                              </div>


                                               <input type="hidden" name="commentId" value="{{$comment->id}}">
                                            <input class="btn btn-primary" type="submit" value="Done">

                                        </form>

                                    </td>

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
 jQuery(function(){

   //blog Error
   window.setTimeout(function() {
    $(".blogError2").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'error',
  title: '{!! session('flash_message_error') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 0);
       //blog Error
       window.setTimeout(function() {
    $(".blogSuccess2").fadeTo(0, 0).slideUp(0, function(){
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

$('#blogCommentTable').DataTable();




});
  </script>
@endsection
