@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Student</h1>
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
                            <h5 class="card-title"> Update Student Form</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>First Name<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" value="{{old('name',$getRecord->name)}}"
                                            name="name" placeholder="Enter First Name">
                                        <div style="color:red">{{$errors->first('name')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Last Name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{old('last_name',$getRecord->last_name)}}" name="last_name"
                                            placeholder="Enter Last Name">
                                        <div style="color:red">{{$errors->first('last_name')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Admission Number<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{old('admission_number',$getRecord->admission_number)}}"
                                            name="admission_number" placeholder="Enter Admission Number">
                                        <div style="color:red">{{$errors->first('admission_number')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Roll Number <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="roll_number"
                                            value="{{old('roll_number',$getRecord->roll_number)}}"
                                            placeholder="Enter Roll Number">
                                        <div style="color:red">{{$errors->first('roll_number')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Class <span style="color:red;">*</span></label>
                                        <select class="form-control" name="class_id">
                                            <option value="">Select Class</option>
                                            @foreach($getClass as $value)
                                            <option
                                                {{ (old('class_id', $getRecord->class_id) == $value->id) ? 'selected' : '' }}
                                                value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        <div style="color:red">{{$errors->first('class_id')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Gender <span style="color:red;">*</span></label>
                                        <select class="form-control" name="gender">
                                            <option value="">Select Gender</option>
                                            <option {{ (old('gender' ,$getRecord->gender)== 'Male')? 'selected' : ''}}
                                                value="Male">Male</option>
                                            <option
                                                {{ (old('gender', $getRecord->gender) == 'Female') ? 'selected' : '' }}
                                                value="Female">Female</option>
                                            <option
                                                {{ (old('gender' ,$getRecord->gender) == 'Others') ? 'selected' : '' }}
                                                value="Others">Others</option>
                                        </select>
                                        <div style="color:red">{{$errors->first('gender')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Date of Birth <span style="color:red;">*</span></label>
                                        <input type="date" class="form-control"
                                            value="{{old('date_of_birth',$getRecord->date_of_birth)}}"
                                            name="date_of_birth">
                                        <div style="color:red">{{$errors->first('date_of_birth')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Caste <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{old('caste',$getRecord->caste)}}" name="caste"
                                            placeholder="Enter Caste">
                                        <div style="color:red">{{$errors->first('caste')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Religion </label>
                                        <input type="text" class="form-control" name="religion"
                                            value="{{old('religion',$getRecord->religion)}}"
                                            placeholder="Enter Religion">
                                        <div style="color:red">{{$errors->first('religion')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Mobile Number <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="mobile_number"
                                            value="{{old('mobile_number',$getRecord->mobile_number)}}"
                                            placeholder="Enter Moibile Number">
                                        <div style="color:red">{{$errors->first('mobile_number')}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Admission Date<span style="color:red;">*</span></label>
                                        <input type="date" class="form-control"
                                            value="{{old('admission_date',$getRecord->admission_date)}}"
                                            name="admission_date">
                                        <div style="color:red">{{$errors->first('admission_date')}}</div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Profile Photo <span style="color:red;">*</span></label>
                                        <input type="file" class="form-control" name="profile_pic">
                                        <div style="color:red">{{$errors->first('profile_pic')}}</div>
                                        @if(!empty($getRecord->getProfile()))
                                        
                                            <img src="{{$getRecord->getProfile() }}" style="width:100px;">
                                        
                                        @endif

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Blood Group</label>
                                        <input type="text" class="form-control"
                                            value="{{ old('blood_group', $getRecord->blood_group) }}" name="blood_group"
                                            placeholder="Enter Blood Group">
                                        <div style="color:red">{{ $errors->first('blood_group') }}</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Height</label>
                                        <input type="text" class="form-control"
                                            value="{{old('height',$getRecord->height)}}" name="height"
                                            placeholder="Enter Height">
                                        <div style="color:red">{{$errors->first('height')}}</div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Weight</label>
                                        <input type="text" class="form-control"
                                            value="{{old('weight',$getRecord->weight)}}" name="weight"
                                            placeholder="Enter Weight">
                                        <div style="color:red">{{$errors->first('weight')}}</div>

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
                                        <input type="email" class="form-control"
                                            value="{{old('email',$getRecord->email)}}" name="email"
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