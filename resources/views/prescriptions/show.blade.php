@extends('partials.appex')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card">
                <div class="card-body p-5 mx-5">
                        <form class="form_horizontal mx-auto">
                    <div><h4>Prescription</h4></div>
                    <div class="form-group">
                            <label for="t" class="bmd-label-floating">Drug</label>
                                {{Form::text('drug', $prescription->drug, ['id'=>'t','class' =>'form-control'])}}	    				
                        </div>
                        <div class="form-group">
                            <label for="a" class="bmd-label-floating">Note</label>
                                {{Form::textarea('note', $prescription->note, ['id'=>'a','class' =>'form-control'])}}	  				
                        </div>
                        <div class="form-group">
                            <label for="a" class="bmd-label-floating">Quantity</label>
                                {{Form::text('quantity', $prescription->quantity, ['id'=>'a','class' =>'form-control'])}}	  				
                        </div>
                        <div class="form-group">
                            <select name="refill" class="custom-select   col-lg-6">
                                    <option selected hidden>{{$prescription->refill}}</option>
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>       
                                  </select> 				
                        </div>
                </form>
                </div>
            </div>	

        </div>

        <div class="col-3">
            <div class="card">
                <div class="card-body form-control">
                <div class="form-group"style="padding-left:26px;">
                    <p>Student Id:</p>
                <p class="text-left" style="padding-left:30px;">{{$prescription->patient->studentId}}</p>
                </div>
                <div class="form-group"style="padding-left:26px;">
                    <p>Created at:</p>
                    <p class="text-left" style="padding-left:30px;">{{ date('M j, Y h:ia', strtotime($prescription->created_at)) }}</p>
                </div>
                <div class="form-group" style="padding-left:26px;">
                    <p>Updated at:</p>
                    <p  class="text-left" style="padding-left:30px;">{{ date('M j, Y h:ia', strtotime($prescription->updated_at)) }}</p>
                </div>

                <div class="row form-group justify-content-center py-3">
                                {{--  {!! Html::linkRoute('notes.edit', 'Edit', array($note->id), array('class' => 'btn btn-primary')) !!}                  --}}
                                <a class="btn btn-primary" href="/notes/{{$prescription->id}}/edit"><i class="fa fa-edit"></i>&nbsp;Edit</a>                                
                                <a class="btn btn-primary" href="/notes"><i class="fa fa-left-arrow"></i>&nbsp;back</a>
                                <a class="btn btn-primary" href="/notes"><i class="fa fa-bars"></i>&nbsp;See All Notes</a> 
                        
                </div>
           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

