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
    </div> <!-- .topbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <div class="" id="navbarSupport">
          <img src="GoldenJubileeLogoStroke.png" alt="" height="80px" width="80px">
        </div>
        <div class="" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('home')}}">Home</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{{url('view_event')}}">Event</a>
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
  </header>
 <!-- .bg-light -->

 <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">See Our Exciting Event</h1>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @foreach($event->sortByDesc('date') as $events)
        <div class="item">
            <div class="card-docter">
             
              <div class="body" style="padding:15px;">
                <p class="text-xl mb-0">{{$events->name}}</p>
                <div class="header">
                <img src="eventimage/{{$events->image}}" alt="">
              </div>
                <span class="text-sm text-grey">Date: {{$events->date}}</span><br>
                <span class="text-sm text-grey">Time: {{$events->time}}</span><br>
                <span class="text-sm text-grey">Venue:{{$events->venue}}</span><br>
                <span class="text-sm text-grey">About the event: {{$events->about}}</span><br>
                <span class="text-sm text-grey">Focal Person: {{$events->person}}</span><br>
                <span class="text-sm text-grey">{{$events->phone}}</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>



 
  <!-- .page-section -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make Your Suggestion for the College</h1>

      <form class="main-form">
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" class="form-control" placeholder="Number..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn"style="background-color:#79E0EE;">Submit</button>
      </form>
    </div>
  </div> <!-- .page-section -->

<!-- .banner-home -->
  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        
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


  