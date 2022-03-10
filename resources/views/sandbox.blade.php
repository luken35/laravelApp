@extends('layouts.layout')
@section('title', 'Vue Sandbox')
<?php   $approute = "/panelapp/public";?>


<script src="../resources/views/js/sandbox.js"></script>
<link href="../resources/views/css/sandbox.css"  rel="stylesheet">

@section('content')

    <section id="assignment">
        <!-- need the @{{  }} the @ is so laravel uses it for vue not itself -->
        <h2>@{{ name }}</h2>

        <p>@{{	age	}}</p>

        <p>@{{	ageadd	}}</p>

        <p>Random Number: @{{ rnd }}</p>

    </section>

    <article id="counterApp">

        <h2>@{{ counter }}</h2>

        <button v-on:click="add(5)">Add 5</button>

        <button @click="minus()">Reduce 1</button>

    </article>

    <article id="inputApp">

        <h2>Name: @{{	 fullname	}} </h2>

        <input type="text" v-model="name">
        <button v-on:click="resetInput">Clear</button>
    </article>

    <header>
        <h1>Events</h1>
    </header>
    <section id="assignment2">
        <h2>Event Practice</h2>
        <!-- 2) Register the user input on "keydown" and output it in the paragraph (hint: event.target.value helps) -->
        <input type="text" v-on:keydown="setInput"/>
        <p>@{{  input1  }}</p>
        <hr />
        <!-- 3) Repeat 2) but only output the entered value if the ENTER key was pressed -->
        <input type="text" v-on:keydown.enter="confirmInput" />
        <p>@{{  input2  }}</p>
    </section>

    <article id="app2">
<!--        this is inline style changing-->
        <div :style="{backgroundColor: boxA ? 'red': 'lightseagreen' }" @click="boxS('A')" class="box"></div>

<!--            this is dynamic, external stylesheet-->
        <div @click="boxS('B')" :class="{active: boxB}" class="box"></div>

        <div :style="{borderColor: boxC ? 'red' : '#ccc' }" @click="boxS('C')" class="box"></div>
        <div style="clear: both"></div>
    </article>

    <article id="goals">
        <h2>Goals List</h2>

        <input type="text" v-model="goalvalue"/>
        <button @click="addGoal">Add Goal</button>

        <p v-if:="goals.length === 0"> Zerro Goals At the moment</p>
        <ul v-else> <!-- else needs to be directly next to the if doesnt need statement -->
            <li>Goal</li>
        </ul>
    </article>



@endsection
