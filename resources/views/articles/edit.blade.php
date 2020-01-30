@extends("IntegratedLayout")

@section("bootstrap")
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
@endsection

@section("content")

<form class="form-horizontal" action = "<?= url("integrated/articles")?>/{{$article->id}}" method = "POST">
  @csrf
  @method("PUT")
  <legend style="color: red;">Update Article</legend>
<div class="form-group {{$errors->has('title') ? 'has-warning': ''}}">
  <label for="Title" class="col-sm-2 control-label">Title</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputEmail3" value="{{$article->title}}" name = "title">
  
  </div>
</div>
<div class="form-group">
  <label for="excerpt" class="col-sm-2 control-label">Excerpt</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputPassword3" value="{{$article->excerpt}}" name = "excerpt">
  </div>
</div>

<div class="form-group">
  <label for="body" class="col-sm-2 control-label">Body</label>
  <div class="col-sm-10">
    <textarea name = "body" class="form-control" rows="3">{{$article->body}}</textarea>

  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-default">Update</button>
  </div>
</div>
</form>

@endsection
