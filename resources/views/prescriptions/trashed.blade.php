@extends('partials.appex')

@section('title', 'Trash Prescription | All')

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
                    <a class="btn btn-primary" href="/prescriptions"><i class="fa fa-left-arrow"></i>&nbsp;Back to Prescription</a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="margin-top:30px;">
                    @if(count($prescriptionsTrashed)>0)
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table_id">
                            <thead>
                              <tr>
                                {{--  <th scope="col">Student ID</th>
                                <th scope="col">Student Name</th>  --}}
                                <th scope="col">Drug</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Note</th>
                                <th scope="col">Refill Status</th>
                                <th scope="col">Action</th>
                    
                              </tr>
                            </thead>      
                            <tbody>
                                  @foreach($prescriptionsTrashed as $prescription)
                                <tr>
                                      {{--  <td>{{$prescription->patient->studentId}}</td>
                                      <td>{{$prescription->patient->lName}},&nbsp;{{$prescription->patient->fName}}&nbsp;{{$prescription->patient->mName}}</td>  --}}
                                      <td>{{$prescription->drug}}</td>
                                      <td>{{$prescription->quantity}}</td>
                                      <td>{{$prescription->note}}</td>
                                      <td>{{$prescription->refill}}</td>
                                      <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                   {!! Form::open(['action' =>[ 'PrescriptionsController@restore',$prescription->id], 'method' => 'DELETE', 'class'=>'form-horizontal']) !!}
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Restore</button>
                                                   {!! Form::close() !!} 
                                                </li>
                                                <li class="list-inline-item">
                                                   {!! Form::open(['action' =>[ 'PrescriptionsController@deleteforever',$prescription->id], 'method' => 'DELETE', 'class'=>'form-horizontal']) !!}
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                   {!! Form::close() !!} 
                                                </li>
                                          </ul>
                                        </td>                
                                  </tr>
                                  @endforeach
                            </tbody>
                          </table>
                    </div> 	
                </div>
            @endif
    </div>
 
</div>




 
@stop


