@extends('layouts.layout')
@section('title', 'Posts')
<?php   $approute = "/panelapp/public"; ?>
@section('content')
    @foreach($posts as $post)
    <article>
        <a  href="{{$approute}}/posts/{{$post->id}}"><h1>{{$post->title}}</h1></a>
        <p>{!!$post->excerpt!!}</p>
        <h1>{!! $post->category !!}</h1>
    </article>
    @endforeach
@endsection
