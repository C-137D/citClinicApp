@extends('partials.appex')

@section('title', 'Patients | All')

@section('content')


<div class="container">
    <div class="row text-left">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Patients <span class="small pull-right">{{ $today }} | {{ $currenttime }}</span></h2>
        </div>
    </div>


    <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "style="margin-top:30px;">
                <div class="small pull-right">
                    <a class="btn btn-primary" href="/patients/create"><i class="fa fa-plus"></i>&nbsp;New Paitent</a>
                    @if(count($patientsTrashed)>0)
                    <a class="btn btn-danger" href="/patients/trashed"><i class="fa fa-trash"></i>&nbsp;Trash&nbsp;<span class="badge badge-danger">{{count($patientsTrashed)}}</span></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="margin-top:30px;">
                    @if(count($patients)>0)
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
                                  @foreach($patients as $patient)
                                <tr>
                                      <td>{{$patient->studentId}}</td>
                                      <td>{{$patient->lName}},&nbsp;{{$patient->fName}}&nbsp;{{$patient->mName}}</td>
                                      <td>{{$patient->course}}</td>
                                      <td>{{$patient->year}}</td>
                                      <td>{{$patient->sex}}</td>
                                      <td style="width:290px">
                                            <form method="POST" class="delete_form pull-left"
                                            action="{{action('PatientsController@delete', $patient['id'])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method"
                                                   value="DELETE"/>
                                                   <a href="/patients/{{$patient->id}}" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;Show</a>  
                                                   <a class="btn btn-primary"  href="/patients/{{$patient->id}}/edit"><i class="fa fa-edit"></i>&nbsp;Edit</a>
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
                <p class="text-center">Sorry, no  patients found, begin by creating a <a class="btn btn-primary" href="/patients/create">new patient.</a></p>
            @endif
    </div>
 
</div>




 
@stop


