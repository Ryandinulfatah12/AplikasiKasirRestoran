<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('title') | Ngapak Resto</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ url('klorofil/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('klorofil/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ url('klorofil/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ url('klorofil/vendor/chartist/css/chartist-custom.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ url('klorofil/css/main.css') }}">
	<!-- SWEET ALERT -->
	<link rel="stylesheet" href="{{url('klorofil/css/sweetalert.css')}}">

	<!-- ICONS -->
	<link rel="icon" sizes="76x76" href="{{ url('klorofil/img/fav.png') }}">
	<link rel="icon" type="{{ url('klorofil/image/png') }}" sizes="96x96" href="{{route('admin.home')}}">

	@stack('css')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- navigasi -->
		@include('admin.navbar')
		<!-- endnavigasi -->

		<!-- sidebar -->
		@include('admin.sidebar')
		<!-- endsidebar -->

		<!-- MAIN -->
		<div class="main">
			<div class="main-content">
				<div class="col-md-12">
				@yield('content')
				</div>
			</div>
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>

		<!-- footer -->
		@include('admin.footer')
		<!-- endfooter -->

		<!-- Scrool top button -->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>
		<!-- end scroll up -->

		<!-- Logout Modal -->
		@stack('modal')
		<!-- End Logout modal -->

	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{ url('klorofil/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ url('klorofil/scripts/sweetalert.min.js') }}"></script>
	@include('sweet::alert')
	<script src="{{ url('klorofil/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('klorofil/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ url('klorofil/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ url('klorofil/vendor/chartist/js/chartist.min.js') }}"></script>
	<script src="{{ url('klorofil/scripts/klorofil-common.js') }}"></script>
	<script src="{{ url('klorofil/scripts/script.js') }}"></script>
	

	@stack('js')
</body>

</html>
