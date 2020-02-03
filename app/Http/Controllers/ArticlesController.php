<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;


/*Type hinting the Article object in show, update and edit
 do Article::where("id", $article)->first() behind the scenes*/

class ArticlesController extends Controller
{
    public function show(Article $article)
    {
      //RENDERS A SINGLE RESOURCE/ARTICLE

      //$article = Article::find($article_id);
      //return $article;
      //dd($article_id);
      return view("articles.show", ["article" => $article]);
    }

    public function index()
    {
      //renders a list of resource
      //$result = Article::simplePaginate(1);
      $result = Article::paginate(2);
      return view("articles.all", ["articles" => $result]);
    }

    public function create()
    {
        //SHOWS A VIEW TO CREATE A NEW RESOURCE/ARTICLE
        return view("articles.create");
    }

    public function store()
    {
        // PERSIST/SAVE A NEW CREATED RESOURCE/ARTICLE

        /*start of validation*/
        // request()->validate([
        //   "title" => "required",
        //   "excerpt" => "required",
        //   "body" => "required"
        // ]);


        //dump(request()->all());
        // $article = new Article();
        //
        // $article->title = request("title");
        // $article->excerpt = request("excerpt");
        // $article->body = request("body");
        //
        // $article->save();

        // Article::create([
        //   "title" => request("title"),
        //   "excerpt" => request("excerpt"),
        //   "body" => request("body")
        // ]);


        $validatedattr = request()->validate([
          "title" => "required",
          "excerpt" => "required",
          "body" => "required"
        ]);

        //return $validatedattr;

        Article::create($validatedattr);



        return redirect("integrated/articles");
    }

    public function edit(Article $article)
    {
        // LOADS VIEW TO EDIT AN EXISTING RESOURCE/ARTICLE

        //$article = Article::findOrFail($article_id);
        return view("articles.edit", compact("article"));
    }

    public function update(Article $article)
    {
      // PERSIST/SAVE THE UPDATED RESOURCE/ARTICLE
      //dd("here");

      /*start of validation*/
      // request()->validate([
      //   "title" => "required",
      //   "excerpt" => "required",
      //   "body" => "required"
      // ]);
      //
      // //$article = Article::findOrFail($article_id);
      //
      // $article->title = request("title");
      // $article->excerpt = request("excerpt");
      // $article->body = request("body");
      //
      // $article->save();

      $article->update(request()->validate([
         "title" => "required",
         "excerpt" => "required",
         "body" => "required"
       ]));

      //redirecting to that article
      //return redirect("/integrated/articles/" . $article->id);
      return redirect(route("articles.show", $article));
    }

    public function destroy()
    {
        //DELETE THE RESOURCE
    }
}
