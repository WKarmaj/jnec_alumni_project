<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
</head>

<body style="background-color: #f2f2f2; font-family: Arial, sans-serif;">
  <div class="container-scroller" >
      @include('admin.navbar')

  
      @include('admin.sidebar')
  

 <div class="conatainer-fluid page-body-wrapper" style="margin-top: 50px;">


            <div class="card" style="background-color: #f2f2f2; font-family: Arial, sans-serif;">
    <div class="card-body">
    @if(session()->has('message'))
            <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert"></button>
              {{ session()->get('message') }}
            </div>
            @endif
    <h4 class="card-title" style="color:black;">Upload Event</h4>
    <form action="{{ url('upload_event') }}" method="POST" enctype="multipart/form-data" style="background-color: #f2f2f2; font-family: Arial, sans-serif;">
      @csrf

      <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label text-right" style="color: #333;">Name of the Event:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="name" placeholder="Enter the name" style="color: #333; background-color: #f8f9fa;">
        </div>
      </div>

      <div class="form-group row">
        <label for="file" class="col-sm-3 col-form-label text-right" style="color: #333;">Image:</label>
        <div class="col-sm-9">
          <input type="file" class="form-control-file" name="file" style="color: #333;">
        </div>
      </div>

      <div class="form-group row">
        <label for="date" class="col-sm-3 col-form-label text-right" style="color: #333;">Date:</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" name="date" style="color: #333; background-color: #f8f9fa;">
        </div>
      </div>

      <div class="form-group row">
        <label for="time" class="col-sm-3 col-form-label text-right" style="color: #333;">Time:</label>
        <div class="col-sm-9">
          <input type="time" class="form-control" name="time" style="color: #333; background-color: #f8f9fa;">
        </div>
      </div>

      <div class="form-group row">
        <label for="venue" class="col-sm-3 col-form-label text-right" style="color: #333;">Venue:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="venue" placeholder="Place or Venue" style="color: #333; background-color: #f8f9fa;">
        </div>
      </div>

      <div class="form-group row">
        <label for="about" class="col-sm-3 col-form-label text-right" style="color: #333;">About the Event:</label>
        <div class="col-sm-9">
          <textarea class="form-control" name="about" rows="4" placeholder="Enter the description..." style="color: #333; background-color: #f8f9fa;"></textarea>
        </div>
      </div>

      <div class="form-group row">
        <label for="person" class="col-sm-3 col-form-label text-right" style="color: #333;">Focal Person:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="person" placeholder="Name of the event focal person" style="color: #333; background-color: #f8f9fa;">
        </div>
      </div>

      <div class="form-group row">
        <label for="number" class="col-sm-3 col-form-label text-right" style="color: #333;">Phone Number:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="number" placeholder="Phone Number" style="color: #333; background-color: #f8f9fa;">
        </div>
      </div>

      <div class="form-group text-center">
        <button type="submit" class="btn btn-success" style="color:black;">Submit</button>
      </div>
    </form>
  </div>
</div>

        

       @include('admin.script')
    </div>
</body>

</html>
