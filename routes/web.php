<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/welcome", function () {
  return "hello World";
});

//json output
Route::get("/json", function () {
  return ["hello" => "world", "foo" => "bar"];
});


Route::get("test", function () {
  $name = request("name");
  return view("test", [
    "name" => $name
  ]);
});


/*WILD CARD WITHOUT A CONTROLLER */
Route::get("user/{anyuser}" , function ($user) {
  $users = [
    "Furrukh" => "This page belongs to Furrukh",
    "Jamal" => "This page belongs to Jamal"
  ];

  if (!array_key_exists($user, $users))
  {
    abort(404, "Sorry that user does not exists");
  }

  return view("users", [
    "user" => $users[$user]
  ]);
});


/*WILD CARD WITH A CONTROLLER*/
Route::get("posts/{post}", "PostsController@show");




/*Loading home page with layouts*/
Route::get("homepage", function (){
  return view("homepage");
});

Route::get("homepage/contact", function () {
  return view("contact");
});


/*Integrated Views from another Website*/

Route::get("integrated", function () {
  return view("IntegratedWelcome");
} );

Route::get("integrated/about", function () {
  //logic to get dynamic vies using Article Model
  $articles = App\Article::take(3)->latest()->get();
  //return $articles;

  return view("integratedAbout", [
    "articles" => $articles
  ]);
});


/*Dynamic View USing Article Model*/

Route::get("integrated/articles/{article}", "ArticlesController@show");

/*Homework exercise for pagination on views*/
Route::get("integrated/articles", "ArticlesController@showall");
