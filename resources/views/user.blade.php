@extends('layouts.user_layout')

@section('content')
    <h1>Animals to adopt</h1>

    @if(count($animals) > 1 )
        @foreach($animals as $animal)
            <div class="well">
                <h2><a href="/user/{{$animal->id}}">{{$animal->name}} </a></h2>
                <h4>{{$animal->description}}</h2>
            </div>
        @endforeach
    @else
        <p>No animals to adopt</p>
    @endif


@endsection



