@extends('layouts.frontLayout.front_design')
@section('content')
@if(Session::has('flash_message_error'))

<div class="forgetError" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="forgetSuccess" role="alert">

  </div>
@endif
<section id="form" style="margin-top:20px;"><!--form-->
	<div class="container">
		<div class="row">

			<div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <div class="col-md-12 ">
                        <h2>Forgot Password?</h2>                    </div>

					<form id="forgotPasswordForm" name="forgotPasswordForm" action="{{ url('/forgot-password') }}" method="POST">{{ csrf_field() }}
                        <div class="col-md-12 form-group">
                            <input class="form-control"  name="email" type="email" placeholder="Email Address" required="" />
                        </div>
                        <div class="col-md-12 ">
                            <input class="genric-btn danger circle"  type="submit" value="Submit">
                        </div>					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Register</h3>
                    <form class="row login_form" id="registerForm" name="registerForm" action="{{ url('/user-register') }}" method="POST">{{ csrf_field() }}

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="myPassword" name="password"  placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                        </div>

                        <div class="col-md-12 form-group">
                            <input class="genric-btn danger circle"  type="submit" value="Register">
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</section><!--/form-->

@endsection
@section('scripts')
<script>
jQuery(function(){
    //forget Error
 window.setTimeout(function() {
 $(".forgetError").fadeTo(0, 0).slideUp(0, function(){
     swal({
 position: 'top-end',
icon: 'error',
title: '{!! session('flash_message_error') !!}',
showConfirmButton: false,
timer: 3000
})
 });
}, 1000);
    //forget Error
    window.setTimeout(function() {
 $(".forgetSuccess").fadeTo(0, 0).slideUp(0, function(){
     swal({
 position: 'top-end',
icon: 'success',
title: '{!! session('flash_message_success') !!}',
showConfirmButton: false,
timer: 3000
})
 });
}, 1000);

 // Validate Register form on keyup and submit
 $("#registerForm").validate({
     rules:{
         name:{
             required:true,
             minlength:2,
             accept: "[a-zA-Z]+"
         },
         password:{
             required:true,

         },
         email:{
             required:true,
             email:true,
             remote:"/check-email"
         }
     },
     messages:{
         name:{
             required:"Please enter your Name",
             minlength: "Your Name must be atleast 2 characters long",
             accept: "Your Name must contain letters only"
         },
         password:{
             required:"Please provide your Password",

         },
         email:{
             required: "Please enter your Email",
             email: "Please enter valid Email",
             remote: "Email already exists!"
         }
     }
 });

 // Password Strength Script
 $('#myPassword').passtrength({
   minChars: 4,
   passwordToggle: true,
   tooltip: true,
   eyeImg : "/images/frontend_images/eye.svg"
 });

 });


</script>
@endsection
