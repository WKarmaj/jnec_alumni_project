<!DOCTYPE html>
<html lang="en">
    <head>
    @include('admin.css')
    </head>
 
<body>
 <div class="container-scroller">

           <!-- partial:partials/_sidebar.html -->
                @include('admin.sidebar')
             <!-- partial -->
      
             <!-- partial:partials/_navbar.html -->
                @include('admin.navbar')
    <div class="flex items-center" style="padding-top: 250px;">
      <div class="col-span-6 sm:col-span-4">
        <form action="{{ url('view_details') }}" method="GET" class="flex flex-col sm:flex-row items-center">
          <div class="form-group mb-4 sm:mr-4 sm:mb-0 flex-grow">
            <label for="search" class="sr-only">Search:</label>
            <input type="text" name="search" id="search" placeholder="Search" class="form-control">
          </div>

          <div class="sm:flex-grow">
            <label for="programme" class="block mb-2">Programme:</label>
            <select name="programme" id="programme" class="form-control mb-4 sm:mb-0">
              <option value="">Select Programme</option>
              @foreach(\App\Models\Programme::all() as $programme)
                <option value="{{ $programme->programme_name }}" {{ (Request::get('programme') == $programme->programme_name) ? 'selected' : '' }}>{{ $programme->programme_name }}</option>
              @endforeach
            </select>
          </div>

          <div class="sm:flex-grow">
            <label for="department" class="block mb-2">Department:</label>
            <select name="department" id="department" class="form-control mb-4 sm:mb-0">
              <option value="">Select Department</option>
              @foreach(\App\Models\Department::all() as $department)
                <option value="{{ $department->department_name }}" {{ (Request::get('department') == $department->department_name) ? 'selected' : '' }}>{{ $department->department_name }}</option>
              @endforeach
            </select>
          </div>

          <div class="sm:flex-grow">
            <label for="year" class="block mb-2">Year:</label>
            <select name="year" id="year" class="form-control">
              <option value="">Select Year</option>
              @foreach(range(date('Y'), 2000) as $year)
                <option value="{{ $year }}" {{ (Request::get('year') == $year) ? 'selected' : '' }}>{{ $year }}</option>
              @endforeach
            </select>
          </div>

          <div class="sm:w-auto">
            <button type="submit" class="btn btn-primary ">Search</button>
          </div>
        </form>
  


            <table>
                <tr style="background-color:tomato;">
                    <td style="padding: 10px;">Name</td>
                    <td style="padding: 10px;">Email</td>
                    <td style="padding: 10px;">Phone</td>
                    <td style="padding: 10px;">Programme</td>
                    <td style="padding: 10px;">Department</td>
                    <td style="padding: 10px;">Remarks</td>
                </tr>
                @foreach($query as $users)
                <tr align="center" style ="">
                    <td style="padding: 10px;">{{$users->name}}</td>
                    <td style="padding: 10px;">{{$users->email}}</td>
                    <td style="padding: 10px;">{{$users->phone}}</td>
                    <td style="padding: 10px;">{{$users->programme}}</td>
                    <td style="padding: 10px;">{{$users->department}}</td>
                    @if($users->usertype==("0"))
                    <td><a onclick="return confirm('Are You Sure?')" class="btn btn-danger" href="{{url('deleteuser',$users->id)}}">Delete</a></td>
                    @else
                    <td>Admin</td>
                    @endif
                </tr>
                @endforeach
            </table>
    </div>
   
  </div>

                @include('admin.script')
    <!-- End custom js for this page -->
</div>
  </body>
</html>