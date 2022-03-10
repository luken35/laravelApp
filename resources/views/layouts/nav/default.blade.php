<?php   $approute = "/panelapp/public"; ?>
@section('nav')
<section class="nav">
    <ul>
        <a href='{{$approute}}/'><li>Home</li></a>
        <a href='{{$approute}}/about'><li>About</li></a>
        <a href='{{$approute}}/contact'><li>Contact</li></a>
        <a href='{{$approute}}/posts'><li>Posts</li></a>
        <a href='{{$approute}}/showroom'><li>Showroom</li></a>
        <a href='{{$approute}}/sandbox'><li>Sandbox</li></a>
        <a href='{{$approute}}/game'><li>Monster Hunter</li></a>
        <a href='{{$approute}}/crudapp'><li>CRUD App</li></a>
    </ul>
</section>
<div class="clear"></div>
    @endsection
