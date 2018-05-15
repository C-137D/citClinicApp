@extends('partials.appex')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <div class="card">
                <div class="card-body p-5 mx-5">
                        <form class="form_horizontal mx-auto">
                    <div><h4>Note</h4></div>
                    <div class="form-group">
                        <label for="t" class="bmd-label-floating">Title</label>
                            {{Form::text('title', $note->title, ['id'=>'t','class' =>'form-control'])}}					
                    </div>
                    <div class="form-group">
                        <label for="a" class="bmd-label-floating">Body</label>
                            {{Form::textarea('body', $note->body, ['id'=>'a','class' =>'form-control'])}}	  				
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
                <p class="text-left" style="padding-left:30px;">{{$note->patient->studentId}}</p>
                </div>
                <div class="form-group"style="padding-left:26px;">
                    <p>Created at:</p>
                    <p class="text-left" style="padding-left:30px;">{{ date('M j, Y h:ia', strtotime($note->created_at)) }}</p>
                </div>
                <div class="form-group" style="padding-left:26px;">
                    <p>Updated at:</p>
                    <p  class="text-left" style="padding-left:30px;">{{ date('M j, Y h:ia', strtotime($note->updated_at)) }}</p>
                </div>

                <div class="row form-group justify-content-center py-3">
                                {{--  {!! Html::linkRoute('notes.edit', 'Edit', array($note->id), array('class' => 'btn btn-primary')) !!}                  --}}
                                <a class="btn btn-primary" href="/notes/{{$note->id}}/edit"><i class="fa fa-edit"></i>&nbsp;Edit</a>                                
                                <a class="btn btn-primary" href="/notes"><i class="fa fa-left-arrow"></i>&nbsp;back</a>
                                <a class="btn btn-primary" href="/notes"><i class="fa fa-bars"></i>&nbsp;See All Notes</a> 
                        
                </div>
           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

