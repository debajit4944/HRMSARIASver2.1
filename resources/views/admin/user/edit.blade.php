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
    <form method="POST" action="{{route('admin_users.update', $user->id)}}" id="userRegForm">
        @csrf
        @method('PATCH')
        <div class="card shadow mb-4" id="card1">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Details <span class="text-danger">(Mandatory)</span></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3 has-success">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{old('name',$user->name)}}">
                            @error('name')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{old('email',$user->email)}}">
                            @error('email')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="password" class="control-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" value="{{old('password',$user->password)}}">
                            @error('password')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="password2" class="control-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{old('password_confirmation',$user->password)}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="phno" class="control-label">Phone Number</label>
                            <input type="text" id="phno" name="phno" class="form-control" value="{{old('phno',$user->phno)}}">
                            @error('phno')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="role" class="control-label">Role (Portal)</label>
                            <select class="form-control" id="role" name="role" aria-label=".form-select">
                                <option value="4" {{old('role', $user->role) == 4 ? 'selected' : ''}}>Guest</option>
                                <option value="1" {{old('role', $user->role) == 1 ? 'selected' : ''}}>Employee</option>
                                <option value="2" {{old('role', $user->role) == 2 ? 'selected' : ''}}>Admin</option>
                                <option value="3" {{old('role', $user->role) == 3 ? 'selected' : ''}}>Super Admin</option>
                            </select>
                        </div>
                        @error('role')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>            
            </div>
        </div>
        @if($user->role != 4)
        <div class="card shadow mb-4" id="card2">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Details <span class="text-success">(Optional)</span></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="gender" class="control-label">Gender</label>
                            <select class="form-control" id="genderId" name="gender" aria-label=".form-select">
                                <option value="" {{old('gender', $user->userinfo->gender) == '' ? 'selected' : ''}}>Select One</option>
                                <option value="1" {{old('gender', $user->userinfo->gender) == 1 ? 'selected' : ''}}>Male</option>
                                <option value="2" {{old('gender', $user->userinfo->gender) == 2 ? 'selected' : ''}}>Female</option>
                                <option value="3" {{old('gender', $user->userinfo->gender) == 3 ? 'selected' : ''}}>Other</option> -->
                            </select>
                        </div>
                        @error('gender')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="dob" class="control-label">Date Of Birth</label>
                            <input type="date" id="dob" name="dob" class="form-control" value="{{old('dob',$user->userinfo->dob)}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="addr" class="control-label">Address</label>
                            <input type="text" id="addr" name="addr" class="form-control" value="{{old('addr',$user->userinfo->addr)}}">
                        </div>
                        @error('addr')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="addrdistrict" class="control-label">District</label>
                            <input type="text" id="addrdistrict" name="addrdistrict" class="form-control" value="{{old('addrdistrict',$user->userinfo->addrdistrict)}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="state" class="control-label">State</label>
                            <input type="text" id="state" name="state" class="form-control" value="{{old('state',$user->userinfo->state)}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="pincode" class="control-label">Pin Code</label>
                            <input type="text" id="pincode" name="pincode" class="form-control" value="{{old('pincode',$user->userinfo->pincode)}}">
                        </div>
                        @error('pincode')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="idtype" class="control-label">ID Type</label>
                            <select class="form-control" id="idType" name="idtype" aria-label=".form-select">
                                <option value="" {{old('idtype', $user->userinfo->idtype) == '' ? 'selected' : ''}}>Select ID Type</option>
                                <option value="1" {{old('idtype', $user->userinfo->idtype) == 1 ? 'selected' : ''}}>Adhaar</option>
                                <option value="2" {{old('idtype', $user->userinfo->idtype) == 2 ? 'selected' : ''}}>PAN</option>
                            </select>
                        </div>
                        @error('idtype')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="idno" class="control-label">Unique ID Number</label>
                            <input type="text" id="idNo" name="idno" class="form-control" value="{{old('idno',$user->userinfo->idno)}}">
                        </div>
                        @error('idno')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="ifsccode" class="control-label">Bank IFSC Code</label>
                            <input type="text" id="ifscCode" name="ifsccode" class="form-control" value="{{old('ifsccode',$user->userinfo->ifsccode)}}">
                        </div>
                        @error('ifsccode')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="bankaccno" class="control-label">Bank Account No </label>
                            <input type="text" id="bankAccNo" name="bankaccno" class="form-control" value="{{old('bankaccno',$user->userinfo->bankaccno)}}">
                        </div>
                        @error('bankaccno')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4" id="card3">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Joining Details <span class="text-success">(Optional)</span></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="project_id" class="control-label">Project</label>
                            <select class="form-control" id="projectId" name="project_id" aria-label=".form-select">
                                <option selected value="">Select Project</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}" {{old('project_id', $user->userinfo->project_id) == $project->id ? 'selected' : ''}}>{{$project->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('project_id')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="doj" class="control-label">Date of Joining</label>
                            <input type="date" id="doj" name="doj" class="form-control" value="{{old('doj',$user->userinfo->doj)}}">
                        </div>
                        @error('doj')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="organisation_id" class="control-label">Organization</label>
                            <select class="form-control" id="organisationId" name="organisation_id" aria-label=".form-select">
                                <option selected value="">Select Organization</option>
                                @foreach($organizations as $organization)
                                    <option value="{{$organization->id}}" {{old('organisation_id', $user->userinfo->organisation_id) == $organization->id ? 'selected' : ''}}>{{$organization->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('organisation_id')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="category_id" class="control-label">Category</label>
                            <select class="form-control" id="categoryId" name="category_id" aria-label=".form-select">
                                <option value="" {{old('category_id', $user->userinfo->category_id) == '' ? 'selected' : ''}}>Select Category</option>
                                <option value="1" {{old('category_id', $user->userinfo->category_id) == 1 ? 'selected' : ''}}>Govt. Employee</option>
                                <option value="2" {{old('category_id', $user->userinfo->category_id) == 2 ? 'selected' : ''}}>Contractual</option>
                                <option value="3" {{old('category_id', $user->userinfo->category_id) == 3 ? 'selected' : ''}}>Retired Govt./PSU Employee</option>
                            </select>
                        </div>
                        @error('category_id')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="district_id" class="control-label">District Posted</label>
                            <select class="form-control" id="districtId" name="district_id" aria-label=".form-select">
                                <option selected value="">Select District</option>    
                                @foreach($districts as $district)
                                    <option value="{{$district->id}}" {{old('district_id', $user->userinfo->district_id) == $district->id ? 'selected' : ''}}>{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('district_id')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="designation_id" class="control-label">Designation</label>
                            <select class="form-control" id="designationId" name="designation_id" aria-label=".form-select">
                                <option selected value="">Select Designation</option>    
                                @foreach($designations as $designation)
                                    <option value="{{$designation->id}}" {{old('designation_id', $user->userinfo->designation_id) == $designation->id ? 'selected' : ''}}>{{$designation->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('designation_id')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>            
            </div>
        </div>
        @else
        <div class="card shadow mb-4" id="card2">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Details <span class="text-success">(Optional)</span></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="gender" class="control-label">Gender</label>
                            <select class="form-control" id="genderId" name="gender" aria-label=".form-select">
                                <option value="" {{old('gender') == '' ? 'selected' : ''}}>Select One</option>
                                <option value="1" {{old('gender') == 1 ? 'selected' : ''}}>Male</option>
                                <option value="2" {{old('gender') == 2 ? 'selected' : ''}}>Female</option>
                                <option value="3" {{old('gender') == 3 ? 'selected' : ''}}>Other</option> -->
                            </select>
                        </div>
                        @error('gender')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="dob" class="control-label">Date Of Birth</label>
                            <input type="date" id="dob" name="dob" class="form-control" value="{{old('dob')}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="addr" class="control-label">Address</label>
                            <input type="text" id="addr" name="addr" class="form-control" value="{{old('addr')}}">
                        </div>
                        @error('addr')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="addrdistrict" class="control-label">District</label>
                            <input type="text" id="addrdistrict" name="addrdistrict" class="form-control" value="{{old('addrdistrict')}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="state" class="control-label">State</label>
                            <input type="text" id="state" name="state" class="form-control" value="{{old('state')}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="pincode" class="control-label">Pin Code</label>
                            <input type="text" id="pincode" name="pincode" class="form-control" value="{{old('pincode')}}">
                        </div>
                        @error('pincode')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="idtype" class="control-label">ID Type</label>
                            <select class="form-control" id="idType" name="idtype" aria-label=".form-select">
                                <option value="" {{old('idtype') == '' ? 'selected' : ''}}>Select ID Type</option>
                                <option value="1" {{old('idtype') == 1 ? 'selected' : ''}}>Adhaar</option>
                                <option value="2" {{old('idtype') == 2 ? 'selected' : ''}}>PAN</option>
                            </select>
                        </div>
                        @error('idtype')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="idno" class="control-label">Unique ID Number</label>
                            <input type="text" id="idNo" name="idno" class="form-control" value="{{old('idno')}}">
                        </div>
                        @error('idno')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="ifsccode" class="control-label">Bank IFSC Code</label>
                            <input type="text" id="ifscCode" name="ifsccode" class="form-control" value="{{old('ifsccode')}}">
                        </div>
                        @error('ifsccode')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="bankaccno" class="control-label">Bank Account No </label>
                            <input type="text" id="bankAccNo" name="bankaccno" class="form-control" value="{{old('bankaccno')}}">
                        </div>
                        @error('bankaccno')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4" id="card3">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">User Joining Details <span class="text-success">(Optional)</span></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="project_id" class="control-label">Project</label>
                            <select class="form-control" id="projectId" name="project_id" aria-label=".form-select">
                                <option selected value="">Select Project</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}" {{old('project_id') == $project->id ? 'selected' : ''}}>{{$project->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('project_id')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="doj" class="control-label">Date of Joining</label>
                            <input type="date" id="doj" name="doj" class="form-control" value="{{old('doj')}}">
                        </div>
                        @error('doj')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="organisation_id" class="control-label">Organization</label>
                            <select class="form-control" id="organisationId" name="organisation_id" aria-label=".form-select">
                                <option selected value="">Select Organization</option>
                                @foreach($organizations as $organization)
                                    <option value="{{$organization->id}}" {{old('organisation_id') == $organization->id ? 'selected' : ''}}>{{$organization->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('organisation_id')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="category_id" class="control-label">Category</label>
                            <select class="form-control" id="categoryId" name="category_id" aria-label=".form-select">
                                <option value="" {{old('category_id') == '' ? 'selected' : ''}}>Select Category</option>
                                <option value="1" {{old('category_id') == 1 ? 'selected' : ''}}>Govt. Employee</option>
                                <option value="2" {{old('category_id') == 2 ? 'selected' : ''}}>Contractual</option>
                                <option value="3" {{old('category_id') == 3 ? 'selected' : ''}}>Retired Govt./PSU Employee</option>
                            </select>
                        </div>
                        @error('category_id')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="district_id" class="control-label">District Posted</label>
                            <select class="form-control" id="districtId" name="district_id" aria-label=".form-select">
                                <option selected value="">Select District</option>    
                                @foreach($districts as $district)
                                    <option value="{{$district->id}}" {{old('district_id') == $district->id ? 'selected' : ''}}>{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('district_id')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                        <label for="designation_id" class="control-label">Designation</label>
                            <select class="form-control" id="designationId" name="designation_id" aria-label=".form-select">
                                <option selected value="">Select Designation</option>    
                                @foreach($designations as $designation)
                                    <option value="{{$designation->id}}" {{old('designation_id') == $designation->id ? 'selected' : ''}}>{{$designation->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('designation_id')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>            
            </div>
        </div>
        @endif
        <div class="col-12">
            <div class="form-group mb-3">
                <input type="submit" value="Update User Details" class="btn btn-primary">
            </div>
        </div>
    </form>  
@endsection
@section('page-specific-js')
<!-- For Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<!--Form Validator-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Custom JS -->
<script>
  $('#districtId').select2({
    width: '100%',
    placeholder: "Select An Option",
    allowClear: true
  });
  $('#designationId').select2({
    width: '100%',
    placeholder: "Select An Option",
    allowClear: true
  });
</script>
<script>
    $( document ).ready(function() {
        $("#createUser").addClass("active");
        $("#collapseTwo").toggleClass("show");

        $selected_role = $('#role').children("option:selected").val();
        // alert($selected_role);
        $card2 = $('card2');
        $card3 = $('card3');
        // console.log(card2);
        // console.log($selected_role);
        if($selected_role==4)
        {
            card2.classList.add("d-none");
            card3.classList.add("d-none");
        } else{
            card2.classList.remove("d-none");
            card3.classList.remove("d-none");
        }
    });
</script>
<!-- <script>
    $(document).ready(function() {
        $("#userRegForm").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 20,
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirmPassword: {
                    required: true,
                    equalTo: "#password"
                },
                phno: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true
                    },
                
                    // pincode: {
                    //     required: true,
                    //     minlength: 6,
                    //     maxlength: 6
                    // }, 
            },
            messages: {
                name: {
                    required: "First name is required",
                    maxlength: "First name cannot be more than 20 characters"
                },
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 50 characters",
                },
                password: {
                    required: "Password is required",
                    minlength: "Password must be at least 5 characters"
                },
                confirmPassword: {
                    required:  "Confirm password is required",
                    equalTo: "Password and confirm password should same"
                },
                phone: {
                        required: "Phone number is required",
                        minlength: "Phone number must be of 10 digits"
                    },
                
                    // pincode: {
                    //     required: "Zipcode is required",
                    //     minlength: "Zipcode must be of 6 digits",
                    //     maxlength: "Zipcode cannot be more than 6 digits"
                    // },
            }
        });
    });
</script> -->
<script>
    document.getElementById('role').addEventListener("change", function(){
        var role_selected = document.getElementById('role');
        let role_value = role_selected.options[role_selected.selectedIndex].getAttribute('value');
        //alert(role_value);
        let card2 = document.getElementById("card2");
        let card3 = document.getElementById("card3");
        if(role_value==4)
        {
            card2.classList.add("d-none");
            card3.classList.add("d-none");
        } else{
            card2.classList.remove("d-none");
            card3.classList.remove("d-none");
        }
    });
</script>
@endsection