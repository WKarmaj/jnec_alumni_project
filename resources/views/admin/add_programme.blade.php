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
        <!-- partial -->
      <div class="conatainer-fluid page-body-wrapper">

        <div class="container">
        <form action="{{ route('upload.programme') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="programme_name">Programme Name</label>
                <input type="text" name="programme_name" id="programme_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="department_id">Department</label>
                <select name="department_id" id="department_id" class="form-control" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Programme</button>
        </form>
      </div>
                @include('admin.script')
      <!-- End custom js for this page -->
    </div>
    


  </body>
</html>


