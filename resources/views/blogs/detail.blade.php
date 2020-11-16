@extends('layouts.frontLayout.front_design')
@section('content')
@if(Session::has('flash_message_success'))

<div class="productCommentSuccess" role="alert">

  </div>
@endif

<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/images/frontend_images/6.jpg/') }}');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9   text-center" id="ftco-animate">
            <p class="breadcrumbs"><span class="mr-2"></span></p>
          <h1 class="mb-0 bread">

            Blog
          </h1>
        </div>
      </div>
    </div>
  </div>
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ asset('images/frontend_images/blog/large/'.$blogDetails->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">

                                <ul class="blog_meta list">
                                    <li><a href="#">Admin<i class="lnr lnr-user"></i></a></li>
                                    <li><a href="#"> {{ $blogDetails->created_at }}</a></li>
                                    <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                                </ul>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2> {{ $blogDetails->title }}</h2>
                            <p class="excert">
                                {{ $blogDetails->description }}

                            </p>

                        </div>
                        <div class="col-lg-12">
                            <div class="quotes">
                                MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you should have to spend money on boot camp when you can get the MCSE study
                                materials yourself at a fraction of the camp price. However, who has the willpower to
                                actually sit through a self-imposed MCSE training.
                            </div>

                        </div>
                    </div>



                    <div class="comments-area">
                        <h4>Comments</h4>
                        @foreach($comments as $comment)
                        @if($comment->approve==1)
                        <div class="comment-list">

                            <div class="single-comment justify-content-between d-flex">

                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c1.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">{{$comment->name}}</a></h5>
                                        <p class="date">{{$comment->created_at}} </p>
                                        <p class="comment">
                                            {{$comment->comment}}
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        @endif
                        @endforeach
                    </div>

                    <div class="comment-form">
                        <h4>Leave a Reply</h4>

                        <form id="productCommentForm" action="{{url('/add-Blogcomment')}}" method="POST">{{csrf_field()}}
                            <input type="hidden" name="blog_id" value="{{$blogDetails->id}}">
                            <input type="hidden" name="approve"  id="status" value="0">

                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter Name'">
                                </div>

                            </div>

                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="comment" placeholder="Messege"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>
                            <input class="genric-btn danger circle"  type="submit" value="Post Comment">

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


@endsection
@section('scripts')
 <script>
 jQuery(function(){



        window.setTimeout(function() {
    $(".productCommentSuccess").fadeTo(0, 0).slideUp(0, function(){
        swal({
  position: 'top-end',
  icon: 'success',
  title: '{!! session('flash_message_success') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 1000);

	// Validate product review form on keyup and submit
	$("#productCommentForm").validate({
		rules:{

			name:{
				required:true
			},
            comment:{
				required:true
			},


		},
		messages:{


		}
	});


 	// Change Price with Size
     $("#selSize").change(function(){
		var idsize = $(this).val();
		if(idsize==""){
			return false;
		}
		$.ajax({
			type:'get',
			url:'/get-product-price',
			data:{idsize:idsize},
			success:function(resp){
                var arr = resp.split('#');
				$("#getPrice").html("PKR "+arr[0]);
                $("#price").val(arr[0]);
                if(arr[1]==0){
					$("#cartButton").hide();
					$("#Availability").text("Out Of Stock");
				}else{
					$("#cartButton").show();
					$("#Availability").text("In Stock");
				}

			},error:function(){
				alert("Error");
			}
		});
	});




 });
   </script>
 @endsection
