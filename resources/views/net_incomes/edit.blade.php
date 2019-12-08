@extends('layouts.app')

@section('content')
    <h1>Edit Salary Details</h1> 
    {!! Form::open( ['action' =>'NetIncomesController@update','method' => 'POST']) !!}    
    <div class="form-group">
            {{Form::label('employee_id','Employee ID')}}
            {{Form::text('employee_id','',['class' => 'form-control', 'placeholder' =>'Employee ID'])}}
        </div>
    <div class="form-group">
                {{Form::label('salary','Salary')}}
                {{Form::text('salary','',['class' => 'form-control', 'placeholder' =>'Salary'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
     
@endsection 