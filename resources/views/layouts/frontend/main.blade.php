<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') Ngapak Resto</title>
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
  <section id="banner">
    <div class="bg-color">
      <header id="header">
        <div class="container">
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#about">About</a>
            <a href="#event">Event</a>
            <a href="#menu-list">Menu</a>
            <a href="#contact">Book a table</a>
          </div>
          <!-- Use any element to open the sidenav -->
          <span onclick="openNav()" class="pull-right menu-icon">☰</span>
        </div>
      </header>
      <div class="container">
        <div class="row">
          <div class="inner text-center">
            <h1 class="logo-name">Delicious</h1>
            <h2>Food To fit your lifestyle & health.</h2>
            <p>Specialized in Indian Cuisine!!</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / banner -->
  <!-- menu -->
  <section id="menu-list" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center marb-35">
          <h1 class="header-h">Menu List</h1>
          <p class="header-p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
            <br>nibh euismod tincidunt ut laoreet dolore magna aliquam. </p>
        </div>

        <div class="col-md-12  text-center" id="menu-flters">
          <ul>
            <li><a class="filter active" data-filter=".menu-restaurant">Show All</a></li>
            <li><a class="filter" data-filter=".breakfast">Breakfast</a></li>
            <li><a class="filter" data-filter=".lunch">Lunch</a></li>
            <li><a class="filter" data-filter=".dinner">Dinner</a></li>
          </ul>
        </div>

        <div id="menu-wrapper">

          <div class="breakfast menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Food Item Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">$20.99</span>
            </span>
            <span class="menu-subtitle">Neque porro quisquam est qui dolorem</span>
          </div>

          <div class="lunch menu-restaurant">
            <span class="clearfix">
              @yield('content')
            </span>
            
          </div>

        </div>

        

      </div>
    </div>
  </section>
  <!--/ menu -->
  <!-- footer -->
  <footer class="footer text-center">
    <div class="footer-top">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 text-center">
          <div class="widget">
            <h4 class="widget-title">Delicious</h4>
            <address>324 Ellte Road<br>Delhi, DL 110013</address>
            <div class="social-list">
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </div>
            <p class="copyright clear-float">
              © Delicious Theme. All Rights Reserved
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Delicious
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <script src="{{url('frontend/js/jquery.min.js')}}"></script>
  <script src="{{url('frontend/js/jquery.easing.min.js')}}"></script>
  <script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{url('frontend/js/custom.js')}}"></script>

</body>

</html>
