@extends('layouts.layout')
@section('title', 'Blog Post')
<?php   $approute = "/panelapp/public"; ?>
@section('content')
   <h1>{!! $vehicle->modelname !!}</h1>

   <p>{!! $vehicle->derivitive !!}</p>

    <a href="{{$approute}}/showroom">Go Back</a>
@endsection

