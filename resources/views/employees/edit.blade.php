@extends('layouts.app')

@section('content')
    <h1>Edit Employee Details</h1> 
    {!! Form::open( ['action' =>['EmployeesController@update', $employee->id],'method' => 'POST']) !!}    
    <div class="form-group">
            {{Form::label('employee_id','Employee ID')}}
            {{Form::text('employee_id', $employee->employee_id,['class' => 'form-control', 'placeholder' =>'Employee ID'])}}
        </div>
        <div class="form-group">
            {{Form::label('firstname','First Name')}}
            {{Form::text('firstname', $employee->firstname, ['class' => 'form-control', 'placeholder' =>'First Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('lastname','Last Name')}}
                {{Form::text('lastname', $employee->lastname, ['class' => 'form-control', 'placeholder' =>'Last Name'])}}
        </div>
        <div class="form-group">
                {{Form::label('salary','Salary')}}
                {{Form::text('salary', $employee->salary,['class' => 'form-control', 'placeholder' =>'Salary'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
     
@endsection