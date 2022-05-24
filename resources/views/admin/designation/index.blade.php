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
            <li class="breadcrumb-item active" aria-current="page">Designation</li>
        </ol>
    </nav>
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('designation.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Add New designation</a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    @if(session('record-deleted'))
      <div class="alert alert-danger">{{session('record-deleted')}}</div>    
    @elseif(session('record-created'))
    <div class="alert alert-success">{{session('record-created')}}</div>   
    @elseif(session('record-updated'))
    <div class="alert alert-success">{{session('record-updated')}}</div> 
    @endif
      <div class="container-fluid">
          <!-- DataTables -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Designation List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Designation</th>
                      <th>Created On</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Designation</th>
                      <th>Created On</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($designations as $designation)
                    <tr>
                      <td>{{$designation->name}}</td>
                      <td>{{$designation->created_at}}</td>  
                      <td>
                        <a href="{{route('designation.edit',$designation->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <form class="d-inline" method="POST" action="{{route('designation.destroy',$designation->id)}}" enctype="multipart/form-data">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <!-- <a href="" class="btn btn-danger btn-sm">Delete</a> -->
                      </td>
                    </tr>
                    @endforeach
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
        $("#viewDesignation").addClass("active");
        $("#collapsePages").removeClass("show");
        $("#collapseTwo").toggleClass("show");
    });
</script>
@endsection