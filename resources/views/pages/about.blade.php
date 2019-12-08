@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <p>This is a net salary computation application</p>
    <h3>Features</h3>
    @if(count($features) > 0)
        <ul class="list-group">
            @foreach($features as $feature)
                <li class="list-group-item">{{$feature}}</li>
            @endforeach
        </ul>
 @endif
@endsection