@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Parent</h1>
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
                <div class="col-md-12">
                    @include('_message')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h5 class="card-title"> Edit Parent Form</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>First Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{old('name', $getRecord->name)}}" required name="name"
                                            placeholder="Enter First Name">
                                        <div style="color:red">{{$errors->first('name')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Last Name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{old('last_name', $getRecord->last_name)}}" required
                                            name="last_name" placeholder="Enter Last Name">
                                        <div style="color:red">{{$errors->first('last_name')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Gender <span style="color:red;">*</span></label>
                                        <select class="form-control" required name="gender">
                                            <option value="">Select Gender</option>
                                            <option {{ (old('gender', $getRecord->gender) == 'Male') ? 'selected' : ''}}
                                                value="Male">Male</option>
                                            <option
                                                {{ (old('gender', $getRecord->gender) == 'Female') ? 'selected' : '' }}
                                                value="Female">Female</option>
                                            <option
                                                {{ (old('gender', $getRecord->gender) == 'Others') ? 'selected' : '' }}
                                                value="Others">Others</option>
                                        </select>
                                        <div style="color:red">{{$errors->first('gender')}}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Mobile Number <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="mobile_number" 
                                            value="{{old('mobile_number', $getRecord->last_name)}}" required
                                            placeholder="Enter Moibile Number">
                                        <div style="color:red">{{$errors->first('mobile_number')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Occupation</label>
                                        <input type="text" class="form-control"
                                            value="{{old('occupation', $getRecord->occupation)}}" name="occupation"
                                            placeholder="Enter Occupation">
                                        <div style="color:red">{{$errors->first('occupation')}}</div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Profile Photo </span></label>
                                        <input type="file" class="form-control"  name="profile_pic">
                                        <div style="color:red">{{$errors->first('profile_pic')}}</div>
                                        @if(!empty($getRecord->getProfile()))

                                        <img src="{{$getRecord->getProfile() }}" style="width:100px;">

                                        @endif

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Address<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" required
                                            value="{{old('address', $getRecord->address)}}" name="address"
                                            placeholder="Enter Address">
                                        <div style="color:red">{{$errors->first('address')}}</div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Status <span style="color:red;">*</span></label>
                                        <select class="form-control" required name="status">
                                            <option value="">Select status</option>
                                            <option {{ (old('status', $getRecord->status) == 0 )? 'selected' : ''}}
                                                value="0">Active</option>
                                            <option {{ (old('status', $getRecord->status) == 1 )? 'selected' : ''}}
                                                value="1">Inactive</option>
                                        </select>
                                        <div style="color:red">{{$errors->first('status')}}</div>

                                    </div>
                                    <hr />

                                    <div class="form-group col-md-12">
                                        <label>Email address<span style="color:red;">*</span></label>
                                        <input type="email" class="form-control" required
                                            value="{{old('email', $getRecord->email)}}" name="email"
                                            placeholder="Enter email">
                                        <div style="color:red">{{$errors->first('email')}}</div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="Password">
                                        <p>Do you want to change password ? then please add new password.</p>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{url('admin/parent/list')}}" class="btn btn-danger">Cancel</a>

                                </div>
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