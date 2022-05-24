@extends('layout.master')
@section('page-specific-css')
  <!-- Custom styles for this page -->
  <!-- For Select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/user/index') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create New User</li>
        </ol>
    </nav>
    <form method="POST" action="/admin/user">
        {{ csrf_field() }}
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Details <span class="text-danger">(Mandatory)</span></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="password2" class="control-label">Retype Password</label>
                            <input type="password" name="password2" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="role" class="control-label">Role (Portal)</label>
                            <select class="form-control" name="role" aria-label=".form-select" required>
                                <option selected value="1">Guest</option>
                                <option value="2">Employee</option>
                                <option value="3">Admin</option>
                                <option value="4">Super Admin</option>
                            </select>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Details <span class="text-success">(Optional)</span></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="phno" class="control-label">Phone Number</label>
                            <input type="text" name="phno" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="gender" class="control-label">Gender</label>
                            <select class="form-control" name="gender" aria-label=".form-select" required>
                                <option selected value="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="addr" class="control-label">Address</label>
                            <input type="text" name="addr" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="pincode" class="control-label">Pin Code</label>
                            <input type="text" name="pincode" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="state" class="control-label">State</label>
                            <input type="text" name="state" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="district" class="control-label">District</label>
                            <input type="text" name="district" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="dob" class="control-label">Date Of Birth</label>
                            <input type="date" name="dob" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="idtype" class="control-label">ID Type</label>
                            <select class="form-control" name="idtype" aria-label=".form-select">
                                <option selected value="">Select ID Type</option>
                                <option value="1">Adhaar</option>
                                <option value="2">PAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="idno" class="control-label">Unique ID Number</label>
                            <input type="text" name="idno" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="ifsccode" class="control-label">Bank IFSC Code</label>
                            <input type="text" name="ifsccode" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="bankaccno" class="control-label">Bank Account No </label>
                            <input type="text" name="bankaccno" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Joining Details <span class="text-success">(Optional)</span></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="project" class="control-label">Project</label>
                            <select class="form-control" name="project" aria-label=".form-select">
                                <option selected value="">Select Project</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="doj" class="control-label">Date of Joining</label>
                            <input type="date" name="doj" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="organisationposted" class="control-label">Organization</label>
                            <select class="form-control" name="organisationposted" aria-label=".form-select">
                                <option selected value="">Select Organization</option>
                                @foreach($organizations as $organization)
                                    <option value="{{$organization->id}}">{{$organization->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="category" class="control-label">Category</label>
                            <select class="form-control" name="category" aria-label=".form-select">
                                <option selected value="">Select Category</option>
                                <option value="1">Govt. Employee</option>
                                <option value="2">Contractual</option>
                                <option value="3">Retired Govt./PSU Employee</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="districtposted" class="control-label">District Posted</label>
                            <select id="districtposted" class="form-control" name="districtposted" aria-label=".form-select">
                                <option selected value="">Select District</option>    
                                @foreach($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="designation" class="control-label">Designation</label>
                            <select id="designation" class="form-control" name="designation" aria-label=".form-select">
                                <option selected value="">Select Designation</option>    
                                @foreach($designations as $designation)
                                    <option value="{{$designation->id}}">{{$designation->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <input type="hidden" name="role" value="0">
                            <input type="submit" value="Create Designation" class="btn btn-primary">
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </form>  
@endsection
@section('page-specific-js')
<!-- For Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<!-- Custom JS -->
<script>
  $('#districtposted').select2({
    width: '100%',
    placeholder: "Select An Option",
    allowClear: true
  });
  $('#designation').select2({
    width: '100%',
    placeholder: "Select An Option",
    allowClear: true
  });
</script>
<script>
    $( document ).ready(function() {
        $("#createUser").addClass("active");
        $("#collapseTwo").toggleClass("show");
    });
</script>
@endsection