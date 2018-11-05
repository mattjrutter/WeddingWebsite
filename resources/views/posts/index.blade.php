@extends('layouts.app')

@section('content')
    @if(!Auth::guest())
        <div class="container">
            <br>
            <a href="/posts/create" class="btn btn-primary pull-right">Create Post</a>
        </div>
    @else
        <div class="container">
            <p>Join the conversation by <a href="/login">logging in</a> or <a href="/register">registering!</a></p>
        </div>
    @endif
    <h1 style="font-family: 'Great Vibes', cursive;">Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well" style="padding-top: 0px;">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <p>{!!$post->body!!}</p>
                <small>Written {{$post->created_at}} by {{$post->user->name}}</small>
            </div>
        @endforeach
    @else
        <p>No posts found</p>
    @endif

@endsection