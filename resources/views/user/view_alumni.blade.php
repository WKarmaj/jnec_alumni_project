
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
      <div class="" id="navbarSupport">
          <img src="Golden Jubilee Logo-Stroke .png" alt="" height="80px" width="80px">
        </div>
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
    <form id="search" action="{{ url('search') }}" method="GET">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="form-group">
          <label for="search" >Search:</label>
          <div class="input-group">
            <input type="text" name="search" id="search" placeholder="Search" class="form-control">
          </div>
        </div>
      </div>
    </div>
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="form-group">
            <label for="department">Department:</label>
            <select name="department_id" id="department" class="form-control">
              <option value="">Select Department</option>
              @foreach(\App\Models\Department::all() as $department)
              <option value="{{ $department->id }}" @if(isset($state['department_id']) && $state['department_id']== $department->id ) selected @endif>{{ $department->department_name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-2">
          <div class="form-group">
            <label for="programme">Programme:</label>
            <select name="programme_id" id="programme" class="form-control">
              <option value="">Select Programme</option>
            </select>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-2">
          <div class="form-group">
            <label for="year">Year:</label>
            <select name="year" id="year" class="form-control">
              <option value="">Select Year</option>
              @foreach(range(date('Y'), 2000) as $year)
              <option value="{{ $year }}" {{ (Request::get('year') == $year) ? 'selected' : '' }}>{{ $year }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-15 col-sm-6 col-md-2">
          <div class="form-group">
            <label for="employment_status">Work Status:</label>
            <select name="employment_status" id="employment_status" class="form-control">
              <option value="">Select Employment Status</option>
              <option value="employed" {{ (Request::get('employment_status') == 'employed') ? 'selected' : '' }}>Employed</option>
              <option value="unemployed" {{ (Request::get('employment_status') == 'unemployed') ? 'selected' : '' }}>Unemployed</option>
            </select>
          </div>
        </div>

        <div class="col-12 col-md-1">
          <div class="form-group">
            <label class=""></label>
            <button type="submit" class="btn btn-primary" style="background-color: #79E0EE; border-color: #79E0EE; border-radius: 4px; padding: 10px 20px;">Search</button>
          </div>
        </div>

      </div>
    </form>

    <br>

    @if(count($results) > 0)
    <div class="table-responsive">
      <table class="table" id="results-table">
        <thead class="thead-light">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Year of Graduation</th>
            <th>Address</th>
            <th>Department</th>
            <th>Programme</th>
            <th>Employment Status</th>
            <th>Organization</th>
          </tr>
        </thead>
        <tbody>
          @foreach($results as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->year}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->department_name}}</td>
            <td>{{$user->programme_name}}</td>
            <td>{{$user->employment_status}}</td>
            <td>{{$user->organization}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
    <p>No data found.</p>
    @endif
  </div>
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