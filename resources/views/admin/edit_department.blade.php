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
            <div class="contaier">
                <form action="{{url('add_department')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:15px; display:flex; align-items: center; margin-bottom: 10px;">
                        <label>Department Name: </label>
                        <input type="text" style="color:black;" name="department_name" placeholder="Add department here......">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary"> 
                      </div>
                    </div>
                    
                </form>
            </div>

            
        </div>
                @include('admin.script')
    <!-- End custom js for this page -->
    </div>
  </body>
</html>