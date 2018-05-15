@extends('partials.appex')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card">
                <div class="card-body p-5 mx-5">
                        {!! Form::open(['action' => 'PatientsController@store', 'method' => 'POST', 'class'=>'form-horizontal mx-auto','enctype'=>'multipart/form-data']) !!}
                    <div><h4>Student info</h4></div>
                    <div class="form-group">
                        <label for="s" class="bmd-label-floating">Student Id</label>
                        {{Form::text('studentId', '', ['id'=>'s','class' =>'form-control'])}}
                        <span class="bmd-help">Ex. 2011-7234</span>							
                    </div>
                    <div class="form-group">
                            {{Form::label('pic', 'Add Profile Pic')}}
                        {{Form::file('pic',  ['class' =>'form-control'])}}							
                    </div>
                    <div class="form-row">
                    <div class="form-group col">
                        <label for="l" class="bmd-label-floating">Last Name</label>
                        {{Form::text('lName', '', ['id'=>'l','class' =>'form-control '])}}	
                    </div>   	    
                    <div class="form-group col-lg-5">
                        <label for="f" class="bmd-label-floating">First Name</label>
                        {{Form::text('fName', '', ['id'=>'f','class' =>'form-control '])}}							
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="m" class="bmd-label-floating">Middle Initial</label>
                        {{Form::text('mName', '', ['id'=>'m','class' =>'form-control'])}}							
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col">
                        <label for="c" class="bmd-label-floating">Course</label>
                        {{Form::text('course', '', ['id'=>'c','class' =>'form-control'])}}							
                    </div>
                    <div class="form-group col">
                        <label for="y" class="bmd-label-floating">Year</label>
                            {{Form::text('year', '', ['id'=>'y','class' =>'form-control'])}}							
                    </div>
                    <div class="form-group col">
                        <label for="a" class="bmd-label-floating">Age</label>
                            {{Form::text('age', '', ['id'=>'a','class' =>'form-control'])}}							
                    </div>
                    <div class="form-group col">
                        <label for="d" class="bmd-label-floating">Date of Birth</label>
                        {{Form::text('bod', '', ['id'=>'d','class' =>'form-control datepicker'])}}							
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col">
                            <select name="sex" class="form-control custom-select">
                                <option value="" selected hidden class="text-center graycolor" >Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">other</option>
                            </select>
                        </div> 
                    <div class="form-group col">
                        <select name="status"class="form-control custom-select ">
                            <option value="" selected hidden class="text-center graycolor">Status</option>
                            <option value="Single">Single</option>
                            <option value="Divorce">Divorced</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Married">Married</option>
                        </select>						
                    </div>
                    </div>
                    <div class="form-row">
                    
                    <div class="form-group col">
                        <label for="h" class="bmd-label-floating">Height</label>
                        {{Form::text('height', '', ['id'=>'h','class' =>'form-control '])}}							
                    </div>
                    <div class="form-group col">
                        <label for="w" class="bmd-label-floating">Weight</label>
                            {{Form::text('weight', '', ['id'=>'w','class' =>'form-control '])}}							
                    </div>
                    
                    <div class="form-group col">
                        <label for="b" class="bmd-label-floating">Blood Type</label>
                            {{Form::text('bloodType', '', ['id'=>'b','class' =>'form-control '])}}							
                    </div>
                    </div>
                    <br>
                    <div><h4>Address:</h4></div>
                    <div class="form-group ">
                        <label for="a" class="bmd-label-floating">Address</label>
                            {{Form::text('address', '', ['id'=>'a','class' =>'form-control'])}}							
                    </div>
                    <div class="form-group">
                        <label for="c" class="bmd-label-floating">Landline/Mobile No.</label>
                        {{Form::text('mobileNo', '', ['id'=>'c','class' =>'form-control'])}}							
                    </div>	
                    <br>
                    <div><h4>In Case of  Emergency</h4></div>
                    <div class="form-group">
                        <label for="g" class="bmd-label-floating">Contact Person</label>
                        {{Form::text('contactPerson', '', ['id'=>'g','class' =>'form-control'])}}							
                    </div>
                    <div class="form-row">
                    <div class="form-group">
                        <label for="r" class="bmd-label-floating">Relation</label>
                        {{Form::text('relation', '', ['id'=>'r','class' =>'form-control'])}}							
                    </div>
                    <div class="form-group col">
                        <label for="p" class="bmd-label-floating">Address</label>
                            {{Form::text('addressEm', '', ['id'=>'p','class' =>'form-control'])}}							
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="w" class="bmd-label-floating">Landline/Mobile No.</label>
                            {{Form::text('landLine', '', ['id'=>'w','class' =>'form-control'])}}							
                    </div>
                    <div class="row justify-content-center">
                    <a class="btn btn-primary" href="/patients"><i class="fa fa-arrow-left"></i>&nbsp;back</a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Add</button>
                    </div>
                    {!! Form::close() !!}
                 
                </div>
            </div>	

        </div>

    </div>
</div>
@endsection

