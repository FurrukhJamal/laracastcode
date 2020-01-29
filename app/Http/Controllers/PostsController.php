<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use DB;
use App\Post;

class PostsController extends Controller
{
    public function show($slug)
    {
        $post = \DB::table("posts")->where("slug", $slug)->first();
        //dd($post);
        // $posts = [
        //   "1st" => "That is the first post",
        //   "2nd" => "That is the second post"
        // ];

        // if(!array_key_exists($post, $posts))
        // {
        //   abort(404, "Sorry invalid post");
        // }
        //
        // return view("posts", [
        //   "post" => $posts[$post]
        // ]);

        // if(!$post)
        // {
        //   abort(404);
        // }

        //THE SAME POST USING ELOQUENT
        $post_elo = Post::where("slug", $slug)->firstOrFail();


        return view("posts", [
          "post" => $post,
          "post_elo" => $post_elo
        ]);
    }
}
