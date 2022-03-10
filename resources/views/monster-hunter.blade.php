@extends('layouts.layout')
@section('title', 'Vue Sandbox')
<?php   $approute = "/panelapp/public";?>
<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <style>
        *{
            font-family: 'Raleway' , serif;
        }
        h1{
            text-align: center;
            font-size: 40px;
            text-decoration: underline;
        }
        button{
            width:20%;
            padding:20px 40px 20px 40px;
            font-size: 20px;
            margin-left: 4%;
        }
        #battleLog{
            text-align: center;
            font-size: 20px;
            list-style-type: none;
        }
        #battleLog li{
            padding: 5px;
            list-style-type: none;
        }
        ul>li:nth-child(odd){
            border-top: 2px solid grey;
        }
        .win-box{
            padding:10px;
            font-size: 30px;
            text-decoration: underline;
            color: red;
        }
    </style>

</head>

<script src="../resources/views/js/game.js"></script>

@section('content')
    <div>
        <section style="margin-bottom: 60px; border-bottom: 3px solid white;">
            <h1 style="">Monster Hunter</h1>
        </section>
        <button id="startButton" style="margin-left: 40%; margin-right: auto;">Start Game</button>
    </div>
<div id="game">
    <section>
        <h1>Player Health</h1>
        <div style="border: 5px solid white;">
            <div id="p-hp" style="height:60px; background-color: darkred;" :style="{width: playerHealth + '%'}"></div>
        </div>
        <h1>Monster Health</h1>
        <div style="border: 5px solid white;">
            <div id="m-hp" style="height:60px; background-color: darkred;" :style="{width: monsterHealth + '%'}"></div>
        </div>
    </section>
    <section class="win-box" v-if="winner">
        <h1 v-if="winner === 'Monster'">You Lost!</h1>
        <h1 v-else>You Win!</h1>

        <button style="margin-left: 28%;" @click="startNewRound">Carry On?</button>
        <button @click="endGame">End Game</button>

    </section>
    <section style="margin-top:20px;"  v-else>
        <button @click="attackMonster">Attack</button>
        <button @click="heavyAttack" >Heavy Attack</button>
        <button @click="block">Block</button>
        <button @click="heal">Heal</button>
    </section>
    <section id="battleLog">
        <h1>Battle Log</h1>
        <ul>
            <li v-for="logMessage in logMessages">
                @{{ logMessage.actionBy }} - @{{ logMessage.actionType }} - @{{ logMessage.actionValue }} HP
            </li>
        </ul>
    </section>
</div>
@endsection

