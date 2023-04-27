
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
    <!-- End custom js for this page -->
    <div class="container-fluid page-body-wrapper">
        <div class="container" align ="center" style="margin-top:-450px; padding-top: 50px;" >
        
        @if(session()->has('message'))

        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">
          </button>

          {{session()->get('message')}}

        </div>


        @endif
             <div>
                 <form action="{{url('adduser')}}" method="POST">
                 @csrf
                        <div >
                            <label for="">Name</label>
                            <input type="text" style="color:black;" name="name">
                        </div>
                        <div>
                            <label for="">Email</label>
                            <input type="email"  style="color:black;" name="email">
                        </div>
                        <div>
                            <label for="">Phone</label>
                            <input type="text" style="color:black;" name="phone">
                        </div>
                        <div>
                            <label for="">Password</label>
                            <input type="password"  style="color:black;" name="password" >
                        </div>

                        <div>
                            <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
                        </div>
                 </form>

            </div>

        
        </div>

    </div>
  </body>
</html>                   
                   