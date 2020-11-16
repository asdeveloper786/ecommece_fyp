@extends('layouts.frontLayout.front_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="accountError" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="accountSuccess" role="alert">

  </div>
@endif
	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
                <div class="col-lg-6">
					<div class="login_form_inner">
                        <h3>Update Account</h3>
                        <form class="row login_form" id="accountForm" name="accountForm" action="{{ url('/account') }}" method="POST" enctype="multipart/form-data">{{ csrf_field() }}
                            <div class="col-md-12 form-group">
                                <input class="form-control" value="{{ $userDetails->email }}" readonly="" />
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="form-control" value="{{ $userDetails->name }}" id="name" name="name" type="text" placeholder="Name" />
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="form-control"  value="{{ $userDetails->address }}" id="address" name="address" type="text" placeholder="Address"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="form-control" value="{{ $userDetails->city }}" id="city" name="city" type="text" placeholder="City"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="form-control" value="{{ $userDetails->state }}" id="state" name="state" type="text" placeholder="State"/>
                            </div>
                            <div class="col-md-12 form-group">
                            <select id="country" name="country">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->country_name }}" @if($country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <input class="form-control" value="{{ $userDetails->pincode }}" style="margin-top: 10px;" id="pincode" name="pincode" type="text" placeholder="Pincode"/>
                        </div>
                        <div class="col-md-12 form-group">
                            <input class="form-control" value="{{ $userDetails->mobile }}" id="mobile" name="mobile" type="text" placeholder="Mobile"/>
                        </div>
                        <div class="col-md-12 form-group">
                            <input class="form-control" value="{{ $userDetails->image }}" name="image" id="image" type="file">
                        </div>
							<div class="col-md-12 form-group">
                                <input  class="genric-btn danger circle"  type="submit" value="Update">
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
                        <h3>Change Password</h3>
                        <form class="row login_form" id="passwordForm" name="passwordForm" action="{{ url('/update-user-pwd') }}" method="POST">{{ @csrf_field() }}

                            <div class="col-md-12 form-group">
                                <label for="password" class=" col-form-label text-md-right">Current Password</label>

                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="password" class=" col-form-label text-md-right">New Password</label>

                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
							</div>
							<div class="col-md-12 form-group">
                                <label for="password" class=" col-form-label text-md-right">New Confirm Password</label>

                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
							</div>

							<div class="col-md-12 form-group">
                                <input  class="genric-btn danger circle"  type="submit" value="Update">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->




@endsection
@section('scripts')
<script>

jQuery(function(){
           //account Error
           window.setTimeout(function() {
    $(".accountError").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'error',
  title: 'Incorrect Information',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 1000);
       //account Error
       window.setTimeout(function() {
    $(".accountSuccess").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'success',
  title: '{!! session('flash_message_success') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 1000);
	// Validate account form on keyup and submit
	$("#passwordForm").validate({
		rules:{
			current_password:{
				required:true,

			},
			new_password:{
				required:true,

			},
			new_confirm_password:{
				required:true,

			},

		},
		messages:{

		}
	});
// Validate Register form on keyup and submit
$("#accountForm").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				accept: "[a-zA-Z]+"
			},
			address:{
				required:true,
				minlength:6
			},
			city:{
				required:true,
				minlength:2
			},
			state:{
				required:true,
				minlength:2
			},
			country:{
				required:true
			}
		},
		messages:{
			name:{
				required:"Please enter your Name",
				minlength: "Your Name must be atleast 2 characters long",
				accept: "Your Name must contain letters only"
			},
			address:{
				required:"Please provide your Address",
				minlength: "Your Address must be atleast 10 characters long"
			},
			city:{
				required:"Please provide your City",
				minlength: "Your City must be atleast 2 characters long"
			},
			state:{
				required:"Please provide your State",
				minlength: "Your State must be atleast 2 characters long"
			},
			country:{
				required:"Please select your Country"
			},
		}
	});


});

</script>
@endsection
