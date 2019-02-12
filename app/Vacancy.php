<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    //Table name
    protected $table = 'vacancy';
    //primary key
    public $primaryKey = 'vac_id';
    //timestamps
    public $timestamps = true;

    public function user(){
         return $this->belongsTo('App\User' );
    }
}
