@extends('layout.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin') }}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('organization.index') }}">Organization</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Organization</li>
        </ol>
    </nav>
    <form method="POST" action="{{route('organization.update', $organization->id)}}">
        @csrf
        @method('PATCH')
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Organization</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="name" class="control-label">Organization Name</label>
                            <input type="text" name="name" class="form-control" value="{{$organization->name}}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <input type="submit" value="Update Organization" class="btn btn-primary">
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </form>  
@endsection
@section('page-specific-js')
<!-- <script>
    $( document ).ready(function() {
        $("#createDesignation").addClass("active");
        $("#collapseTwo").toggleClass("show");
    });
</script> -->
@endsection