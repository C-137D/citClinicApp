@extends('partials.appex')

@section('content')

<div class="container">
<div class="row">
<div class="col-3">
<div class="card" style="width: 15rem;">
<img class="profile-userpic img   rounded-circle mx-auto my-3" height="175px" width="175px "   src="/storage/pic/{{$patient->pic}}">
  <div class="card-body">
  <h5 class="card-title">Profile</h5>	  
  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
  <a class="nav-link" id="v-pills-complaints-tab" data-toggle="pill" href="#v-pills-complaints" role="tab" aria-controls="v-pills-complaints" aria-selected="false">Complaints</a>
  <a class="nav-link" id="v-pills-prescriptions-tab" data-toggle="pill" href="#v-pills-prescriptions" role="tab" aria-controls="v-pills-prescriptions" aria-selected="false">Prescriptions</a>

</div>
  </div>
</div>
</div>



{{--  TABCONTENT  --}}
<div class="col-9">
<div class="card">
  <div class="card-body">
    <div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
	<div class="container py-4">
		<h5 class="card-title font-weight-bold">Profile</h5>
	<a class="btn btn-primary" style="float:right;" href="/patients/{{$patient->id}}/edit">
				Edit
		</a>
			<form class="form-horizontal col-lg-10 mx-auto">
					<div><h4>Student info</h4></div>
                    <div class="form-group">
                        <label for="s" class="bmd-label-floating">Student Id</label>
                        {{Form::text('studentId', $patient->studentId, ['id'=>'s','class' =>'form-control'])}}
                        <span class="bmd-help">Ex. 2011-7234</span>							
                    </div>
                    <div class="form-row">
                    <div class="form-group col">
                        <label for="l" class="bmd-label-floating">Last Name</label>
                        {{Form::text('lName', $patient->lName, ['id'=>'l','class' =>'form-control '])}}	
                    </div>   	    
                    <div class="form-group col-lg-5">
                        <label for="f" class="bmd-label-floating">First Name</label>
                        {{Form::text('fName', $patient->fName, ['id'=>'f','class' =>'form-control '])}}							
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="m" class="bmd-label-floating">Middle Initial</label>
                        {{Form::text('mName', $patient->mName, ['id'=>'m','class' =>'form-control'])}}							
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col">
                        <label for="c" class="bmd-label-floating">Course</label>
                        {{Form::text('course', $patient->course, ['id'=>'c','class' =>'form-control'])}}							
                    </div>
                    <div class="form-group col">
                        <label for="y" class="bmd-label-floating">Year</label>
                            {{Form::text('year', $patient->year, ['id'=>'y','class' =>'form-control'])}}							
                    </div>
                    <div class="form-group col">
                        <label for="a" class="bmd-label-floating">Age</label>
                            {{Form::text('age', $patient->age, ['id'=>'a','class' =>'form-control'])}}							
                    </div>
                    <div class="form-group col">
                        <label for="d" class="bmd-label-floating">Date of Birth</label>
                        {{Form::text('bod', $patient->bod, ['id'=>'d','class' =>'form-control datepicker'])}}							
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col">
                            <select name="sex" class="form-control custom-select">
                                <option value="" selected hidden class="text-center graycolor" >{{$patient->sex}}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">other</option>
                            </select>
                        </div> 
                    <div class="form-group col">
                        <select name="status"class="form-control custom-select ">
                            <option value="" selected hidden class="text-center graycolor">{{$patient->status}}</option>
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
                        {{Form::text('height', $patient->height, ['id'=>'h','class' =>'form-control '])}}							
                    </div>
                    <div class="form-group col">
                        <label for="w" class="bmd-label-floating">Weight</label>
                            {{Form::text('weight', $patient->weight, ['id'=>'w','class' =>'form-control '])}}							
                    </div>
                    
                    <div class="form-group col">
                        <label for="b" class="bmd-label-floating">Blood Type</label>
                            {{Form::text('bloodType', $patient->bloodType, ['id'=>'b','class' =>'form-control '])}}							
                    </div>
                    </div>
                    <br>
                    <div><h4>Address:</h4></div>
                    <div class="form-group ">
                        <label for="a" class="bmd-label-floating">Address</label>
                            {{Form::text('address', $patient->address, ['id'=>'a','class' =>'form-control'])}}							
                    </div>
                    <div class="form-group">
                        <label for="c" class="bmd-label-floating">Landline/Mobile No.</label>
                        {{Form::text('mobileNo', $patient->mobileNo, ['id'=>'c','class' =>'form-control'])}}							
                    </div>	
                    <br>
                    <div><h4>In Case of  Emergency</h4></div>
                    <div class="form-group">
                        <label for="g" class="bmd-label-floating">Contact Person</label>
                        {{Form::text('contactPerson', $patient->contactPerson, ['id'=>'g','class' =>'form-control'])}}							
                    </div>
                    <div class="form-row">
                    <div class="form-group">
                        <label for="r" class="bmd-label-floating">Relation</label>
                        {{Form::text('relation', $patient->relation, ['id'=>'r','class' =>'form-control'])}}							
                    </div>
                    <div class="form-group col">
                        <label for="p" class="bmd-label-floating">Address</label>
                            {{Form::text('addressEm', $patient->addressEm, ['id'=>'p','class' =>'form-control'])}}							
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="w" class="bmd-label-floating">Landline/Mobile No.</label>
                            {{Form::text('landLine', $patient->landLine, ['id'=>'w','class' =>'form-control'])}}							
                    </div>
                    <div class="row justify-content-center">
                    <a class="btn btn-primary" href="/patients"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                    </div>
				</form>
	</div>  
	</div>
	
  <div class="tab-pane fade" id="v-pills-complaints" role="tabpanel" aria-labelledby="v-pills-complaints-tab">
		

	</div>
	<div class="tab-pane fade" id="v-pills-prescriptions" role="tabpanel" aria-labelledby="v-pills-prescriptions-tab"><h5 class="card-title">Prescriptions</h5>
		<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="margin-top:30px;">
								<div class="table-responsive">
								<table class="table table-striped table-bordered" cellspacing="0" width="100%"	 id="table">
												<thead>
													<tr>
														<th scope="col">Drug</th>
														<th scope="col">quantity</th>
														<th scope="col">Note</th>
														<th scope="col">Refill</th>
														<th scope="col">Action</th>
													</tr>
												</thead>      
												<tbody>
															@foreach($patient->prescription as $pat)
														<tr>
																	<td>{{$pat->drug}}</td>
																	<td>{{$pat->quantity}}</td>
																	<td>{{$pat->note}}</td>
																	<td>{{$pat->refill}}</td>
																	<td><a  href="/prescriptions/{{$pat->id}}" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;Show</a></td>				
													</tr>
															@endforeach
												</tbody>
											</table>
								</div> 	
						</div>
</div>

	</div> 


</div>
</div>	
</div>
</div>



</div>
</div>
@stop

