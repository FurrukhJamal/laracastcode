<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class); //select * from user where post_id=1
    }

    /*The same function as above but this time it passes foriegn key cuz
    laravel by default will search for methodname_key*/

    public function author()
    {
      return $this->belongsTo(User::class, "user_id");
    }
}
