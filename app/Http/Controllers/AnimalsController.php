<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animals;
use App\Adoptions;
use App\User;
use DB;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get only the available animals from the table
        $animals = Animals::all()->where('availability',1);
        
        return view('/user')->with('animals', $animals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $animal = new Animals();

        $animal->name = request('name');
        $animal->DOB = request('DOB');
        $animal->description = request('description');
        $animal->image_source = request('image_source');
        $animal->owner = ('N/A');
 
        $animal->save();

        return redirect('staff');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $animal =  Animals::find($id);
        return view('animal')->with('animal',$animal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    //Create a new adoption entry in the database
    public function adopt(Request $request){
        $userID = auth()->user()->id;

        $adopt = new Adoptions();
        $adopt->userID = auth()->user()->id;
        $theUser = DB::table('users')->where('id', '=', $userID)->first();
        $theAnimal = DB::table('animals')->where('id', '=', request('id'))->first();
        $adopt->animalID = request('id');
        $adopt->person = $theUser->name;
        $adopt->animal = $theAnimal->name;
        $adopt->save();


        return redirect('user');


    }


    /**
     * Called when an admin accepts an adoption request.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \\Illuminate\Http\Response
     */

    public function adoptionAccept(Request $request){
        Adoptions::where('id',request('adoptionID'))->update(['processed' => '1', 'accepted' => '1']);
        Animals::where('id',request('animalID'))->update(['availability' => '0']);
        Animals::where('id',request('animalID'))->update(['owner' => request('person')]);
        return redirect('staff');

    }
    /**
     * Called when an admin rejects an adoption request.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \\Illuminate\Http\Response
     */
    public function adoptionReject(Request $request){
        Adoptions::where('id',request('adoptionID'))->update(['processed' => '1', 'accepted' => '0']);
        return redirect('staff');
    }


    /**
     * View all the animals in the database
     * 
     * 
     * 
     */
    public function viewAllAnimals(){
        $animals = Animals::all();
        return view('allAnimals')->with('animals',$animals);
    }




}
