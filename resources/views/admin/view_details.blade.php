<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css')
  <style>
    .table {
      font-size: 12px;
    }

    .table td,
    .table th {
      padding: 0.5rem;
      white-space: nowrap;
    }

    .table tbody tr:nth-child(even) {
      background-color: #f8f9fa;
    }

    .table tbody tr:hover {
      background-color: #e9ecef;
    }
  </style>
</head>
<body style="background-color: #f2f4f8;">
<div class="container-scroller">
  <!-- partial:partials/_sidebar.html -->
  @include('admin.sidebar')
  <!-- partial -->
  <!-- partial:partials/_navbar.html -->
  @include('admin.navbar')
  <div class="flex items-center" style="margin-top: 50px;">
    <div class="col-span-6 sm:col-span-4">
      <form action="{{ url('view_details') }}" method="GET" class="flex flex-col sm:flex-row items-center">
        <table>
          <tr>
            <td>
              <div style="display: flex;">
                <input type="text" name="search" id="search" placeholder="Search" class="w-64 border border-gray-300 rounded px-4 py-2 text-lg focus:outline-none" style="color:black;" />
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="mt-4">
                <label for="department" class="block text-black mb-2">Department:</label>
                <select style="color: #333333;" name="department_id" id="department" class="w-64 border border-gray-300 rounded px-4 py-2 text-lg focus:outline-none">
                  <option value="">Select Department</option>
                  @foreach(\App\Models\Department::all() as $department)
                    <option style="color: #333333;" value="{{ $department->id }}" @if(isset($state['department_id']) && $state['department_id'] == $department->id ) selected @endif>{{ $department->department_name }}</option>
                  @endforeach
                </select>
              </div>
            </td>
            <td>
              <div class="mt-4">
                <label for="programme" class="block text-black mb-2">Programme:</label>
                <select name="programme_id" id="programme" class="w-48 border border-gray-300 rounded px-4 py-2 text-lg focus:outline-none" style="color: #333333;">
                  <option value="" style="color: #333333;">Select Programme</option>
                </select>
              </div>
            </td>
            <td>
              <div class="mt-4">
                <label for="year" class="block text-black mb-2">Year:</label>
                <select name="year" id="year" class="w-48 border border-gray-300 rounded px-4 py-2 text-lg focus:outline-none" style="color: #333333;">
                  <option value="">Select Year</option>
                  @foreach(range(date('Y'), 2000) as $year)
                    <option style="color: #333333;" value="{{ $year }}" {{ (Request::get('year') == $year) ? 'selected' : '' }}>{{ $year }}</option>
                  @endforeach
                </select>
              </div>
            </td>
            <td>
              <div class="mt-4">
                <label for="employment_status" class="block text-black mb-2">Employment Status:</label>
                <select name="employment_status" id="employment_status" class="w-48 border border-gray-300 rounded px-6 py-2 text-lg focus:outline-none" style="color: #333333;">
                  <option value="">Select Employment Status</option>
                  <option value="employed" {{ (Request::get('employment_status') == 'employed') ? 'selected' : '' }}>Employed</option>
                  <option value="unemployed" {{ (Request::get('employment_status') == 'unemployed') ? 'selected' : '' }}>Unemployed</option>
                </select>
              </div>
            </td>
            <td>
              <div class="mt-12">
                <button type="submit" id="search" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
              </div>
            </td>
          </tr>
        </table>
      </form>

      <div class="table-responsive">
        <div style="max-height: 400px; overflow-y: auto;">
          <form id="delete-form" action="{{ url('delete_users') }}" method="POST">
            @csrf
            <table class="table table-striped">
              <thead>
              <tr>
                <th>
                  <input type="checkbox" id="select-all" />
                </th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Year of Graduation</th>
                <th>Department</th>
                <th>Programme</th>
                <th>Remarks</th>
              </tr>
              </thead>
              <tbody>
              @foreach($results as $user)
                <tr>
                  <td>
                    <input type="checkbox" name="users[]" value="{{ $user->id }}" />
                  </td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->phone}}</td>
                  <td>{{$user->year}}</td>
                  <td>{{$user->department_name}}</td>
                  <td>{{$user->programme_name}}</td>
                  <td>
                    @if($user->usertype == "0")
                      <a onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm" href="{{url('deleteuser',$user->id)}}">Delete</a>
                    @else
                      Admin
                    @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete Selected</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@include('admin.script')
<!-- End custom js for this page -->
</div>
</div>
<script>
  $(document).ready(function () {
    $('#department').on('change', function () {
      var department_id = $(this).val();
      if (department_id) {
        $.ajax({
          type: 'GET',
          url: '/getProgrammeByDepartment/' + department_id,
          dataType: 'JSON',
          success: function (data) {
            $('#programme').empty();
            $('#programme').append('<option  style="color: #333333;" value="">Select Programme</option>');
            $.each(data, function (key, value) {
              $('#programme').append('<option  style="color: #333333;" value="' + value.id + '">' + value.programme_name + '</option>');
            });
          }
        });
      } else {
        $('#programme').empty();
        $('#programme').append('<option value="">Select Programme</option>');
      }
    });

    $('#search').on('submit', function () {
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
        success: function (data) {
          // Clear the previous results
          $('#results-table').empty();

          if (data.length > 0) {
            // Users found, append the data to the table
            $.each(data, function (index, user) {
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

    // Select All checkbox functionality
    $('#select-all').on('click', function () {
      $('input[name="users[]"]').prop('checked', $(this).prop('checked'));
    });

    // Delete form submission confirmation
    $('#delete-form').on('submit', function () {
      return confirm('Are you sure you want to delete the selected users?');
    });
  });
</script>
</body>
</html>
