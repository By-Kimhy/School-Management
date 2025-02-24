@extends('backend.layout.master')
@section('title', 'CreateMajor')
@section( 'content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{route('major.index')}}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-circle-left"></i> Back
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Major</li>
                    </ol>
                </div>
                <div class="col-sm-12">
                    @if ($errors->any()){
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($$errors ->all() as $error)
                                    <li>
                                        {$error}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    }
                    
                    @endif
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Major</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('/major')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Major Type <span class="text-danger">*</span></label>
                        <input type="text" name="major_type" class="form-control"  placeholder="Enter Major...">
                    </div>
                    <div class="form-group">
                        <label>Description <span class="text-danger">*</span></label>
                        <input type="text" name="major_Des" class="form-control" placeholder="Enter Major Description...">
                    </div>
                    <div class="form-group">
                        <label>File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection
