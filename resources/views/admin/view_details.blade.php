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
    <div class="flex items-center" style="margin-top:70px;">

      <div class="col-span-6 sm:col-span-4">

      <form action="{{ url('view_details') }}" method="GET" class="flex flex-col sm:flex-row items-center">
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
  
            <table>
                <tr style="background-color:tomato;">
                    <td style="padding: 8px;">Name</td>
                    <td style="padding: 8px;">Email</td>
                    <td style="padding: 8px;">Phone</td>
                    <td style="padding: 8px;">Year of Graduation</td>
                    <td style="padding: 8px;">Department</td>
                    <td style="padding: 8px;">Programme</td>  
                    <td style="padding: 8px;">Remarks</td>
                </tr>
                @foreach($results as $users)
                <tr align="center" style ="">
                    <td style="padding: 8px;">{{$users->name}}</td>
                    <td style="padding: 8px;">{{$users->email}}</td>
                    <td style="padding: 8px;">{{$users->phone}}</td>
                    <td style="padding: 8px;">{{$users->year}}</td>
                    <td style="padding: 8px;">{{$users->department_name}}</td>
                    <td style="padding: 8px;">{{$users->programme_name}}</td>
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