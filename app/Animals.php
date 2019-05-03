<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animals;


class Animals extends Model
{
    //
    protected $table = 'animals';
    public $primaryKey = 'id';
    
    public function user(){
        $this->belongsTo('App\User');
    }
    
}
