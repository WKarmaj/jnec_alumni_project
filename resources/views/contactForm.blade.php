<h1 class="text-center wow fadeInUp">Make Your Suggestion for the College</h1>
        <div class="card-body">
          @if(Session::has('success'))
             <div class="alert alert-success">
                {{Session::get('success')}}
              </div>
         @endif
        </div>
      <form class="main-form" action="{{ route('contact.us.store') }}" method="POST" id="contactUSForm">
      {{ csrf_field() }}
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
          @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
           @endif
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
          @if ($errors->has('email'))
             <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
          @if ($errors->has('phone'))
            <span class="text-danger">{{ $errors->first('phone') }}</span>
          @endif
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
             @if ($errors->has('message'))
                <span class="text-danger">{{ $errors->first('message') }}</span>
             @endif
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit</button>
      </form>
        