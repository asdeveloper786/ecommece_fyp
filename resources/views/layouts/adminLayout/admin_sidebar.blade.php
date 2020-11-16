<?php $url = url()->current(); ?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a <?php if (preg_match("/dashboard/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            @if(Session::get('adminDetails')['categories_full_access']==1)
                <li>
                    <a <?php if (preg_match("/categor/i", $url)){ ?> style="display: block;" <?php } ?>  class="waves-effect waves-dark"><i class="fas fa-tools"></i> Categories<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a <?php if (preg_match("/add-category/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/add-category')}}">Add Categories</a>
                        </li>
                        <li>
                            <a <?php if (preg_match("/view-categories/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-categories')}}">View Categories</a>
                        </li>

                    </ul>
                </li>
                @else
                <li>
                    <a <?php if (preg_match("/categor/i", $url)){ ?> style="display: block;" <?php } ?>  class="waves-effect waves-dark"><i class="fas fa-tools"></i> Categories<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @if(Session::get('adminDetails')['categories_edit_access']==1)
                        <li>
                            <a <?php if (preg_match("/add-category/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/add-category')}}">Add Categories</a>
                        </li>
                        @endif
                        @if(Session::get('adminDetails')['categories_view_access']==1)
                        <li>
                            <a <?php if (preg_match("/view-categories/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-categories')}}">View Categories</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                @if(Session::get('adminDetails')['products_access']==1)

                <li>
                    <a <?php if (preg_match("/product/i", $url)){ ?> style="display: block;" <?php } ?>  class="waves-effect waves-dark"><i class="fab fa-product-hunt"></i> Products<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <li>
                            <a <?php if (preg_match("/add-product/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/add-product')}}">Add Products</a>
                        </li>


                        <li>
                            <a <?php if (preg_match("/view-products/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-products')}}">View Products</a>
                        </li>

                    </ul>
                </li>
            @endif
            @if(Session::get('adminDetails')['orders_access']==1)

            <li>
                <a <?php if (preg_match("/order/i", $url)){ ?> style="display: block;" <?php } ?>  class="waves-effect waves-dark"><i class="fab fa-first-order-alt"></i> Orders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a <?php if (preg_match("/view-orders/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-orders')}}">View Orders</a>
                    </li>


                    <li>
                        <a <?php if (preg_match("/view-orders-charts/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-orders-charts')}}">View Orders Chart</a>
                    </li>

                </ul>
            </li>
        @endif
        @if(Session::get('adminDetails')['type']=="Admin")

        <li>
            <a <?php if (preg_match("/report/i", $url)){ ?> style="display: block;" <?php } ?>  class="waves-effect waves-dark"><i class="fas fa-balance-scale-right"></i> Reports<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">

                <li>
                    <a <?php if (preg_match("/search-reports/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/search-reports')}}">Sales Reports</a>
                </li>



            </ul>
        </li>
    @endif
    @if(Session::get('adminDetails')['users_access']==1)

    <li>
        <a <?php if (preg_match("/user/i", $url)){ ?> style="display: block;" <?php } ?>  class="waves-effect waves-dark"><i class="fas fa-users"></i> Users<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">

            <li>
                <a <?php if (preg_match("/view-users/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-users')}}">View Users</a>
            </li>


            <li>
                <a <?php if (preg_match("/view-users-charts/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-users-charts')}}">View Users Chart</a>
            </li>

        </ul>
    </li>
@endif

@if(Session::get('adminDetails')['type']=="Admin")

<li>
    <a <?php if (preg_match("/admin/i", $url)){ ?> style="display: block;" <?php } ?>  class="waves-effect waves-dark"><i class="fas fa-user-shield"></i> Admins<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">

        <li>
            <a <?php if (preg_match("/add-admin/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/add-admin')}}">Add Admin/Sub-Admin</a>
        </li>


        <li>
            <a <?php if (preg_match("/view-admins/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-admins')}}">View Admin/Sub-Admin</a>
        </li>

    </ul>
</li>
@endif
@if(Session::get('adminDetails')['type']=="Admin")

<li>
    <a <?php if (preg_match("/enquiries/i", $url)){ ?> style="display: block;" <?php } ?>  class="waves-effect waves-dark"><i class="fas fa-envelope-square"></i> Enquiries<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">

        <li>
            <a <?php if (preg_match("/view-enquiries/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-enquiries')}}">View Enquiries</a>
        </li>



    </ul>
</li>
@endif

@if(Session::get('adminDetails')['type']=="Admin")

<li>
    <a <?php if (preg_match("/comments/i", $url)){ ?> style="display: block;" <?php } ?>  class="waves-effect waves-dark"><i class="fas fa-comments"></i> Comments<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">

        <li>
            <a <?php if (preg_match("/view-comments/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-comments')}}">Product Comments</a>
        </li>


        <li>
            <a <?php if (preg_match("/view-Blogcomments/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-Blogcomments')}}">Blog Comments</a>
        </li>

    </ul>
</li>
@endif

@if(Session::get('adminDetails')['type']=="Admin")

<li>
    <a <?php if (preg_match("/blog/i", $url)){ ?> style="display: block;" <?php } ?>  class="waves-effect waves-dark"><i class="fas fa-blog"></i> Blogs<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">

        <li>
            <a <?php if (preg_match("/add-blog/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/add-blog')}}">Add Blog</a>
        </li>


        <li>
            <a <?php if (preg_match("/view-blogs/i", $url)){ ?> class="active-menu waves-effect waves-dark" <?php } ?> class="waves-effect waves-dark" href="{{url('/admin/view-blogs')}}">View Blogs</a>
        </li>

    </ul>
</li>
@endif


        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
