<!DOCTYPE html>
@include('layouts.nav.default')
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
<html>
    <head>
        <link href='/panelapp/resources/css/default.css' rel="stylesheet">
        <script src="https://unpkg.com/vue@next" defer></script>
        <title>@yield('title', 'Panel Application')</title>
    </head>
<body>
<section class="banner">
    <h1>Laravel Application</h1>
</section>
@yield('nav')
<div class="container-fluid">
@yield('content')
</div>
</body>
</html>
