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
                                <h4 class="card-title" style="color: #333333;">Add Department</h4>
                                <form action="{{ url('add_department') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="department_name">Department Name:</label>
                                        <input type="text" id="department_name" name="department_name" class="form-control" placeholder="Add department here..." required style="background-color: #f2f2f2; border-color: #ced4da; color: #495057;">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #007bff; border-color: #007bff; color: #ffffff;">Submit</button>
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
