@extends('layout.master')
@section('page-specific-css')
  <!-- Custom styles for this page -->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin') }}">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">User</li>
        </ol>
    </nav>
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ url('/admin/user/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Add New User</a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

      <div class="container-fluid">
          <!-- DataTables -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email-Id</th>
                      <th>Created On</th>
                      <th>Role</th>
                      <th>District</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Email-Id</th>
                      <th>Created On</th>
                      <th>Role</th>
                      <th>District</th>
                      <th>Action</th>                   
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->created_at}}</td>
                      <td>{{$user->role}}</td>
                      @if($user->userinfo == null)
                      <td>N/A</td>
                      @else
                      <td>{{$user->userinfo->district}}</td>
                      @endif  
                      <td>
                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                        <a href="" class="btn btn-primary btn-sm">View Detail</a>
                      </td>
                    </tr>
                    @endforeach
                    <!-- <tr>
                      <td>User2</td>
                      <td>User2@email.com</td>
                      <td>2012/07/02</td>
                      <td>Employee</td>
                      <td>
                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                        <a href="" class="btn btn-primary btn-sm">View Detail</a>
                      </td>
                    </tr>
                    <tr>
                      <td>User3</td>
                      <td>User3@email.com</td>
                      <td>2010/09/13</td>
                      <td>Employee</td>
                      <td>
                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                        <a href="" class="btn btn-primary btn-sm">View Detail</a>
                      </td>
                    </tr>
                    <tr>
                      <td>User4</td>
                      <td>User4@email.com</td>
                      <td>2017/12/18</td>
                      <td>Employee</td>
                      <td>
                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                        <a href="" class="btn btn-primary btn-sm">View Detail</a>
                      </td>
                    </tr>
                    <tr>
                      <td>User5</td>
                      <td>User5@email.com</td>
                      <td>2016/09/03</td>
                      <td>Guest</td>
                      <td>
                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                        <a href="" class="btn btn-primary btn-sm">View Detail</a>
                      </td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    </div>
    <!-- /.container-fluid -->
@endsection
@section('page-specific-js')
  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
  <script>
    $( document ).ready(function() {
        $("#viewUser").addClass("active");
        $("#collapsePages").removeClass("show");
        $("#collapseTwo").toggleClass("show");
    });
</script>
@endsection