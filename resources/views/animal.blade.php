@extends('layouts.user_layout')

@section('content')

<div class="col-md-4">

    <p>Name: {{$animal->name}}</p>
    <p>Description: {{$animal->description}}</p>
    <p>Date of Birth: {{$animal->DOB}}</b>
    <form action="/adopt" method="POST">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <input type="submit" class="submit" name="submit" value="Adopt">
        <input type="hidden" name="id" value="{{$animal->id}}">
    </form>
</div>

<p><img src="{{$animal->image_source}}"  style="max-height: 400px;"><p>


    
@endsection



