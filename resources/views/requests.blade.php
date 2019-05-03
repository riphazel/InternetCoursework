@extends('layouts.user_layout')

@section('content')
<h1>Adoptions request made by you </h1>

    @if(count($adoptions) > 0 )
        @foreach($adoptions as $adoption)
            <div class="well">
                <h2>{{$adoption->animal}}</h2>
                @if($adoption->accepted == 1)
                    <p>Adoption succesfull</p>
                @elseif($adoption->processed == 0)
                    <p>Not processed</p>
                @else
                    <p>Rejected</p>
                @endif
            </div>
        @endforeach
    @else
        <p>You have no adoption requests</p>
    @endif



    





@endsection