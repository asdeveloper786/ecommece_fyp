
@extends('layouts.frontLayout.front_design')

@section('content')
@if(Session::has('flash_message_success'))

<div class="contactSuccess" role="alert">

  </div>
@endif

<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/images/frontend_images/6.jpg/') }}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9   text-center" id="ftco-animate">
            <p class="breadcrumbs"><span class="mr-2"></span></p>
          <h1 class="mb-0 bread">

          Contact Us

          </h1>
        </div>
      </div>
    </div>
  </div>
        <!-- ================ contact section start ================= -->
        <section class="contact-section">
            <div class="container">


                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="{{ url('/pages/contact') }}" method="post" id="contactForm" novalidate="novalidate">{{ csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject '" placeholder="subject">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-home"></i></span>
                            <div class="media-body">
                                <h3>Gujranwala, Pakistan</h3>
                                <p>Bagbanpura</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fas fa-tablet-alt"></i></span>
                            <div class="media-body">
                                <h3>+92306614252</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="far fa-envelope-open"></i></span>
                            <div class="media-body">
                                <h3>bt16218@pugc.edu.pk</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ contact section end ================= -->

@endsection
@section('scripts')
<script>
    jQuery(function(){
        //Contact Sucess

        window.setTimeout(function() {
    $(".contactSuccess").fadeTo(0, 0).slideUp(0, function(){
        swal({
  position: 'top-end',
  icon: 'success',
  title: '{!! session('flash_message_success') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 1000);

	// Validate contact form on keyup and submit
	$("#contactForm").validate({
		rules:{
			email:{
				required:true,
				email:true
			},
			name:{
				required:true
			},
            subject:{
				required:true
			},
            message:{
				required:true
			},

		},
		messages:{
			email:{
				required: "Please enter your Email",
				email: "Please enter valid Email"
			},
			name:{
				required:"Please provide your name"
			}

		}
	});



    });
    </script>

@endsection
