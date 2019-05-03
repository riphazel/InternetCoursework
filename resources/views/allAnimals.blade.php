@extends('layouts.staff_layout')

@section('content')
    <h1>All Animals in the database</h1>

    @if(count($animals) > 0 )
        @foreach($animals as $animal)
        <div class="well">
            <p>{{$animal->name}}</p>
                @if($animal->availability == 1)
                    <p>Can still be adopted</p>
                @else
                    <p>Was adopted by {{$animal->owner}}</p>
                @endif
        </div>
        @endforeach
    @else
        <p>No Animals exist in the database</p>
    @endif





@endsection