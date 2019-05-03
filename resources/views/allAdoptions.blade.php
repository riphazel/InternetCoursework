@extends('layouts.staff_layout')



@section('content')

<style>


</style>
    <h1>All Adoptions requests</h1>
    @if(count($adoptions) > 0 )
        @foreach($adoptions as $adoption)
        <div class="information_table">
            <h1>Adoption of {{$adoption->animal}}</h1>
            <p>By {{$adoption->person}}</p>
            @if($adoption->processed == 0)
                <p>Is still being processed</p>
            @elseif($adoption->accepted == 1)
                <p>Was accepted</p>
            @else
                <p>Was rejected</p>
            @endif
        </div>

        @endforeach
    @else
        <p>No Adoption requests</p>
    @endif





@endsection