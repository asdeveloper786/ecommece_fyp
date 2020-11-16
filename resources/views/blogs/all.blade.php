@extends('layouts.frontLayout.front_design')
@section('content')
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
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @foreach($blogs as $blog)
                        <article class="row blog_item" data-aos="zoom-in-right">
                            <div class="col-md-3">
                                <div class="blog_info text-right">

                                    <ul class="blog_meta list">
                                        <li><a href="#">Admin<i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#">{{ $blog->created_at }}</a></li>
                                        <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{ asset('/images/frontend_images/blog/large/'.$blog->image) }}" alt="">
                                    <div class="blog_details">
                                      
                                            <h2>{{ $blog->title }}</h2>
                                     
                                        <p>{{ $blog->description }}</p>
                                        <p>
                                        <div class="single-pro-share">
                                            <div class="addthis_inline_share_toolbox" data-url="{{ url('/blog/'.$blog->id) }}"></div>
                                            <div class="sharethis-inline-share-buttons"></div>
                                                   </div></p>
                                        <a href="{{ url('/blog/'.$blog->id) }}" class="white_bg_btn btn-danger">View More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="page-item"><a href="#" class="page-link">01</a></li>
                                <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                <li class="page-item"><a href="#" class="page-link">03</a></li>
                                <li class="page-item"><a href="#" class="page-link">04</a></li>
                                <li class="page-item"><a href="#" class="page-link">09</a></li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-right"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


@endsection
