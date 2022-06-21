@extends('layout.master')
@section('page-specific-css')
<!-- Custom styles for this page -->
  <!-- DATATABLES -->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <!-- SWEET-DELETE -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin') }}">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">District</li>
        </ol>
    </nav>
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('district.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Add New District</a>
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
              <h6 class="m-0 font-weight-bold text-primary">District List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>District</th>
                      <th>Created On</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>District</th>
                      <th>Created On</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if(gettype($districts) != "string")
                    @foreach($districts as $district)
                    <tr>
                      <td>{{$district->name}}</td>
                      <td>{{$district->created_at}}</td>  
                      <td>
                        <a href="{{route('district.edit',$district->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <form class="d-inline" method="POST" action="{{route('district.destroy',$district->id)}}" enctype="multipart/form-data">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm show-alert-delete-box">Delete</button>
                        </form>
                        <!-- <a href="" class="btn btn-danger btn-sm">Delete</a> -->
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr><td>{{$districts}}</td></tr>
                    @endif
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- Page level custom scripts -->
  <!-- DATATABLES -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
  <script>
    $( document ).ready(function() {
        $("#viewDistrict").addClass("active");
        $("#collapsePages").removeClass("show");
        $("#collapseTwo").toggleClass("show");
    });
  </script>

  <!-- SWEET-DELETE -->
  <script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
@endsection