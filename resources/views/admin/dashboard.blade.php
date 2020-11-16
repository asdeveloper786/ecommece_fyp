<?php

$current_month = date('M');
$last_month = date('M',strtotime("-1 month"));
$last_to_last_month = date('M',strtotime("-2 month"));

?>
@extends('layouts.adminLayout.admin_design')
@section('content')
<script>
    window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "Enquiries Reporting(Last 3 Months)"
        },
        data: [{
            type: "pie",
            startAngle: 25,

            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,

            dataPoints: [
                { y: <?php echo $current_month_enquiries; ?>, label: "<?php echo $current_month; ?>" },
			{ y: <?php echo $last_month_enquiries; ?>,  label: "<?php echo $last_month; ?>" },
			{ y: <?php echo $last_to_last_month_enquiries; ?>,  label: "<?php echo $last_to_last_month; ?>" }
            ]
        }]
    });
    chart.render();

    var chart = new CanvasJS.Chart("chartContainer1", {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "Prodcuts Reporting(Last 3 Months)"
        },
        data: [{
            type: "pie",
            startAngle: 25,

            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,

            dataPoints: [
                { y: <?php echo $current_month_products; ?>, label: "<?php echo $current_month; ?>" },
			{ y: <?php echo $last_month_products; ?>,  label: "<?php echo $last_month; ?>" },
			{ y: <?php echo $last_to_last_month_products; ?>,  label: "<?php echo $last_to_last_month; ?>" }
            ]
        }]
    });

    chart.render();

    var chart = new CanvasJS.Chart("chartContainer2", {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "Categories Reporting(Last 3 Months)"
        },
        data: [{
            type: "pie",
            startAngle: 25,

            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,

            dataPoints: [
                { y: <?php echo $current_month_categories; ?>, label: "<?php echo $current_month; ?>" },
			{ y: <?php echo $last_month_categories; ?>,  label: "<?php echo $last_month; ?>" },
			{ y: <?php echo $last_to_last_month_categories; ?>,  label: "<?php echo $last_to_last_month; ?>" }
            ]
        }]
    });

    chart.render();


    }
    </script>

<?php

use App\Product;
use App\Category;
use App\ProductsComment;
use App\User;

$proCount = Product::productDashboardCount();
$catCount = Category::categoryDashboardCount();
$comCount = ProductsComment::commentDashboardCount();
$userCount = User::userDashboardCount();
?>
@if(Session::has('flash_message_error'))

<div class="dashboardError" role="alert">

  </div>
@endif
@if(Session::has('flash_message_success'))

<div class="dashboardSuccess" role="alert">

  </div>
@endif
<div id="page-wrapper">
    <div class="header">
                  <h1 class="page-header">
                      Dashboard
                  </h1>
                  <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li class="active">Data</li>
              </ol>

  </div>
      <div id="page-inner">

      <div class="dashboard-cards">
              <!-- Widgets -->
              <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">add_shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Products</div>
                            <div class="text"><h2>{{ $proCount }}</h2></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">speaker_group</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Categories</div>
                            <div class="text"><h2>{{ $catCount }}</h2></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW COMMENTS</div>
                            <div class="text"><h2>{{ $comCount }}</h2></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Users</div>
                            <div class="text"><h2>{{ $userCount }}</h2></div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
         <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>

          </div>
          <div class="widget-content nopadding">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
          </div>
        </div>
      </div>
    </div>
    <div style="margin-top: 50px;" class="row">
                        <div class="col-lg-6">
                            <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
                        </div>
                        <div class="col-lg-6">
                            <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                        </div>
                      </div>

@endsection
@section('scripts')
<script>

 jQuery(function(){
    $("#access").hide();
	$("#type").change(function(){
		var type = $("#type").val();
		if(type == "Admin"){
			$("#access").hide();
		}else{
			$("#access").show();
		}
	})
   //dashboard Error
   window.setTimeout(function() {
    $(".dashboardError").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'error',
  title: '{!! session('flash_message_error') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 0);
       //dashboard Error
       window.setTimeout(function() {
    $(".dashboardSuccess").fadeTo(0, 0).slideUp(0, function(){
        swal({
    position: 'top-end',
  icon: 'success',
  title: '{!! session('flash_message_success') !!}',
  showConfirmButton: false,
  timer: 3000
})
    });
}, 0);





});
  </script>
@endsection
