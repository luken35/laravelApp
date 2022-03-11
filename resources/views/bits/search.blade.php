<?php
use \App\Http\Controllers\PagesController;
$local = (new App\Http\Controllers\PagesController)->stockdata();
?>
<div class="search">
    <form action="{{ url('/crudapp/search') }}" method="post" enctype="multipart/form-data">
        @csrf @method('GET')
        <input type="text" name="partnum" placeholder="Input Part Number"/>
        <button type="submit">Search By Part Number</button>
    </form>

    <form action="{{ url('/crudapp/search') }}" method="post" enctype="multipart/form-data">
    @csrf @method('GET')
        <select name="location">
            <option name="default">Filter By Location</option>
            @foreach($local['locations'] as $item)
                <option name="{{$item->location}}" value='{{$item->location}}'>{{$item->location}}</option>
            @endforeach
        </select>
        <select name="partselect">
            <option name="default">Filter By Part Number</option>
            @foreach($local['parts'] as $item)
                <option name="{{$item->part_num}}" value='{{$item->part_num}}'>{{$item->part_num}}</option>
            @endforeach
        </select>
        <button type="submit">Search</button>
        <button type="button" onclick="window.location.href='/panelapp/public/crudapp'">Clear</button>
    </form>

</div>
