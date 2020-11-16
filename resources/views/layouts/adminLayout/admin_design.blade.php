
<!DOCTYPE html>
<html lang="en">

<head>
 <meta name="_token" content="{{ csrf_token() }}" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Easy Shop - Admin</title>

  <!-- Custom fonts for this template-->
  <script src="https://kit.fontawesome.com/67b077845a.js" crossorigin="anonymous"></script>
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('materialize/css/materialize.min.css')}}" media="screen,projection" />
  <!-- Bootstrap Styles-->
  <link href="{{asset('css/backend_css/bootstrap.css')}}" rel="stylesheet" />

  <!-- Morris Chart Styles-->
  <link href="{{asset('css/backend_css/morris-0.4.3.min.css')}}" rel="stylesheet" />
  <!-- Custom Styles-->
  <link href="{{asset('css/backend_css/custom-styles.css')}}" rel="stylesheet" />
  <link href="{{asset('css/backend_css/dropzone.min.css')}}" rel="stylesheet" />
  <!-- Google Fonts-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="{{asset('js/backend_js/Lightweight-Chart/cssCharts.css')}}">


</head>
<body>

@include('layouts.adminLayout.admin_header')
@include('layouts.adminLayout.admin_sidebar')




@yield('content')

@include('layouts.adminLayout.admin_footer')



<!-- Code begins here -->

<a href="#" class="float">
    <i class="fa fa-plus my-float"></i>
    </a>




  <!-- Bootstrap core JavaScript-->




  <!-- Core plugin JavaScript-->


  <!-- Custom scripts for all pages-->






  <!-- Page level custom scripts -->




  <!-- Page level custom scripts -->


  <script type="text/javascript" src="{{asset('js/app.js')}}" ></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Validate js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script><script src="./node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

	 <!-- DATA TABLE SCRIPTS -->
     <script src="{{asset('js/backend_js/dataTables/jquery.dataTables.js')}}"></script>
     <script src="{{asset('js/backend_js/dataTables/dataTables.bootstrap.js')}}"></script>

<!-- Bootstrap Js -->
<script src="{{asset('js/backend_js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/backend_js/js-extension.js')}}"></script>

<script src="{{asset('materialize/js/materialize.min.js')}}"></script>

<!-- Metis Menu Js -->
<script src="{{asset('js/backend_js/jquery.metisMenu.js')}}"></script>
<!-- Morris Chart Js -->
<script src="{{asset('js/backend_js/morris/raphael-2.1.0.min.js')}}"></script>
<script src="{{asset('js/backend_js/morris/morris.js')}}"></script>

<script src="{{asset('js/backend_js/dropzone.min.js')}}"></script>
<script src="{{asset('js/backend_js/easypiechart.js')}}"></script>
<script src="{{asset('js/backend_js/easypiechart-data.js')}}"></script>

 <script src="{{asset('js/backend_js/Lightweight-Chart/jquery.chart.js')}}"></script>
 <script src="./node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- Custom Js -->
<script src="{{asset('js/backend_js/custom-scripts.js')}}"></script>
@yield('scripts')
<script>
	$(document).ready(function(){
	 $('ul.tabs').tabs();
		$('.collapsible').collapsible({
		  accordion: false, // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		  onOpen: function(el) { alert('Open'); }, // Callback for Collapsible open
		  onClose: function(el) { alert('Closed'); } // Callback for Collapsible close
		}
	  );
	});
	</script>



</body>
</html>
