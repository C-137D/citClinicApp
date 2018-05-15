@extends('partials.appex')

@section('title', 'Notes | All')

@section('content')


<div class="container">
    <div class="row text-left">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Notes <span class="small pull-right">{{ $today }} | {{ $currenttime }}</span></h2>
        </div>
    </div>


    <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "style="margin-top:30px;">
                <div class="small pull-right">
                    <a class="btn btn-primary" href="/notes/create"><i class="fa fa-plus"></i>&nbsp;Add Note</a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="margin-top:30px;">
                    @if(count($notes)>0)
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table_id">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student id</th>
                                <th scope="col">Note Belong To</th>
                                <th scope="col">title</th>
                                <th scope="col">body</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>      
                            <tbody >
                                  @foreach($notes as $note)
                                <tr>
                                      <td>{{$note->id}}</td> 
                                      <td>{{$note->patient->studentId}}</td>
                                      <td>{{$note->patient->lName}},{{$note->patient->fName}}</td>
                                      <td>{{$note->title}}</td>
                                      <td>{{$note->body}}</td>
                                      <td style="width:290px">
                                          
                                            <form method="POST" class="delete_form pull-left"
                                            action="{{action('NotesController@destroy', $note['id'])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method"
                                                   value="DELETE"/>
                                                   <a  href="/notes/{{$note->id}}" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;Show</a>  
                                                   <a class="btn btn-primary" href="/notes/{{$note->id}}/edit"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                                   <button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i>&nbsp;Delete</button> 
                                            </form> 
                                                   
                                    </td>
                    
                                       
                                    
                                  </tr>
                                  @endforeach
                            </tbody>
                          </table>
                    </div> 	
                </div>
            @else
                <p class="text-center">Sorry, no notes found, begin by creating a <a class="btn btn-primary" href="/notes/create">new notes.</a></p>
            @endif
    </div>
 
</div>
 
@stop


