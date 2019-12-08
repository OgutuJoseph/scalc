@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/employees/create" class="btn btn-primary">Add Employee</a>
                    <h3>Your Added Employees</h3>
                    Signed in!
                    @if(count($employees) > 0)
                        <table class="table table-striped"> 
                            <tr>
                                <th>Employees<th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->employee_id}}<td>
                                    <td><a href="employees/{{$employee->id}}/edit" class="btn btn-default">Edit</td>
                                    <td>
                                        {{!!Form::open(['action' => ['EmployeesController@destroy', $employee->id],'mehtod' => 'POST', 'class'=> 'pull-right'])!!}}
                                            {{!!Form::hidden('_method', 'DELETE')!!}}
                                            {{!!Form::submit('Delete',['class' => 'btn btn-danger'])!!}}
                                        {{!!Form::close()!!}}  
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have not added any employeees </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
