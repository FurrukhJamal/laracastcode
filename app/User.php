<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function articles()
    {
      return $this->hasMany(Article::class); // select * from articles where user_id = current user instance
    }


    public function posts()
    {
      return $this->hasMany(Post::class);
    }
}


// $user = User::find(1) --- select * from users where id = 1
// $user->posts ---- select * from posts where user_id = $user->id
// $user->posts will give a collection of posts that one could iterate over 
