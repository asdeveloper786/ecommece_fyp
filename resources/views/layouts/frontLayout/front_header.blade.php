<?php
use App\Http\Controllers\Controller;
use App\Product;
$mainCategories =  Controller::mainCategories();
$cartCount = Product::cartCount();

?>
   <!--? Preloader Start -->
   <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{asset('images/frontend_images/logo/easyShopLogo.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ url('/') }}"><img src="{{asset('images/frontend_images/logo/easyShopLogo.png')}}" alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="#">Shop</a>
                                    <ul class="submenu">
                                        @foreach($mainCategories as $cat)
                                        @if($cat->status ==1)
                                        <li><a href="{{ asset('products/'.$cat->slug) }}">{{ $cat->name }}</a></li>
                                        @endif
                                    @endforeach
                                    </ul>

                                </li>

                                <li><a href="{{ url('/blogs/all') }}">Blog</a>

                                </li>
                                <li><a href="{{ url('/orders') }}">Orders</a>

                                </li>
                                <li><a href="{{ url('/pages/contact') }}">Contact</a></li>
                                @if(empty(Auth::check()))
                                @else
                                <li><a href="#">Account</a>
                                    <ul class="submenu">

                                        <li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Settings</a></li>
                                        <li><a href="{{ url('/user-logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>

                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="nav-search search-switch">

                                    <span class="fas fa-search" data-toggle="modal" data-target="#exampleModal"></span>
                                </div>
                            </li>



                                <li><a href="{{ url('/cart') }}"><span class="fas fa-shopping-cart">({{ $cartCount }})</span></a> </li>
                                @if(empty(Auth::check()))
                                <li> <a href="{{ url('/login-register') }}"><span class="far fa-user"></span></a></li>
                                @endif
                            </ul>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<!-- Search model -->
<div class="modal fade search-model-box" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Search Products</h5>

        </div>
        <div class="modal-body">
            <div class="h-100 d-flex align-items-center justify-content-center">

                <form class="search-model-form" action="{{ url('/search-product') }}" method="post">{{ csrf_field() }}
                    <input type="text" id="search-input" placeholder="....." name="product">
                </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="search-close-btn" data-dismiss="modal">+</button>

        </div>
      </div>
    </div>
  </div>
<!-- End Search Modal -->
