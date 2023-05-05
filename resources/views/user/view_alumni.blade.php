
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
    </div> <!-- .topbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary"></a>
        <div class="" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('home')}}">Home</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{{url('view_event')}}">Event</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{{url('search')}}">Alumni</a>
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
  
 

 <!-- search page -->
<div class="page-section">
<div class="container">
  <form action="{{ url('search') }}" method="GET" class="d-flex flex-wrap justify-content-start ">
  <div class="search" style="display:inline-flex; align-items:center; background-image:linear-gradient(45deg,#0561ee, #18e0b5); padding: 10px; border-radius: 4px;">
  <label for="search"></label>
  <input type="text" name="search" placeholder="Search" class="search_input" style="color: #fff;">
  <button type="submit" class="search_button" ></button>
 
</div>
  <table>
    <tr>
      <td>
      <div class="" style="">
  <label for="programme">Programme:</label>
  <select name="programme" id="programme" class="" style="width: 150px;">
    <option value="">Select Programme</option>
    @foreach(\App\Models\Programme::all() as $programme)
    <option value="{{ $programme->programme_name }}" {{ (Request::get('programme') == $programme->programme_name) ? 'selected' : '' }}>{{ $programme->programme_name }}</option>
    @endforeach
  </select>
</div>

    </div>
      </td>
   
      <td>
    <div class="">
      <label for="department">Department:</label>
      <select name="department" id="department" class="" style="width: 150px;">
        <option value="">Select Department</option>
        @foreach(\App\Models\Department::all() as $department)
        <option value="{{ $department->department_name }}" {{ (Request::get('department') == $department->department_name) ? 'selected' : '' }}>{{ $department->department_name }}</option>
        @endforeach
      </select>
    </div>
      </td>

      <td>
      <div class="">
          <label for="year">Year:</label>
          <select name="year" id="year" class="" style="width: 150px;">
         <option value="">Select Year</option>
         @foreach(range(date('Y'), 2000) as $year)
         <option value="{{ $year }}" {{ (Request::get('year') == $year) ? 'selected' : '' }}>{{ $year }}</option>
        @endforeach
      </select>
      </div>
      </td>
      <td>
      <div class="">
      <label for="employment_status">Employment Status:</label>
      <select name="employment_status" id="employment_status" class="" style="width: 150px;">
         <option value="">Select Employment Status</option>
         <option value="employed" {{ (Request::get('employment_status') == 'employed') ? 'selected' : '' }}>Employed</option>
         <option value="unemployed" {{ (Request::get('employment_status') == 'unemployed') ? 'selected' : '' }}>Unemployed</option>
     </select>
     </div>
      </td>
      <td>
       <div style="margin-right: 210px;">
       <button type="submit" class="" >Filter</button>
       </div>
      </td>
    </tr>
  </table>

  </form>
</div>


 
    <br>
  
    @if(count($results) > 0)
    <table>
     <tr style="background-color:tomato;">
        <td style="padding: 20px;">Name</td>
        <td style="padding: 10px;">Email</td>
        <td style="padding: 10px;">Phone</td>
        <td style="padding: 10px;">Year of Graduation</td>
        <td style="padding: 10px;">Address</td>
        <td style="padding: 10px;">Programme</td>
        <td style="padding: 10px;">Department</td>
        <td style="padding: 10px;">Employment Status</td>
      </tr>
      @foreach($results as $user)
        <tr align="center" style ="">
            <td style="padding: 20px;">{{$user->name}}</td>
            <td style="padding: 20px;">{{$user->email}}</td>
            <td style="padding: 20px;">{{$user->phone}}</td>
            <td style="padding: 20px;">{{$user->year}}</td>
            <td style="padding: 20px;">{{$user->address}}</td>
            <td style="padding: 20px;">{{$user->programme}}</td>
            <td style="padding: 20px;">{{$user->department}}</td>
            <td style="padding: 20px;">{{$user->employment_status}}</td>
        </tr>
      @endforeach
    </table>
    @else
    <p>No data found.</p>
    @endif
</div>


  <!--End search page -->


  <!-- .page-section -->

   <!-- .page-section -->

<!-- .banner-home -->
  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">healthcare@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>