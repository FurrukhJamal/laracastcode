<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Articles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  </head>
  <body>
    <div id="content">
      <div class="title">
        <h2>Articles</h2>
         </div>
         <div class="container">
           @foreach ($articles as $article)
           <h3>{{$article->title}}</h3>
            <p>{{ $article->excerpt }}</p>
           @endforeach
          </div>

          {{ $articles->links() }}
      </div>
      <button type="button" name="button"><a href="<?= url("/integrated")?>">Home</a></button>
    </div>
  </body>
</html>
