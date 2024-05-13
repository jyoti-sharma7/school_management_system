@extends('layouts.app')
@section('content')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student List (Total : {{ $getRecord->total() }} )</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
           <a href="{{url('admin/student/add')}}" class="btn btn-primary">Add New Student</a>
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
                <h6 class="card-title">Search Student</h6>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-3">
                    <label>First Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('name')}}"  name="name" placeholder="Enter First Name">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Last Name</label>
                    <input type="text" class="form-control" value="{{ Request::get('last_name')}}"  name="last_name" placeholder="Enter Last Name">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Roll Number</label>
                    <input type="text" class="form-control" value="{{ Request::get('roll_number')}}"  name="roll_number" placeholder="Enter Roll Number">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Email</label>
                    <input type="text" class="form-control"value="{{ Request::get('email')}}"  name="email" placeholder="Enter email">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Class</label>
                    <input type="text" class="form-control"value="{{ Request::get('class')}}"  name="class" placeholder="Enter class">
                  </div>
                  <div class="form-group col-md-3">
                    <button  type="submit" class="btn btn-info" style="margin-top:30px;">Search</button>
                    <a href="{{ url('admin/student/list')}}"  type="submit" class="btn btn-success" style="margin-top:30px;">Clear</a>

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
              <div class="card-body" style="overflow:auto;">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Admission Number</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Caste</th>
                      <th>Religion</th>
                      <th>Mobile Number</th>
                      <th>Admission Date</th>
                      <th>Blood Group</th>
                      <th>Height</th>
                      <th>Weight</th>
                      <th>Status</th>
                      <th>Created date</th>                 
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>
                      @if(!empty($value->getProfile()))
                      <img src="{{ $value->getProfile() }}" style="height:60px; width:60px; border-radius:50px;" >
                      @endif
                    </td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->last_name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->admission_number}}</td>
                    <td>{{$value->roll_number}}</td>
                    <td>{{$value->class_name}}</td>
                    <td>{{$value->gender}}</td>
                    <td>
                    @if(!empty($value->date_of_birth))
                    {{ date('d-m-Y',strtotime($value->date_of_birth))}}
                    @endif
                    </td>
                    <td>{{$value->caste}}</td>
                    <td>{{$value->religion}}</td>
                    <td>{{$value->mobile_number}}</td>
                    <td>
                    @if(!empty($value->admission_date))
                    {{ date('d-m-Y',strtotime($value->admission_date))}}
                    @endif
                    </td>
                    <td>{{$value->blood_group}}</td>
                    <td>{{$value->height}}</td>
                    <td>{{$value->weight}}</td>
                    <td>{{($value->status == 0)? 'Active': 'Inactive' }}</td>









   

                    <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                    <td><a href="{{url('admin/student/edit',$value->id)}}" class="btn btn-info">Edit</a></td>
                    <td><a href="{{url('admin/student/delete',$value->id)}}"class="btn btn-danger">Delete</a></td>
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