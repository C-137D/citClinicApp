@extends('partials.appex')

@section('title', 'Trash Patients | All')

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
                    <a class="btn btn-primary" href="/patients"><i class="fa fa-plus"></i>&nbsp;Back to Patients</a>
                    @if(count($patientsTrashed)>0)
                    <a class="btn btn-success" href="/patients/restoreall"><i class="fa fa-check"></i>&nbsp;Restore All&nbsp;<span class="badge badge-success">{{count($patientsTrashed)}}</span></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="margin-top:30px;">
                    @if(count($patientsTrashed)>0)
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table_id">
                            <thead>
                              <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Course</th>
                                <th scope="col">Year</th>
                                <th scope="col">Sex</th>
                                <th scope="col">Action</th>
                    
                              </tr>
                            </thead>      
                            <tbody>
                                  @foreach($patientsTrashed as $patient)
                                <tr>
                                      <td>{{$patient->studentId}}</td>
                                      <td>{{$patient->lName}},&nbsp;{{$patient->fName}}&nbsp;{{$patient->mName}}</td>
                                      <td>{{$patient->course}}</td>
                                      <td>{{$patient->year}}</td>
                                      <td>{{$patient->sex}}</td>
                                      <td class="form-row">
                                            <ol class="list-inline">
                                                <li class="list-inline-item">
                                                   {!! Form::open(['action' =>[ 'PatientsController@restore',$patient->id], 'method' => 'DELETE']) !!}
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Restore</button>
                                                   {!! Form::close() !!} 
                                                </li>
                                                <li class="list-inline-item">
                                                   {!! Form::open(['action' =>[ 'PatientsController@deleteforever',$patient->id], 'method' => 'DELETE']) !!}
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
                <p class="text-center">Sorry, no  patients found, begin by creating a <a class="btn btn-primary" href="/patients/create">new patient.</a></p>
            @endif
    </div>
 
</div>




 
@stop


