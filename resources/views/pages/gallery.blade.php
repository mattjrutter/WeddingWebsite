@extends('layouts.app')

@section('content')
    <h1 style="font-family: 'Great Vibes', cursive;">Gallery</h1>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="pics/engagement.jpg" class="img-thumbnail" alt="Engagement">
            </div>
            <div class="item">
                <img src="pics/pianoGuys.jpg" class="img-thumbnail" alt="PianoGuys Concert">
            </div>
            <div class="item">
                <img src="pics/spaceNeedle.jpg" class="img-thumbnail" alt="Space Needle">
            </div>
            <div class="item">
                <img src="pics/waterfall1.jpg" class="img-thumbnail" alt="Waterfall 1">
            </div>
            <div class="item">
                <img src="pics/giantWheel.jpg" class="img-thumbnail" alt="Giant Wheel">
            </div>
            <div class="item">
                <img src="pics/first.jpg" class="img-thumbnail" alt="First Picture">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

@endsection