@extends('partials.appex')

@section('title', 'Complaints | All')

@section('content')


<div class="container">
    <div class="row text-left">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Complaints <span class="small pull-right">{{ $today }} | {{ $currenttime }}</span></h2>
            
        </div>
    </div>


    <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "style="margin-top:30px;">
                <div class="small pull-right">
                    <a class="btn btn-primary" href="/complaints/create"><i class="fa fa-plus"></i>&nbsp;Add complaint</a>
                    @if(count($complaintsTrashed)>0)
                    <a class="btn btn-danger" href="/complaints/trashed"><i class="fa fa-trash"></i>&nbsp;Trash&nbsp;<span class="badge badge-danger">{{count($complaintsTrashed)}}</span></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="margin-top:30px;">
                    @if(count($complaints)>0)
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table_id">
                            <thead>
                              <tr>
                                <th scope="col">Student id</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Subjective</th>
                                <th scope="col">Objective</th>
                                <th scope="col">Assessment</th>
                                <th scope="col">Planning</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>      
                            <tbody >
                                  @foreach($complaints as $complaint)
                                <tr> 
                                      <td>{{$complaint->patient->studentId}}</td>
                                      <td>{{$complaint->patient->lName}},{{$complaint->patient->fName}}</td>
                                      <td>{{$complaint->s}}</td>
                                      <td>{{$complaint->o}}</td>
                                      <td>{{$complaint->a}}</td>
                                      <td>{{$complaint->p}}</td>
                                      <td style="width:290px">
                                          
                                            <form method="POST" class="delete_form pull-left"
                                            action="{{action('ComplaintsController@delete', $complaint['id'])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method"
                                                   value="DELETE"/>
                                                   <a  href="/complaints/{{$complaint->id}}" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;Show</a>  
                                                   <a class="btn btn-primary" href="/complaints/{{$complaint->id}}/edit"><i class="fa fa-edit"></i>&nbsp;Edit</a>
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
                <p class="text-center">Sorry, no complaints found, begin by creating a <a class="btn btn-primary" href="/complaints/create">new complaint.</a></p>
            @endif
    </div>
 
</div>
 
@stop


