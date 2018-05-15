@extends('partials.appex')

@section('title', 'Queue')

@section('content')

<div class="container">
   <div class="row justify-content-center mt-5">

       <div >
           <div class="card card-default">
               <div class="card-header">Queue</div>
               <div class="card-body">
                   {!! Form::open(['action' => 'QueuesController@store', 'method' => 'POST']) !!}
                   <div class="form-group">
                       {{Form::label('studentid', 'Student ID')}}
                       {{Form::text('studentId', '', ['autofocus', 'class' =>'form-control', 'placeholder' => 'Tap your ID'])}}							
                   </div>			

                   {!! Form::close() !!}	
               </div> 
               <div class="card-body">
                  @if(count($errors))
                  <div class="form-group">
                      <div class="alert alert-danger alert-dissmissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <ul>
                           @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                           @endforeach
                       </ul>
                   </div>
                   @endif 
               </div>
               <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="table_id">
                   <thead>
                       <tr>
                           <th>Student ID</th>
                           <th>Last Name</th>
                           <th>First Name</th>
                           <th>Middle Initial</th>
                           <th>Course</th>
                           <th>Year</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tfoot>
                    <th>Student ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Initial</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Action</th>
                </tfoot>
                <tbody>
                   @foreach($queues as $queue)
                   <tr>
                       <th scope="col">{{$queue->patient->studentId}}</th>
                       <th scope="col">{{$queue->patient->lName}}</th>
                       <th scope="col">{{$queue->patient->fName}}</th>
                       <th scope="col">{{$queue->patient->mName}}</th>
                       <th scope="col">{{$queue->patient->course}}</th>
                       <th scope="col">{{$queue->patient->year}}</th>
                       <th scope="col"><a href="/patients/{{$queue->patient->id}}" class="btn btn-success btn-md"><i class="glyphicon glyphicon-eye-open"></i>view/edit</a></th>
                   </tr>
                   @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>
</div>
</div>
@stop