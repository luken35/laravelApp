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
    <script>
        var msg = '{{session()->get('message')}}';
        var exist = '{{session()->has('message')}}';
        if(exist){ alert(msg); }
    </script>
</head>
<body>
<div class="clear"></div>
<div class="container-fluid edit">
    <section class="intro">
        <h1>Edit Parts</h1><br><br>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt id tellus sit amet scelerisque.
            Quisque imperdiet orci ut eros cursus finibus. Integer pellentesque ultricies rutrum. Suspendisse potenti.
            Fusce sodales orci quis justo venenatis, vitae porttitor massa ornare. Phasellus aliquet odio eget lacus aliquet
            mattis. Fusce id purus tristique nulla tempus ultricies. Vestibulum sit amet urna elit. Donec aliquam lacinia lacus.</p>
    </section>
    <form action="{{ url('/crudapp/update_parts?page=' . request()->input('page') ) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @foreach($parts as $part)
            <section><h1>Part ID - {!!$part->id!!}</h1></section>
            <section><h1>Part Number - </h1>
                <input type="text" name="part_num_{{$part->id}}" value="{{$part->part_num}}" class="form-control">
            </section>

            <section><h1>Description - </h1>
                <input type="text" name="part_description_{{$part->id}}" value="{{$part->part_description}}" class="form-control">
            </section>

            <section><h1>Location - </h1>
                <input type="text" name="location_{{$part->id}}" value="{{$part->location}}" class="form-control">
            </section>

            <section><h1>Amount Stocked - </h1>
                <input type="text" name="stock_{{$part->id}}" value="{{$part->stock}}" class="form-control">
            </section>
        @endforeach
        <button type="submit" class="btn btn-primary">Update Parts</button>
    </form>
        @if($errors->any())
            {{ implode('', $errors->all(':message')) }}
        @endif
        <div class="clear"></div>

    <a href="{{$approute}}/crudapp/edit">Go Back</a>

    <div class="clear"></div>

</div>
</body>
</html>
