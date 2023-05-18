<!DOCTYPE html>
<html lang="en">
    <head>
    @include('admin.css')
    </head>
 
  <body style="">
    <div class="container-scroller">

    
      <!-- partial:partials/_sidebar.html -->
                @include('admin.sidebar')
      <!-- partial -->
      
        <!-- partial:partials/_navbar.html -->
                @include('admin.navbar')
        <!-- partial -->
                @include('admin.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
                @include('admin.script')
    <!-- End custom js for this page -->
    </div>
  </body>
</html>