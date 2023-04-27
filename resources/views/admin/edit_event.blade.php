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
                <div class="conatainer-fluid page-body-wrapper">
                <div align="center" style="padding-top:100px;">
                     <table>
                      <tr style="background-color:tomato;">
                        <td style="padding: 10px;">Name</td>
                        <td style="padding: 10px;">Image</td>
                        <td style="padding: 10px;">Date</td>
                        <td style="padding: 10px;">Time</td>
                        <td style="padding: 10px;">Venue</td>
                        <td style="padding: 10px;">About the Event</td>
                        <td style="padding: 10px;">Focal Person</td>
                        <td style="padding: 10px;">Phone Number</td>
                        <td style="padding: 10px;">Edit Event</td>
                        <td style="padding: 10px;">Delete Event</td>
                         </tr>
                         @foreach($editevents as $events)
                         <tr align="center" style ="">
                            <td style="padding: 10px;">{{$events->name}}</td>
                            <td><img height="100" width="100" src="eventimage/{{$events->image}}" alt=""></td>
                            <td style="padding: 10px;">{{$events->date}}</td>
                            <td style="padding: 10px;">{{$events->time}}</td>
                            <td style="padding: 10px;">{{$events->venue}}</td>
                            <td style="padding: 10px;">{{$events->about}}</td>
                            <td style="padding: 10px;">{{$events->person}}</td>
                            <td style="padding: 10px;">{{$events->phone}}</td>
                            <td><a class="btn btn-primary" href="{{url('updateevent',$events->id)}}">Edit</a></td>
                            <td><a class="btn btn-danger" href="{{url('edit_event',$events->id)}}">Delete</a></td>
                         </tr>
                         @endforeach
                    </table>
                </div>

            </div>
                @include('admin.script')
    <!-- End custom js for this page -->
    </div>
  </body>
</html>