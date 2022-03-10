@extends('layouts.layout')
@section('title', 'Posts')
<?php   $approute = "/panelapp/public"; ?>
@section('content')
    @foreach($vehicles as $vehicle)

        <section class="result-vehicle">

            <div class="vehicle-overview">
                <h1>{{$vehicle->modelname}}</h1>
                <h2>{{$vehicle->derivitive}}</h2>
            </div>
                <div class="vehicle-details">
                    <p>{!! $vehicle->price !!}</p>
                    <p>{!! $vehicle->fueltype !!}</p>
                    <p>{!! $vehicle->enginesize !!}</p>
                    <p>{!! $vehicle->transmission !!}</p>

                    <a  href="{{$approute}}/vehicle/{{$vehicle->id}}"><button class="btn btn-primary">More Details</button></a>
                </div>
        </section>
    @endforeach
@endsection
