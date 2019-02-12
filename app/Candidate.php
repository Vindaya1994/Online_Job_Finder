<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
  //Table name
  protected $table = 'candidates';
  //primary key
  public $primaryKey = 'cand_id';
  //timestamps
  public $timestamps = true;
}
