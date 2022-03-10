@extends('layouts.layout')

@section('content')
    <h1>My First Website</h1>

    @foreach ($tasks as $task)
        <h2>{{$task['title']}}</h2>
        <p>{{$task['desc']}}</p>
    @endforeach

    @endsection


