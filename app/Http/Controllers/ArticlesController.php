<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function show($article_id)
    {
      $article = Article::find($article_id);
      //dd($article_id);
      return view("articles.show", ["article" => $article]);
    }

    public function showall()
    {
      //$result = Article::simplePaginate(1);
      $result = Article::paginate(1);
      return view("articles.all", ["articles" => $result]);
    }
}
