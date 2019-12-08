@extends('layouts.app')

@section('content')
    <hr>
    <a href="/net_incomes" class="btn btn-default">Go Back</a>
    <h1>Salary Details</h1> 
    <div>
    Employee ID: {{$net_income->employee_id}}  Salary: {{$net_income->salary}}    
    </div>
    <small>Added on: {{$net_income->created_at}}</small> 
    <hr>     
    <a href="/net_incomes/{{$net_income->id}}/edit" class="btn btn-default">Edit</a>
    
    {{!!Form::open(['action' => ['NetIncomesController@destroy', $net_income->id],'mehtod' => 'POST', 'class'=> 'pull-right'])!!}}
        {{!!Form::hidden('_method', 'DELETE')!!}}
        {{!!Form::submit('Delete',['class' => 'btn btn-danger'])!!}}
    {{!!Form::close()!!}}

<br> <br>
<table class="table table-striped"> 
    <tr>
        <th>NET SALARY<th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td>{{$net_income->employee_id}}<td>
        <td>{{$net_income->salary}}</td>
        <td>Net Income:</td>
        <td>            
            @php
                function get_taxed_salary($salary){
                $salary = NetIncome::net_incomes()->salary;
                {                    
                    
                    if ($salary < 9999 )
                        {
                        return $salary;
                        };
                    if ($salary > 9999)
                        {
                        return ( $salary - (0.1 * $salary) );
                        };
                    if ($salary > 10000 && $salary < 39999)
                        {
                        return ( $salary - (0.2 * $salary) );
                        };
                    if ($salary > 40000 && $salary < 69999)
                        {
                        return ( $salary - (0.3 * $salary) );
                        };
                    if ($salary > 70000)
                        {
                        return ( $salary - (0.4 * $salary) );
                        };
                        
                 $taxed_salary = get_taxed_salary($salary);
                 return $taxed_salary();
                }
            }
            @endphp         
        </td>
        
    </tr>
</table>

     
@endsection 