@extends('layouts.staff_layout')

@section('content')
    <h1>Adoption Requets</h1>

    @if(count($adoptions) > 0 )
        @foreach($adoptions as $adoption)
        <div class="well">
            <p>This Person {{$adoption->person}} wants to adopt </p>
            <p>This animal {{$adoption->animal}}</p>
            <form action="/AdoptionAccept" method="POST" >
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <input type="hidden" name="adoptionID" value="{{$adoption->id}}">
                <input type="hidden" name="animalID" value="{{$adoption->animalID}}">
                <input type="hidden" name="person" value="{{$adoption->person}}">
                <input type="submit" name="submit" value="Accept">
            </form>
            <form action="/AdoptionReject" method="POST" >
                <input type ="hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <input type="hidden" name="adoptionID" value="{{$adoption->id}}">
                <input type="submit" name="submit" value="Reject">
            </form>
        </div>
        @endforeach
    @else
        <p>No animals to adopt</p>
    @endif





@endsection