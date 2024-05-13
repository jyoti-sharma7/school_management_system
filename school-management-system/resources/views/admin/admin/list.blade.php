@extends('layouts.app')
@section('content')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin List (Total : {{ $getRecord->total() }} )</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
           <a href="{{url('admin/admin/add')}}" class="btn btn-primary">Add New Admin</a>
      </div>
        </div>
       
      </div><!-- /.container-fluid -->
    </section>
    </section>
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
      
      <div class="col-4">
      @include('_message')
      </div>            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h6 class="card-title">Search Admin</h6>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-3">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('name')}}"  name="name" placeholder="Enter Name">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Email</label>
                    <input type="text" class="form-control"value="{{ Request::get('email')}}"  name="email" placeholder="Enter email">
                  </div>
                  <div class="form-group col-md-3">
                    <button  type="submit" class="btn btn-info" style="margin-top:30px;">Search</button>
                    <a href="{{ url('admin/admin/list')}}"  type="submit" class="btn btn-success" style="margin-top:30px;">Clear</a>

                     </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            <!-- /.card -->

</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                     
                      <th>Created date</th>
                 
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                    <td><a href="{{url('admin/admin/edit',$value->id)}}" class="btn btn-info">Edit</a></td>
                    <td><a href="{{url('admin/admin/delete',$value->id)}}"class="btn btn-danger">Delete</a></td>
                  </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding:10px; float:right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                </div>
              </div>
              <!-- /.card-body -->
          
            </div>
            <!-- /.card -->

            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection