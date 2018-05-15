@extends('partials.appex')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card">
                <div class="card-body p-5 mx-5">
                        {!! Form::open([ 'action' => ['NotesController@update', $note->id], 'method' => 'POST', 'class'=>'form-horizontal mx-auto']) !!}
                    <div><h4>Note</h4></div>
                    <div class="form-group">
                        <label for="t" class="bmd-label-floating">Title</label>
                            {{Form::text('title', $note->title, ['id'=>'t','class' =>'form-control'])}}					
                    </div>
                    <div class="form-group">
                        <label for="a" class="bmd-label-floating">Body</label>
                            {{Form::textarea('body', $note->body, ['id'=>'a','class' =>'form-control'])}}	  				
                    </div>
    
                </div>
            </div>	

        </div>

        <div class="col-3">
            <div class="card" style="width: 15rem;">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight:600;">Edit Note</h5>
                    <div class="row text-left">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2><span class="small pull-right">{{ $today }} | {{ $currenttime }}</span></h2>
                            </div>
                    </div>
                        <div class="form-group">
                                <label for="t" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label" style="font:weight:bold text-color:black;">Add To Patient &nbsp;<i class="fa fa-user-plus"></i></label>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-3">
                                    <select name="patient_id" id="t" class="js-example-basic-single form-control">
                                    <option value="{{$note->patient->id}}" selected  hidden>{{$note->patient->studentId}}</option>
                                        @foreach($patients as $patient)
                                    <option value="{{ $patient->id}}">{{$patient->studentId}}</option>
                                         @endforeach    
                                    </select>	
                                </div>
                                {{ Form::hidden('_method', 'PUT')}}
                                <div class="row form-group justify-content-center py-3">
                                        <a class="btn btn-primary" href="/notes"><i class="fa fa-arrow-left"></i>&nbsp;back</a>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Edit</button>
                                </div>
                                <div class="row justify-content-center">
                                        <a class="btn btn-primary" href="/notes"><i class="fa fa-bars"></i>&nbsp;See All Notes</a>
                                </div>	  
                        </div>
           
                </div>   
            </div>
        </div>
            {!! Form::close() !!}
    </div>
</div>
@endsection

