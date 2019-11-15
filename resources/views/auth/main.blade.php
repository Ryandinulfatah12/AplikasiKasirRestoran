<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>@yield('title') RRestaurant</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ url('klorofil/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('klorofil/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ url('klorofil/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ url('klorofil/css/main.css') }}">
	<!-- ICONS -->
	<link rel="icon" sizes="76x76" href="{{ url('klorofil/img/fav.png') }}">
	<link rel="icon" type="{{ url('klorofil/image/png') }}" sizes="96x96" href="{{ url('klorofil/img/favicon.png') }}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		@yield('content')
	</div>
	<!-- END WRAPPER -->
</body>

</html>
