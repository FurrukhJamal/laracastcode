@extends("IntegratedLayout")


@section("bootstrap")
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
@endsection


@section ("content")
  <!-- <div id="wrapper">
    <div id= "page" class="container">
      <h1>Create an article</h1>
      <form class="" action="/integrated/articles" method="post">
        @csrf
        <div class="field">
          <label class="label" for="title">Title</label>
          <div class="control">
            <input type="text" name="title" class = "input">

          </div>
        </div>

        <div class="field">
          <label class="label" for="excerpt">Excerpt</label>
          <div class="control">
            <textarea name="excerpt" cols = "24" rows= "2"></textarea>

          </div>
        </div>

        <div class="field">
          <label class="label" for="body">Body</label>
          <div class="control">
            <textarea name="body" cols = "24" rows= "6"></textarea>


          </div>

          <div class="field">
            <input type="submit" value="Save">
          </div>
        </div>


      </form>
    </div>
  </div> -->


<div class="container">
  <form class="form-horizontal" action = "/integrated/articles" method = "POST">
    @csrf
    <legend style="color: red;">Create An Article</legend>
  <div class="form-group {{$errors->has("title") ? 'has-warning' : ''}}">
    <label for="Title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input
        type="text"
        class="form-control"
        id="inputEmail3"
        name = "title"
        value = "{{old("title")}}">
      @if ($errors->has("title"))
        <span id="helpBlock2" class="help-block">{{$errors->first("title")}}</span>
      @endif
    </div>
  </div>
  <div class="form-group @error("excerpt") has-warning @enderror">
    <label for="excerpt" class="col-sm-2 control-label">Excerpt</label>
    <div class="col-sm-10">
      <input
        type="text"
        class="form-control"
        id="inputPassword3"
        name = "excerpt"
        value = "{{old("excerpt")}}">

      @error("excerpt")
        <span id="helpBlock2" class="help-block">{{$errors->first("excerpt")}}</span>
      @enderror
    </div>
  </div>

  <div class="form-group @error("body") has-warning @enderror">
    <label for="body" class="col-sm-2 control-label">Body</label>
    <div class="col-sm-10">
      <textarea name = "body" class="form-control" rows="3">{{old("body")}}</textarea>
      @error("body")
        <span id="helpBlock2" class="help-block">{{$errors->first("body")}}</span>
      @enderror
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>
  </form>

</div>

@endsection
