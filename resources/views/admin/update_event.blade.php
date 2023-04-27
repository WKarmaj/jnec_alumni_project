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

    
      <!-- partial:partials/_sidebar.html -->
                @include('admin.sidebar')
      <!-- partial -->
      
        <!-- partial:partials/_navbar.html -->
                @include('admin.navbar')
                <div class="conatainer-fluid page-body-wrapper">
                    <div class="container" align="center" style="padding:100px">
                        <form action="{{url('editevents',$events->id)}}" method="POST" enctype="multipart/form-data">

                            @csrf 
                            <div style="display: flex; flex-direction: column;">
                                <div style="padding:15px; display:flex; align-items: center; margin-bottom: 10px;">
                                <label for=""style="padding-right: 20px;" >Name</label>
                                <input type="text" style="color:black;" name="name" value="{{$events->name}}">
                                </div>
                                 <div  style="padding:15px; display:flex; align-items: center; margin-bottom: 10px;">
                                <label for=""style="padding-right: 20px;">Old Image</label>
                                <img height="100" width="100" src="eventimage/{{$events->image}}" alt="">
                                 </div>
                                <div  style="padding:15px; display:flex; align-items: center; margin-bottom: 10px;">
                                    <label for=""style="padding-right: 20px;">Change Image</label>
                                    <input type="file" name="file">
                                </div>
                                <div  style="padding:15px; display:flex; align-items: center; margin-bottom: 10px;">
                                    <label for=""style="padding-right: 20px;">Date</label>
                                    <input type="date" style="color:black;" name="date" value="{{$events->date}}">
                                </div>
                                <div  style="padding:15px; display:flex; align-items: center; margin-bottom: 10px;">
                                    <label for="" style="padding-right: 20px;">Time</label>
                                    <input type="text" style="color:black;" name="time" value="{{$events->time}}">
                                </div>
                                <div style="padding:15px; display:flex; align-items: center; margin-bottom: 10px;">
                                    <label for="" style="padding-right: 20px;">Venue</label>
                                    <input type="text" style="color:black;" name="venue" value="{{$events->venue}}">
                                </div>
                                <div style="padding:15px; display:flex; align-items: center; margin-bottom: 10px;">
                                    <label for=""style="padding-right: 20px;">About the Event</label>
                                    <textarea name="events" id="events" style="color:black;" rows="2" value="{{$events->about}}"></textarea>
                                    
                                </div>
                                <div style="padding:15px; display:flex; align-items: center; margin-bottom: 10px;">
                                    <label for=""  style="padding-right: 20px;" >Person</label>
                                    <input type="text" style="color:black;" name="person" value="{{$events->person}}">
                                </div>
                                <div style="padding:15px; display:flex; align-items: center; margin-bottom: 10px;">
                                    <label for="" style="padding-right: 20px;">Phone Number</label>
                                    <input type="text" style="color:black;" name="phone" value="{{$events->phone}}">
                                </div>
                                <div style="padding:15px; display:flex; justify-content: center;">
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