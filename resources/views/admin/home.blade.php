<!DOCTYPE html>
<html lang="en">
    <head>
    @include('admin.css')
    </head>
 
  <body style="background-color: #f2f2f2;">
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
    
      </div>
      <!-- partial:partials/_sidebar.html -->
                @include('admin.sidebar')
      <!-- partial -->
      
        <!-- partial:partials/_navbar.html -->
        <div class="container-fluid page-body-wrapper">
                @include('admin.navbar')
        </div>
        <!-- partial -->
                @include('admin.body')
    </div>
    <!-- container-scroller -->
    
    <!-- plugins:js -->
                @include('admin.script')
    <!-- End custom js for this page -->
   
  </body>
</html>