<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>JNEC Alumni</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span>+975-07-260-302, +975-07-260-202</a>

            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div>
     <!-- .topbar -->
  <div class="tobbar-karma">
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container" >
      <div class="" id="navbarSupport">
        <img src="jnec.png" alt="" height="80px" width="80px">
      </div>
        <a class="navbar-brand" href="#"><span class="text-primary"></a>
        <div class="" id="navbarSupport">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item active">
              <a class="nav-link" href="{{url('view_event')}}" style="color:white;">Event</a>
            </li>

            @if(Route::has('login'))

            @auth
           
            <x-app-layout>
            </x-app-layout>
            @else


            <div class="col-md-6">
               <a class="btn btn-primary btn-block" href="{{route('login')}}">Login</a>
            </div>
            <div class="col-md-6">
             <a class="btn btn-primary btn-block" href="{{route('register')}}">Register</a>
           </div>

            @endauth

            @endif

          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
    <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<div class="content">
</div>
  </header>
  <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">JNEC Alumni</span>
        <h1 class="display-4">Let's Keep In Touch</h1>
      </div>
    </div>
  </div>

  <div class="page-section">

  @include('contactForm')  

  </div>
  
 <!-- .bg-light -->

 
  <!-- .page-section -->
   
 <!-- .page-section -->

<!-- .banner-home -->
  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Visit us On </h5>


          <ul class="footer-menu">
            <li><a href="https://www.facebook.com/jigmenamgyelengineeringcollege/" target="_blank"><span class="mai-logo-facebook-f"></span>acebook</a></li>
            <li> <a href="https://www.jnec.edu.bt/en/" target="_blank"><span class="mai-logo-google-plus-g"> website</span></a></li>
          </ul>
    </div>
      </div>
      <hr>
    </div>
  </footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>