<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    //


    public function userAdoptions(){
        return view('requests');
    }

    public function staffHome(){
        return view('staff');
    }


    /*
    public function staffAdd(){
        return view('add');
    }
    */
    





}
