<!DOCTYPE html>
<html lang="en">
  <head>


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
          <form action="{{url('upload_event')}}" method="POST" enctype="multipart/form-data">

              @csrf

          <div style="display: flex; flex-direction: column;">
              <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="" style="flex: 1; text-align: right; margin-right: 10px;">Name of the Event:</label>
                <input type="text" style="color:black; flex: 2;" name="name" placeholder="Enter the name">
              </div>

              <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="" style="flex: 1; text-align: right; margin-right: 10px;">Image:</label>
                <input type="file" name="file" placeholder="Image" style="flex: 2;">
              </div>

              <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="" style="flex: 1; text-align: right; margin-right: 10px;">Date:</label>
                <input type="date" style="color:black; flex: 2;" name="date" placeholder="Date">
              </div>

              <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="" style="flex: 1; text-align: right; margin-right: 10px;">Time:</label>
                <input type="time" style="color:black; flex: 2" name="time" placeholder="Time">
              </div>

              <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for=""style="flex: 1; text-align: right; margin-right: 10px;">Venue:</label>
                <input type="text" style="color:black; flex: 2;" name="venue" placeholder="Place or Venue">
              </div>

              <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="" style="flex: 1; text-align: right; margin-right: 10px;">About the Event:</label>
                <textarea name="about" id="about" style="color:black; flex: 2" rows="4" placeholder="Enter the description...."></textarea>
              </div>

              <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="" style="flex: 1; text-align: right; margin-right: 10px;">Focal Person:</label>
                <input type="text" style="color:black; flex: 2" name="person" placeholder="Name event focal person">
              </div>

              <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <label for="" style="flex: 1; text-align: right; margin-right: 10px;">Phone Number:</label>
                <input type="text" style="color:black; flex: 2;" name="number" placeholder="Phone Number">
              </div>

              <div style="display: flex; justify-content: center; margin-top: 20px;">
                
                <input type="submit" class="btn btn-success">
              </div>
         </div>

          </form>
        </div>

    </div>
  </body>
</html>