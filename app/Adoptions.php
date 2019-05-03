<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Adoptions;

class Adoptions extends Model
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $timestamps = false;

    //An adoption belongs to a user
    public function user()
    {
        $this->belongsTo('App\User');
    }


    public function animals()
    {

    }


}
