<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function show($article_id)
    {
      //RENDERS A SINGLE RESOURCE/ARTICLE

      $article = Article::find($article_id);
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
        request()->validate([
          "title" => "required",
          "excerpt" => "required",
          "body" => "required"
        ]);


        //dump(request()->all());
        $article = new Article();

        $article->title = request("title");
        $article->excerpt = request("excerpt");
        $article->body = request("body");

        $article->save();

        return redirect("integrated/articles");
    }

    public function edit($article_id)
    {
        // LOADS VIEW TO EDIT AN EXISTING RESOURCE/ARTICLE
        $article = Article::findOrFail($article_id);
        return view("articles.edit", compact("article"));
    }

    public function update($article_id)
    {
      // PERSIST/SAVE THE UPDATED RESOURCE/ARTICLE
      //dd("here");

      /*start of validation*/
      request()->validate([
        "title" => "required",
        "excerpt" => "required",
        "body" => "required"
      ]);

      $article = Article::findOrFail($article_id);

      $article->title = request("title");
      $article->excerpt = request("excerpt");
      $article->body = request("body");

      $article->save();

      //redirecting to that article
      return redirect("/integrated/articles/" . $article->id);
    }

    public function destroy()
    {
        //DELETE THE RESOURCE
    }
}
