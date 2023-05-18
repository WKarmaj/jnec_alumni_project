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
 <div class="container-fluid page-body-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Department</h4>
                        <form action="{{ url('add_department') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="department_name">Department Name:</label>
                                <input type="text" id="department_name" name="department_name" class="form-control" placeholder="Add department here..." required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                @include('admin.script')
    <!-- End custom js for this page -->
</div>
  </body>
</html>