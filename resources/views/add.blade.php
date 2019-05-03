@extends('layouts.staff_layout')

@section('content')
    <h1>Add Animal</h1>

    <form action="/addAnimal" method="POST" >
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <input type="text" name="name" placeholder="Animal name" required ><br/>
        <input type="text" name="DOB" placeholder="Date of birth YYYY/MM/DD" required><br/>
        <input type="text" name="description"  placeholder="Description" required><br/>
        <input type="text" name="image_source" placeholder="Source of image" required><br/>
        <input type="submit" name="submit" value="Submit">
    </form>


@endsection