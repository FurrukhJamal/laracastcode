<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  // only allow these to be edited in mysql
  protected $fillable = ["title", "excerpt", "body"];

  // OR TURN ALL PROTECTION OFF BY
  //protected $guarded = [];

  public function user()
  {

  }
  
}
