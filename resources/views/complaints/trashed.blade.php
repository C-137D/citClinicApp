@extends('partials.appex')

@section('title', 'Trash Complaint | All')

@section('content')


<div class="container">
    <div class="row text-left">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Trash</h2>
        </div>
    </div>


    <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "style="margin-top:30px;">
                <div class="small pull-right">
                    <a class="btn btn-primary" href="/complaints"><i class="fa fa-plus"></i>&nbsp;Back to Complaints</a>
                    @if(count($complaintsTrashed)>0)
                    <a class="btn btn-success" href="/complaints/restoreall"><i class="fa fa-check"></i>&nbsp;Restore All&nbsp;<span class="badge badge-success">{{count($complaintsTrashed)}}</span></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="margin-top:30px;">
                    @if(count($complaintsTrashed)>0)
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table_id">
                            <thead>
                              <tr>
                                <th scope="col">Blood Pressure</th>
                                <th scope="col">Pulse Per Min</th>
                                <th scope="col">RR</th>
                                <th scope="col">Temparature</th>
                                <th scope="col">Subjective Complaint</th>
                                <th scope="col">Objective Complaint</th>
                                <th scope="col">Assessment</th>
                                <th scope="col">Planning</th>
                                <th scope="col">Action</th>
                                
                    
                              </tr>
                            </thead>      
                            <tbody>
                                  @foreach($complaintsTrashed as $complaint)
                                <tr>
                                      <td>{{$complaint->bP}}</td>
                                      <td>{{$complaint->pR}}</td>
                                      <td>{{$complaint->rR}}</td>
                                      <td>{{$complaint->temp}}</td>
                                      <td>{{$complaint->s}}</td>
                                      <td>{{$complaint->o}}</td>
                                      <td>{{$complaint->a}}</td>
                                      <td>{{$complaint->p}}</td>
                                      <td class="form-row">
                                            <ol class="list-inline">
                                                <li class="list-inline-item">
                                                   {!! Form::open(['action' =>[ 'ComplaintsController@restore',$complaint->id], 'method' => 'DELETE']) !!}
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Restore</button>
                                                   {!! Form::close() !!} 
                                                </li>
                                                <li class="list-inline-item">
                                                   {!! Form::open(['action' =>[ 'ComplaintsController@deleteforever',$complaint->id], 'method' => 'DELETE']) !!}
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                   {!! Form::close() !!} 
                                                </li>
                                          </ol>
                                        </td>
                    
                                       
                                    
                                  </tr>
                                  @endforeach
                            </tbody>
                          </table>
                    </div> 	
                </div>
            @else
            @endif
    </div>
 
</div>




 
@stop


