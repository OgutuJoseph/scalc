@extends('layouts.app')

@section('content')
    <h1>Employees</h1> 
    @if(count($employees) > 0)
        @foreach($employees as $employee)
            <div class="well">
                <h3><a href="/employees/{{$employee->id}}">{{$employee->employee_id}}</h3>
                <small>Added on: {{$employee->created_at}} by: {{$employee->user->name}}</small>
            </div>
        @endforeach
        {{$employees->links()}}
    @else
        <p>No Employees found</p>
    @endif
@endsection 