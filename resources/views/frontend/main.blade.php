<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ngapak Resto Official</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
  <link rel="stylesheet" type="text/css" href="{{url('frontend/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('frontend/css/style.css')}}">
  <!-- =======================================================
    Theme Name: Delicious
    Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>

  <!--banner-->
  @include('frontend.banner')
  <!-- / banner -->

  <!--about-->
  <!-- @include('frontend.about') -->
  <!--/about-->

  <!-- event -->
  <!-- @include('frontend.event') -->
  <!--/ event -->

  <!-- menu -->
  @include('frontend.menu')
  <!--/ menu -->

  <!-- contact -->
  <!-- @include('frontend.contact') -->
  <!-- / contact -->

  <!-- footer -->
  @include('frontend.footer')
  <!-- / footer -->

  <script src="{{url('frontend/js/jquery.min.js')}}"></script>
  <script src="{{url('frontend/js/jquery.easing.min.js')}}"></script>
  <script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{url('frontend/js/custom.js')}}"></script>

</body>

</html>
