@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assign Subject</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                <div class="col-4">
      @include('_message')
      </div>                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Class Name</label>
                                    <select class="form-control" name="class_id" required>
                                        <option value="">Class Name</option>
                                        @foreach($getClass as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Subject Name</label>
                                    @foreach($getSubject as $subject)
                                    <div>
                                        <label style="font-weight:normal">
                                            <input type="checkbox" value="{{$subject->id}}"
                                                name="subject_id[]">{{$subject->name}}
                                        </label>

                                    </div>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <select class="form-control" name="status" required>
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection