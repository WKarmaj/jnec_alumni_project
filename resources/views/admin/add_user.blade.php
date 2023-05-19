
<!DOCTYPE html>
<html lang="en">
  <head>

  @include('admin.css')

  </head>

  <body>

    
      <!-- partial:partials/_sidebar.html -->
               
      <!-- partial -->
    
        <!-- partial:partials/_navbar.html -->
                @include('admin.navbar')
        <!-- partial -->
        
    <!-- container-scroller -->
<div class="container-scroller">
    @include('admin.sidebar')
    
    
    <!-- End custom js for this page -->
    <div class="container-fluid page-body-wrapper" style="background-color: #f8f9fa;">
  <div class="container" style="margin-top: 50px; padding-top: 50px;">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card" style="background-color: #f8f9fa;">
          <div class="card-body">
            <h4 class="card-title" style="color:black;">Add User</h4>
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              {{ session()->get('message') }}
            </div>
            @endif
            <form action="{{ url('adduser') }}" method="POST" >
              @csrf
              <div class="form-group">
                <label for="name" style="color: #333;">Name</label>
                <input type="text" id="name" name="name" class="form-control" style="color: black; background-color: #ffffff;" required>
              </div>
              <div class="form-group">
                <label for="email" style="color: #333;">Email</label>
                <input type="email" id="email" name="email" class="form-control" style="color: black; background-color: #ffffff;" required>
              </div>
              <div class="form-group">
                <label for="phone" style="color: #333;">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" style="color: black; background-color: #ffffff;" required>
              </div>
              <div class="form-group">
                <label for="password" style="color: #333;">Password</label>
                <input type="password" id="password" name="password" class="form-control" style="color: black; background-color: #ffffff;" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" style="background-color: #007bff; color: #ffffff;">Add User</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    
</div>
    <!-- plugins:js -->
                @include('admin.script')


  </body>
</html>                   
                   