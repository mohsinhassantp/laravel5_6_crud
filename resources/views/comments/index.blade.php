@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <a href="{{action('CommentController@create')}}" class="btn btn-info">Create New</a>
    {{--<a href="{!! url('comments/create') !!}"></a>--}}
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comments</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{$comment['id']}}</td>
                <td>{{$comment->user->name}}</td>
                <td>{{$comment['comment']}}</td>
                <td><a href="{{action('CommentController@edit', $comment['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('CommentController@destroy', $comment['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
@endsection