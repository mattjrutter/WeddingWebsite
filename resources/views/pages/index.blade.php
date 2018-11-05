@extends('layouts.app')

@section('content')
    <div class="row" id="box-search">
        <div class="thumbnail text-center" style="position: relative;">
            <img src="pics/engagement.jpg" alt="" class="img-responsive">
            <div class="caption" style="position: absolute; top: 7%; left: 0; width: 100%;">
                <div style="font-family: 'Great Vibes', cursive; color: white; font-size: 40px;
                text-shadow: 3px 3px 6px black;">
                    The Wedding Celebration of
                </div>
                <div style=" color: white; font-size: 62px;
                text-shadow: 3px 3px 6px black;">
                    MATT <span class="glyphicon glyphicon-heart-empty"></span> KATE
                </div>
                <div style=" color: white; font-size: 24px;
                text-shadow: 3px 3px 6px black;">
                    <strong>Grand Junction</strong>
                </div>
                <div style=" color: white; font-size: 18px;
                text-shadow: 3px 3px 6px black;">
                    <strong>9 JUN 2018</strong>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::guest())
        <div class="row well blueBack" style="text-align: center;">
            <p>
                Welcome to our wedding website! This website is where we will be posting information
                that will be relevant to attending the ceremony. If you have been directed here,
                then you have been invited to join us in our celebration!<br><br> ATTENTION: This website
                has an electronic RSVP system. Please, <a href="/register">REGISTER AN ACCOUNT</a>,
                or <a href="/login">LOGIN</a> to get to your Dashboard where you can fill out the
                information related to you and your party.
            </p>
        </div>
    @endif
    @include('index.aboutPanel')
    @include('index.wherePanel')
    @include('index.schedulePanel')
    @include('index.timer')
    @include('index.considerationsPanel')
    @include('index.registryPanel')
@endsection
