<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>

<body style="background-color: #f8f9fa;">
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card" style="background-color: #ffffff; border: none;">
                            <div class="card-body">
                                <h4 class="card-title" style="color: #333333;">Add Programme</h4>
                                <form action="{{ route('upload.programme') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="department_id">Department</label>
                                        <select name="department_id" id="department_id" class="form-control" required style="background-color: #f2f2f2; border-color: #ced4da; color: #495057;">
                                                <option value="">Select Department</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="programme_name">Programme Name</label>
                                        <input type="text" name="programme_name" id="programme_name" class="form-control" required style="background-color: #f2f2f2; border-color: #ced4da; color: #495057;">
                                    </div>
                                   
                                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #007bff; border-color: #007bff; color: #ffffff;">Add Programme</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.script')
    </div>
</body>
</html>
