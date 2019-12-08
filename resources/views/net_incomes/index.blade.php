@extends('layouts.app')

@section('content')
    <h1>Net Incomes</h1> 
    <a href="/net_incomes/create" class="btn btn-primary">Post Salary</a>
    @if(count($net_incomes) > 0)
        @foreach($net_incomes as $net_income)
            <div class="well">
                <h3><a href="/net_incomes/{{$net_income->id}}">{{$net_income->employee_id}}</h3>
                <small>Added on: {{$net_income->created_at}}</small>
            </div>
        @endforeach
        {{$net_incomes->links()}}
    @else
        <p>No Salary Postings</p>
    @endif
@endsection