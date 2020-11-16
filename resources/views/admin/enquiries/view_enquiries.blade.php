@extends('layouts.adminLayout.admin_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="enquiryError2" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="enquirySuccess2" role="alert">

  </div>
@endif

<div id="page-wrapper" >
    <div class="header">
                  <h1 class="page-header">
                    Enquiries List
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
              <div class="card" id="app">
                  <div class="card-action">
                    Enquiries List
                  </div>
                  <div class="card-content">
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover" id="enquiryTable">
                              <thead>
                                  <tr>
                                    <th style="text-align: left;">Name</th>
                                    <th style="text-align: left;">Email</th>
                                    <th style="text-align: left;">Subject</th>
                                    <th style="text-align: left;">Message</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr v-for="enquiry in enquiries">
                                    <td>@{{enquiry.name}}</td>
                                    <td>@{{enquiry.email}}</td>
                                    <td>@{{enquiry.subject}}</td>
                                    <td>@{{enquiry.message}}</td>
                                  </tr>
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

   //enquiry Error
   window.setTimeout(function() {
    $(".enquiryError2").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'error',
  title: '{!! session('flash_message_error') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 0);
       //enquiry Error
       window.setTimeout(function() {
    $(".enquirySuccess2").fadeTo(0, 0).slideUp(0, function(){
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

$('#enquiryTable').DataTable();




});
  </script>
@endsection
