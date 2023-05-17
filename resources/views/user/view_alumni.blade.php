
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>JNEC Alumni</title>


  <link rel="stylesheet" href="../assets/owl.carousel.min.css">

  <link rel="stylesheet" href="../assets/owl.theme.default.min.css">

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
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
      <form id="search" action="{{ url('search') }}" method="GET" class="d-flex flex-wrap justify-content-start "> 
        <label for="search"></label>
          <input type="text" name="search" id="search" placeholder="Search" class="form-control" style="width:250px; border-radius:4px;">
    </div>
    <table>
      <tr>
        <td>
        <div class=""> 
    <label for="department">Department:</label> 
    <select name="department_id" id="department" class="" style="width: 250px; border-radius: 4px;">
        <option value="">Select Department</option>
        @foreach(\App\Models\Department::all() as $department)
        <option value="{{ $department->id }}" @if(isset($state['department_id']) && $state['department_id']== $department->id ) selected @endif>{{ $department->department_name }}</option>
        @endforeach
    </select>
</div>
        </td>

        <td>
        <div class="" style="">
    <label for="programme">Programme:</label>
    <select name="programme_id" id="programme" class="" style="width: 150px; border-radius: 4px;">
        <option value="">Select Programme</option>
    </select>
</div>
        </td>
      <td>
        <div class="">
          <label for="year">Year:</label>
          <select name="year" id="year" class="" style="width: 150px; border-radius:4px;">
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
         <select name="employment_status" id="employment_status" class="" style="width: 150px; border-radius:4px;">
             <option value="">Select Employment Status</option>
             <option value="employed" {{ (Request::get('employment_status') == 'employed') ? 'selected' : '' }}>Employed</option>
             <option value="unemployed" {{ (Request::get('employment_status') == 'unemployed') ? 'selected' : '' }}>Unemployed</option>
          </select>
        </div>
      </td>
        <td>
          <div style="margin-right: 210px; margin-top:30px;" >
              <button type="submit" id="search" class="form-control">Search </button>
          </div>
        </td>
      </tr>
     </table>
   </form>
  


    <br>
    
    @if(count($results) > 0)
    <table class="" id="results-table">
     <tr style="background-color:tomato;">
        <td style="padding: 10px;">Name</td>
        <td style="padding: 10px;">Email</td>
        <td style="padding: 10px;">Phone</td>
        <td style="padding: 10px;">Year of Graduation</td>
        <td style="padding: 10px;">Address</td>
        <td style="padding: 10px;">Department</td>
        <td style="padding: 10px;">Programme</td>
        <td style="padding: 10px;">Employment Status</td>
      </tr>
      @foreach($results as $user)
        <tr align="center" style ="">
            <td style="padding: 20px;">{{$user->name}}</td>
            <td style="padding: 20px;">{{$user->email}}</td>
            <td style="padding: 20px;">{{$user->phone}}</td>
            <td style="padding: 20px;">{{$user->year}}</td>
            <td style="padding: 20px;">{{$user->address}}</td>
            <td style="padding: 20px;">{{$user->department_name}}</td>
            <td style="padding: 20px;">{{$user->programme_name}}</td>
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
        
        
        </div>
      </div>

      <hr>

    
    </div>
  </footer>



<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js.map"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>



<script>
  $(document).ready(function() {
    $('#department').on('change', function() {
      var department_id = $(this).val();
      if (department_id) {
        $.ajax({
          type: 'GET',
          url: '/getProgrammeByDepartment/' + department_id,
          dataType: 'JSON',
          success: function(data) {
            $('#programme').empty();
            $('#programme').append('<option value="">Select Programme</option>');
            $.each(data, function(key, value) {
              $('#programme').append('<option value="' + value.id + '">' + value.programme_name + '</option>');
            });
          }
        });
      } else {
        $('#programme').empty();
        $('#programme').append('<option value="">Select Programme</option>');
      }
    });

    $('#search').on('submit', function() {
      var department_name = $('#department').val();
      var programme_name = $('#programme').val();

      $.ajax({
        type: 'GET',
        url: '/search',
        dataType: 'JSON',
        data: {
          department_name: department_name,
          programme_name: programme_name,
        },
        success: function(data) {
  // Clear the previous results
  $('#results-table').empty();

  if (data.length > 0) {
    // Users found, append the data to the table
    $.each(data, function(index, user) {
      var row = '<tr>' +
        '<td>' + user.name + '</td>' +
        '<td>' + user.email + '</td>' +
        '<td>' + user.phone + '</td>' +
        '<td>' + user.year + '</td>' +
        '<td>' + user.address + '</td>' +
        '<td>' + user.department_name + '</td>' +
        '<td>' + user.programme_name + '</td>' +
        '<td>' + user.employment_status + '</td>' +
        '</tr>';
      $('#results-table ').append(row);
    });
  } else {
    // No users found, display a message
    $('#results-table tbody').append('<tr><td colspan="8">No users found</td></tr>');
  }
}
      });
    });
  });
</script>

</body>
</html>