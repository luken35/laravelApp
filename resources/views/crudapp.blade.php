<section class="banner">
    <h1>Laravel Application</h1>
</section>
@include('layouts.nav.default')
<?php   $approute = "/panelapp/public"; ?>
@yield('nav')
@include('layouts.nav.crud-inner')
<html>
<head>
    <link href='/panelapp/resources/css/default.css' rel="stylesheet">
    <script src="https://unpkg.com/vue@next" defer></script>
    <title>CRUD APP</title>
</head>
<body>
<div class="clear"></div>
    <div class="container-fluid">
        <section class="intro">
            <h1>Homepage For CRUD Application</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt id tellus sit amet scelerisque.
                Quisque imperdiet orci ut eros cursus finibus. Integer pellentesque ultricies rutrum. Suspendisse potenti.
                Fusce sodales orci quis justo venenatis, vitae porttitor massa ornare. Phasellus aliquet odio eget lacus aliquet
                mattis. Fusce id purus tristique nulla tempus ultricies. Vestibulum sit amet urna elit. Donec aliquam lacinia lacus.</p>
        </section>
        @include('bits.search')
        @if(isset($fail))
            <h1>There Were No Results</h1>
        @endif
    @if(isset($parts))
            @foreach($parts as $part)
                <article class="parts">
                    <p>{!!$part->id!!}</p>
                    <h1>{!! $part->part_num !!}</h1>
                    <p>{!! $part->part_description !!}</p>
                    <p>{!! $part->location !!}</p>
                    <p>{!! $part->stock !!}</p>
                </article>
            @endforeach
        @endif
            <div class="clear"></div>
        @if(count($parts) > 9 && !isset($succ))
            <div class="d-flex justify-content-center">
                {!! $parts->links() !!}
            </div>
        @endif
    </div>
</body>
</html>
