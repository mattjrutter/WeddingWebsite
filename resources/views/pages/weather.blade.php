@extends('layouts.app')

@section('content')
    <?php
        $previousDay = date("Y-m-d", strtotime("-1 days",strtotime($date)));
        $nextDay = date("Y-m-d", strtotime("+1 days",strtotime($date)));
    ?>
    <div class="container">
        @if ($previousDay >= "2017-12-09")
            <a href="/weather/{{$previousDay}}" class="btn btn-default">Previous Day</a>
        @endif
        @if ($nextDay <= date("Y-m-d"))
            <a href="/weather/{{$nextDay}}" class="btn btn-default pull-right">Next Day</a>
        @endif
    </div>
    <h1>{{$date}}</h1>
    @include('inc.charts')

@endsection