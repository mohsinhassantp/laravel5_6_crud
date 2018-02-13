@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel 5.5 CRUD</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <h2>Create A Comment</h2>
    <a href="{{action('CommentController@index')}}" class="btn btn-info">List All</a><br  />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <form method="post" action="{{url('comments')}}">

        {{csrf_field()}}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Comment:</label>
                <input type="text" class="form-control" name="description">
            </div>
        </div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4">
        <button type="submit" class="btn btn-success" style="margin-left:38px">Add Comment</button>
    </div>
</div>
</form>
</div>
</body>
</html>
@endsection