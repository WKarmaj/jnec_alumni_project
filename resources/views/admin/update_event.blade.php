<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public">
        <style type="text/css">
            label
            {
                display: inline-block;
                width: 200px;
            }
        </style>
    @include('admin.css')
    </head>
 
  <body>
  
    <div class="container-scroller">
    @include('admin.sidebar')
    
      <!-- partial:partials/_sidebar.html -->
               
      <!-- partial -->
      
        <!-- partial:partials/_navbar.html -->
                @include('admin.navbar')
                <div class="container-fluid page-body-wrapper" style="background-color: #f8f9fa;">
  <div class="container" align="center" style="padding: 100px;">
    <form action="{{ url('editevents', $events->id) }}" method="POST" enctype="multipart/form-data">

      @csrf
      <div style="display: flex; flex-direction: column;">
        <div style="padding: 15px; display: flex; align-items: center; margin-bottom: 10px;">
          <label for="" style="padding-right: 20px; color: #333;">Name</label>
          <input type="text" style="color: black; background-color: #ffffff;" name="name" value="{{ $events->name }}">
        </div>
        <div style="padding: 15px; display: flex; align-items: center; margin-bottom: 10px;">
          <label for="" style="padding-right: 20px; color: #333;">Old Image</label>
          <img height="100" width="100" src="eventimage/{{ $events->image }}" alt="">
        </div>
        <div style="padding: 15px; display: flex; align-items: center; margin-bottom: 10px;">
          <label for="" style="padding-right: 20px; color: #333;">Change Image</label>
          <input type="file" name="file">
        </div>
        <div style="padding: 15px; display: flex; align-items: center; margin-bottom: 10px;">
          <label for="" style="padding-right: 20px; color: #333;">Date</label>
          <input type="date" style="color: black; background-color: #ffffff;" name="date" value="{{ $events->date }}">
        </div>
        <div style="padding: 15px; display: flex; align-items: center; margin-bottom: 10px;">
          <label for="" style="padding-right: 20px; color: #333;">Time</label>
          <input type="text" style="color: black; background-color: #ffffff;" name="time" value="{{ $events->time }}">
        </div>
        <div style="padding: 15px; display: flex; align-items: center; margin-bottom: 10px;">
          <label for="" style="padding-right: 20px; color: #333;">Venue</label>
          <input type="text" style="color: black; background-color: #ffffff;" name="venue" value="{{ $events->venue }}">
        </div>
        <div style="padding: 15px; display: flex; align-items: center; margin-bottom: 10px;">
          <label for="" style="padding-right: 20px; color: #333;">About the Event</label>
          <textarea name="events" id="events" style="color: black; background-color: #ffffff;" rows="2">{{ $events->about }}</textarea>
        </div>
        <div style="padding: 15px; display: flex; align-items: center; margin-bottom: 10px;">
          <label for="" style="padding-right: 20px; color: #333;">Person</label>
          <input type="text" style="color: black; background-color: #ffffff;" name="person" value="{{ $events->person }}">
        </div>
        <div style="padding: 15px; display: flex; align-items: center; margin-bottom: 10px;">
          <label for="" style="padding-right: 20px; color: #333;">Phone Number</label>
          <input type="text" style="color: black; background-color: #ffffff;" name="phone" value="{{ $events->phone }}">
        </div>
        <div style="padding: 15px; display: flex; justify-content: center;">
          <input type="submit" class="btn btn-primary" style="background-color: #007bff; color: #ffffff;">
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