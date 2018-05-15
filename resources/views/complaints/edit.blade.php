@extends('partials.appex')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card">
                <div class="card-body p-5 mx-5">
                        {!! Form::open(['action' =>[ 'ComplaintsController@update', $complaint->id], 'method' => 'POST', 'class'=>'form-horizontal mx-auto']) !!}
                    <div><h4>Complaints</h4></div>
                    <div class="form-row justify-content-center">
                    <div class="form-group">
                        <label for="t" class="bmd-label-floating">Blood Pressure</label>
                            {{Form::text('bP', $complaint->bP, ['id'=>'t','class' =>'form-control col-lg-11'])}}
                        <span class="bmd-help">Blood Pressure mmHg.</span>					
                    </div>
                    <div class="form-group">
                        <label for="a" class="bmd-label-floating">PR</label>
                            {{Form::text('pR', $complaint->bP, ['id'=>'a','class' =>'form-control col-lg-11'])}}
                        <span class="bmd-help">Pulse Per Min.</span>	  				
                    </div>
                    <div class="form-group">
                            <label for="t" class="bmd-label-floating">RR</label>
                                {{Form::text('rR', $complaint->rR, ['id'=>'t','class' =>'form-control col-lg-11'])}}
                            <span class="bmd-help">RR min.</span>					
                   </div>
                   <div class="form-group">
                        <label for="a" class="bmd-label-floating">Temparature</label>
                            {{Form::text('temp', $complaint->temp, ['id'=>'a','class' =>'form-control col-lg-11'])}}
                        <span class="bmd-help">Tempature Celsuis.</span>	  				
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="s" class="bmd-label-floating">S</label>
                            {{Form::text('s', $complaint->s, ['id'=>'s','class' =>'form-control  col-lg-11'])}}	  				
                    </div>
                    <div class="form-group">
                        <label for="o" class="bmd-label-floating">o</label>
                            {{Form::text('o', $complaint->o, ['id'=>'a','class' =>'form-control  col-lg-11'])}}	  				
                    </div>
                    <div class="form-group">
                        <label for="a" class="bmd-label-floating">a</label>
                            {{Form::text('a', $complaint->a, ['id'=>'o','class' =>'form-control  col-lg-11'])}}	  				
                    </div>
                    <div class="form-group">
                        <label for="a" class="bmd-label-floating">p</label>
                            {{Form::text('p', $complaint->p, ['id'=>'p','class' =>'form-control col-lg-11'])}}	  				
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
                                        <option value="{{$complaint->patient->id}}" selected  hidden>{{$complaint->patient->studentId}}</option>
                                        @foreach($patients as $patient)
                                        <option value="{{ $patient->id}}">{{$patient->studentId}}</option>
                                         @endforeach    
                                    </select>	
                                </div>
                                {{ Form::hidden('_method', 'PUT')}}
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


