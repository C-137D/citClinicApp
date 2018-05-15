@extends('partials.appex')

@section('title', 'Patients | All')

@section('content')


<div class="container">
    <div class="row text-left">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Prescriptions <span class="small pull-right">{{ $today }} | {{ $currenttime }}</span></h2>
        </div>
    </div>


    <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "style="margin-top:30px;">
                <div class="small pull-right">
                    <a class="btn btn-primary" href="/prescriptions/create"><i class="fa fa-plus"></i>&nbsp;Add Prescription</a>
                    @if(count($prescriptionsTrashed)>0)
                    <a class="btn btn-danger" href="/prescriptions/trashed"><i class="fa fa-trash"></i>&nbsp;Trash&nbsp;<span class="badge badge-danger">{{count($prescriptionsTrashed)}}</span></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="margin-top:30px;">
                    @if(count($prescriptions)>0)
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table_id">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student id</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Type of Drug</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Note</th>
                                <th scope="col">refill status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>      
                            <tbody >
                                  @foreach($prescriptions as $prescription)
                                <tr>
                                      <td>{{$prescription->id}}</td> 
                                      <td>{{$prescription->patient->studentId}}</td>
                                      <td>{{$prescription->patient->lName}},{{$prescription->patient->fName}}</td>
                                      <td>{{$prescription->drug}}</td>
                                      <td>{{$prescription->quantity}}</td>
                                      <td>{{$prescription->note}}</td>
                                      <td>{{$prescription->refill}}</td>
                                      <td style="width:290px">
                                          
                                            <form method="POST" class="delete_form pull-left"
                                            action="{{action('PrescriptionsController@delete', $prescription['id'])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method"
                                                   value="DELETE"/>
                                                   <a  href="/prescriptions/{{$prescription->id}}" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;Show</a>  
                                                   <a class="btn btn-primary" href="/prescriptions/{{$prescription->id}}/edit"><i class="fa fa-edit"></i>&nbsp;Edit</a>
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
                <p class="text-center">Sorry, no Prescriptions found, begin by creating a <a class="btn btn-primary" href="/prescriptions/create">new prescriptions.</a></p>
            @endif
    </div>
 
</div>
 
@stop


