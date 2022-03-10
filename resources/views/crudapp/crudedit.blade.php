<html>
<section class="banner">
    <h1>Laravel Application</h1>
</section>
@include('layouts.nav.default')
<?php   $approute = "/panelapp/public"; ?>
@yield('nav')
@include('layouts.nav.crud-inner')
<head>
    <link href='/panelapp/resources/css/default.css' rel="stylesheet">
    <script src="https://unpkg.com/vue@next" defer></script>
    <title>CRUD APP</title>
</head>
<body>
<div class="clear"></div>
<div class="container-fluid">
    <section class="intro">
        <h1>Edit Page For CRUD Application</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt id tellus sit amet scelerisque.
            Quisque imperdiet orci ut eros cursus finibus. Integer pellentesque ultricies rutrum. Suspendisse potenti.
            Fusce sodales orci quis justo venenatis, vitae porttitor massa ornare. Phasellus aliquet odio eget lacus aliquet
            mattis. Fusce id purus tristique nulla tempus ultricies. Vestibulum sit amet urna elit. Donec aliquam lacinia lacus.</p>
    </section>
    @foreach($parts as $part)
        <article class="parts">
            <p>Part ID - {!!$part->id!!}</p>
            <h1>{!! $part->part_num !!}</h1>
            <p>{!! $part->part_description !!}</p>
            <p>{!! $part->location !!}</p>
            <p>{!! $part->stock !!}</p>
            <a class="edit_button" href="edit/{{$part->id}}"><button> Click To Edit</button></a>

            <form action="{{ url('/crudapp/delete_part/'.$part->id) }}" method="POST">
                @csrf @method('PUT')
            <a class="delete_button" href="delete_part/{{$part->id}}"><button>Delete Part</button></a>
            </form>

        </article>
    @endforeach

    <div class="clear"></div>
    <div class="d-flex justify-content-center">
        {!! $parts->links() !!}
    </div>
        <a class="editmany" href="edit_parts?page={{request()->input('page')}}"><button> Click To Edit All Shown</button></a>
</div>
</body>
</html>
