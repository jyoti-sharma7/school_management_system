@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Subject</h1>
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
      </div>            <!-- general form elements -->
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
                    <label>Subject Name</label>
                    <input type="text" class="form-control"  value="{{$getRecord->name}}" name="name" placeholder="Subject Name">
                  </div>
                  <div class="form-group">
                    <label>Subject Type</label>
                    <select class="form-control" name="type">
                    <option>Select Type</option>
                        <option {{($getRecord->type=='Theory') ? 'selected' : ''}} value="Theory">Theory</option>
                        <option {{($getRecord->type=='Practical') ? 'selected' : ''}} value="Practical" >Practical</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <select class="form-control" name="status">
                        <option {{($getRecord->status==0) ? 'selected' : ''}} value="0">Active</option>
                        <option {{($getRecord->status==1) ? 'selected' : ''}} value="1">Inactive</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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