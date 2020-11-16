

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

<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand waves-effect waves-dark" href="{{ url('/admin/dashboard') }}"><img src="{{asset('images/backend_images/logo/easyShopLogo.png')}}" alt=""></a>

    <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
        </div>

        <ul class="nav navbar-top-links navbar-right">

              <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>{{ Session::get('adminSession') }}</b> <i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </nav>
    <!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">

<li><a href="{{ url('/admin/settings') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
</li>
<li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
</li>
</ul>

   <!--/. NAV TOP  -->
