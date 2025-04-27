@extends('backend.layout.master')
@section('title', 'Teacher')
@section('t_menu-open', 'menu-open')
@section('t_active', 'active')
@section( 'content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{route('teacher.create')}}" class="btn btn-outline-primary">
                        <i class="fas fa-plus-circle"></i> Create Teacher
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Teacher</li>
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
                            <h3 class="card-title">Teacher Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Image</th>
                                        <th>TeacherCode</th>
                                        <th>Name</th>
                                        <th>DateOfBirth</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Profile</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teachers as $key => $value)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>
                                            
                                            <img src="{{asset('/uploads/thumbnail/teacher/'.$value->teacher_photo)}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                        
                                        </td>
                                        <td>{{$value->teacher_code}}</td>
                                        <td>{{$value->teacher_name}}</td>
                                        <td>{{$value->teacher_dob}}</td>
                                        <td>{{$value->teacher_email}}</td>
                                        <td>{{$value->teacher_phone}}</td>
                                        <td>{{$value->teacher_profile}}</td>
                                        
                                        
                                        <td>
                                            <button type="button" class="btn btn-outline-primary"><i class="far fa-eye"></i> View</button>
                                            <a href="{{url('teacher/'.$value->id.'/edit')}}" type="button" class="btn btn-outline-info"><i class="far fa-edit"></i> Edit</a>
                                            
                                            <form action="{{url('teacher/'.$value->id)}}" method="POST" style="display: inline">
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
