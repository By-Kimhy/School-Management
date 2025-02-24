@extends('backend.layout.master')
@section('title', 'Major')
@section( 'content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{route('major.create')}}" class="btn btn-outline-primary">
                        <i class="fas fa-plus-circle"></i> Create Major
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Major</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Major Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Major Type</th>
                                        <th>Major Description</th>
                                        <th>Progress</th>
                                        <th style="width: 40px">Label</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($majors as $key => $value)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$value->major_type}}</td>
                                        <td>{{$value->major_Des}}</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">55%</span></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary"><i class="far fa-eye"></i> View</button>
                                            <a href="{{url('major/'.$value->id.'/edit')}}" type="button" class="btn btn-outline-info"><i class="far fa-edit"></i> Edit</a>
                                            
                                            <form action="{{url('/major/'.$value->id)}}" method="POST" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure to Delete?')"><i class="fas fa-trash"></i> Delete</button>    
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Toastr Examples
            </h3>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-success toastrDefaultSuccess">
                Launch Success Toast
            </button>
            <button type="button" class="btn btn-info toastrDefaultInfo">
                Launch Info Toast
            </button>
            <button type="button" class="btn btn-danger toastrDefaultError">
                Launch Error Toast
            </button>
            <button type="button" class="btn btn-warning toastrDefaultWarning">
                Launch Warning Toast
            </button>
        </div>
        <!-- /.card -->
    </div> --}}
</div>


@endsection

@section('alert_msg')
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true
            , position: 'top-end'
            , showConfirmButton: false
            , timer: 3000
        });

        @if (session('flash_message'))
            toastr.success("{{session('flash_message')}}");
        @endif

        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultInfo').click(function() {
            toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultError').click(function() {
            toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultWarning').click(function() {
            toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });

    });

</script>
@endsection
