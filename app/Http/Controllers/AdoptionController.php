<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adoptions;
use App\User;
use App\Animals;
use DB;

class AdoptionController extends Controller
{

    /* UNUSED CODE
    public function adopt(Request $request){
        
        $adoption = new Adoptions();
        $adoption->userID = Auth::user()->id;
        $userID = Auth::user()->id;
        $theUser = User::select('name')->where('id','=', $userID )->get();
        $theAnimal = request('animal');
        $adoption->animalID = request('id');
        $adoption->person = $theUser;
        $adoption->animal = $theAnimal->name;
        $adoption->save();
    }
    */


    public function index()
    {
        $adoptions = Adoptions::all()->where('processed',0);
        //$users = User::all()->where('id',$adoptions->userID);
        //$animals = Animals::all()->where('id',$adoptions->animalID);
        return view('/staff')->with('adoptions', $adoptions);

    }


    public function create()
    {
        //
        return view('adopt');
    }


    
    //Send all of the adoption request associated with the user to the request view
    public function userAdoptions(){
        $userID = auth()->user()->id;
        $adoptions = Adoptions::All()->where('userID',$userID);
        return view('requests')->with('adoptions',$adoptions);

    }

    public function allAdoptions(){
        $adoptions = Adoptions::All();
        return view('allAdoptions')->with('adoptions',$adoptions);
    }




    




}
