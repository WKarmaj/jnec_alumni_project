
<!DOCTYPE html>
<html lang="en">
  <head>

  <style type="text/css">

    label
    {
      dsiplay:inline-block;
      width: 100px;
      text-align:right;
      padding-top: 20px;
      padding-bottom: 20px;
    }

  </style>

  @include('admin.css')

  </head>

  <body>

    
      <!-- partial:partials/_sidebar.html -->
                @include('admin.sidebar')
      <!-- partial -->
    
        <!-- partial:partials/_navbar.html -->
                @include('admin.navbar')
        <!-- partial -->
        
    <!-- container-scroller -->
    <!-- plugins:js -->
                @include('admin.script')
                <div class="container" align ="center" style="margin-top:-450px; padding-top: 50px;" >
    <!-- End custom js for this page -->
    <div class="container-fluid page-body-wrapper">
    <div class="container"   style="margin-top:-5px; padding-top: 50px;" >
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add User</h4>
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="{{ url('adduser') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" style="color:black;" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" style="color:black;" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control" style="color:black;" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" style="color:black;" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  </body>
</html>                   
                   