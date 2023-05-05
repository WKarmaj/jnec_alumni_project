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
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span>helpdesk.jnec@rub.edu.bt</a>
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
              <a class="nav-link" href="{{url('home')}}" style="color:white;">Home</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{{url('view_event')}}" style="color:white;">Event</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{{url('search')}}" style="color:white;">Alumni</a>
            </li>
           


            @if(Route::has('login'))

            @auth
           
            <x-app-layout>
            </x-app-layout>
            @else


            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register</a>
            </li>

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
 <!-- .bg-light -->
  <div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow fadeInUp">EXPLORE OUR PROGRAMS</h1>
      <div class="row mt-5">
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <a href="blog-details.html" class="post-thumb">
                <img src="../assets/img/blog/IMG_8825-C.jpg" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">UNDERGRADUATE PROGRAM</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <span>Explore a range of our undergraduate programs</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <a href="blog-details.html" class="post-thumb">
                <img src="../assets/img/blog/IMG_8861-C.jpg" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">DIPLOMA PROGRAM</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <span>Explore a wide range of diploma programs</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <a href="blog-details.html" class="post-thumb">
                <img src="../assets/img/blog/IMG_8914-C.jpg" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">CONTINUE EDUCATION PROGRAMS</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <span>Opportunity for in-service students to enhance their knowledge and skills.</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>

      </div>
    </div>
  </div> 
 
  <!-- .page-section -->
   
 <!-- .page-section -->

<!-- .banner-home -->
  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>

          <ul class="footer-menu">
            
            <li><a href="#">About Us</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="https://www.facebook.com/jigmenamgyelengineeringcollege/" target="_blank"><span class="mai-logo-facebook-f"></span>acebook</a></li>
            <li> <a href="https://www.jnec.edu.bt/en/" target="_blank"><span class="mai-logo-google-plus-g"> website</span></a></li>
            <li> <a href="#" target="_blank"><span class="mai-logo-instagram"> Instagram</span></a></li>
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