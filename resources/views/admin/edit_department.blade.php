<!DOCTYPE html>
<html lang="en">
    <head>
    @include('admin.css')

    <style>
    .container {
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        max-width: 400px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 10px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input[type="text"] {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
</style>
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
    <form action="{{url('add_department')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="department_name">Department Name:</label>
            <input type="text" id="department_name" name="department_name" placeholder="Add department here......">
        </div>
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
  </div>


            
      </div>
                @include('admin.script')
    <!-- End custom js for this page -->
</div>
  </body>
</html>