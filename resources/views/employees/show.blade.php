@extends('layouts.app')

@section('content')
    <hr>
    <a href="/employees" class="btn btn-default">Go Back</a>
    <h1>{{$employee->employee_id}}</h1> 
    <div>
    Name: {{$employee->firstname}} {{$employee->lastname}}   Salary: {{$employee->salary}}    
    </div>
    <small>Added on: {{$employee->created_at}} by: {{$employee->user->name}}</small> 
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $employee->user_id)
            <a href="/employees/{{$employee->id}}/edit" class="btn btn-default">Edit</a>

            {{!!Form::open(['action' => ['EmployeesController@destroy', $employee->id],'mehtod' => 'POST', 'class'=> 'pull-right'])!!}}
                {{!!Form::hidden('_method', 'DELETE')!!}}
                {{!!Form::submit('Delete',['class' => 'btn btn-danger'])!!}}
            {{!!Form::close()!!}}
        @endif
    @endif
@endsection 