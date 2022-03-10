@extends('layouts.layout')
@section('title', 'Blog Post')
<?php   $approute = "/panelapp/public"; ?>
@section('content')
   <h1>{!! $post->title !!}</h1>

   <p>{!! $post->body !!}</p>

    <a href="{{$approute}}/posts">Go Back</a>
@endsection

