@extends('partials.appex')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card">
                <div class="card-body p-5 mx-5">
                        {!! Form::open(['action' => 'ComplaintsController@store', 'method' => 'POST', 'class'=>'form-horizontal mx-auto']) !!}
                        {{csrf_field()}}
                    <div>
        
    
                            
                        <h4>Complaints</h4>
                    </div>
                    <div class="form-row">
                    <div class="form-group col">
                        <label for="p" class="bmd-label-floating">BloodPres</label>
                            {{Form::text('bP', '', ['id'=>'p','class' =>'form-control '])}}
                        <span class="bmd-help">Blood Pressure mmHg.</span>					
                    </div>
                    <div class="form-group col">
                        <label for="a" class="bmd-label-floating">PR</label>
                            {{Form::text('pR', '', ['id'=>'a','class' =>'form-control'])}}
                        <span class="bmd-help col">Pulse Per Min.</span>	  				
                    </div>
                    <div class="form-group col">
                            <label for="r" class="bmd-label-floating">RR</label>
                                {{Form::text('rR', '', ['id'=>'r','class' =>'form-control '])}}
                            <span class="bmd-help">RR min.</span>					
                   </div>
                   <div class="form-group col">
                        <label for="t" class="bmd-label-floating">Temparature</label>
                            {{Form::text('temp', '', ['id'=>'t','class' =>'form-control '])}}
                        <span class="bmd-help">Tempature Celsuis.</span>	  				
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="s" class="bmd-label-floating">Subjective Complain</label>
                            {{Form::textarea('s', '', ['id'=>'s','class' =>'form-control  '])}}
                        <span class="bmd-help">Input Subjective Complain</span>	  				
                    </div>
                    <div class="form-group">
                        <label for="o" class="bmd-label-floating">Objective Complain</label>
                            {{Form::textarea('o', '', ['id'=>'a','class' =>'form-control  '])}}	
                        <span class="bmd-help">Input Objective Complain</span>  				
                    </div>
                    <div class="form-group">
                        <label for="a" class="bmd-label-floating">Assessment</label>
                            {{Form::textarea('a', '', ['id'=>'a','class' =>'form-control  '])}}
                            <span class="bmd-help">Input Assessment</span>	  				
                    </div>
                    <div class="form-group">
                        <label for="p" class="bmd-label-floating">Planning</label>
                            {{Form::textarea('p', '', ['id'=>'p','class' =>'form-control  '])}}
                        <span class="bmd-help">Input Planning</span>	  				
                    </div>
                </div>
            </div>	

        </div>

        <div class="col-3">
            <div class="card" style="width: 15rem;">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight:600;">Add Complaints</h5>
                    <div class="row text-left">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2><span class="small pull-right">{{ $today }} | {{ $currenttime }}</span></h2>
                            </div>
                    </div>
                        <div class="form-group">
                                <p for="t" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label" style="font:weight:bold text-color:black;">Add To Patient &nbsp;<i class="fa fa-user-plus"></i></p>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-3">
                                    <select name="patient_id" id="t" class="js-example-basic-single form-control custom-select ">
                                        <option selected disabled hidden>Choose here</option>
                                        @foreach($patients as $patient)
                                    <option value="{{ $patient->id}}">{{$patient->studentId}}</option>
                                         @endforeach    
                                    </select>	
                                </div>
                                <div class="row form-group justify-content-center py-3">
                                        <a class="btn btn-primary" href="/patients"><i class="fa fa-arrow-left"></i>&nbsp;back</a>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Add</button>
                                </div>
                                <div class="row justify-content-center">
                                        <a class="btn btn-primary" href="/complaints"><i class="fa fa-bars"></i>&nbsp;See All Complaints</a>
                                </div>	  
                        </div>
           
                </div>   
            </div>
        </div>
            {!! Form::close() !!}
    </div>
</div>
@endsection


