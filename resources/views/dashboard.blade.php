@extends('layouts.app')

@section('content')
    <script>
        function skipGuests() {
            $("#plusOneGuestLabel").hide();
            $("#plusOneGuestField").hide();
            $("#otherGuests").hide();
        }

        function loadGuests() {
            $("#plusOneGuestLabel").show();
            $("#plusOneGuestField").show();
            $("#otherGuests").show();
        }

        function hideGuests() {
            $("#plusOneGuestLabel").fadeOut(300);
            $("#plusOneGuestField").fadeOut(300);
            $("#otherGuests").fadeOut(300);
        }

        function showGuests() {
            $("#plusOneGuestLabel").fadeIn(300);
            $("#plusOneGuestField").fadeIn(300);
            $("#otherGuests").fadeIn(300);
        }

    </script>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h1 id="dashboardhead">Dashboard</h1><p id="error"></p></div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    {!! Form::open(['action' => ['DashboardController@update', $user->id], 'method' => 'POST']) !!}
                <br>
                <div class="form-group" style="text-align: center;">
                    <div class="row">
                        <div class="col-md-6">
                            {{Form::label('name', 'Your Name')}}
                            {{Form::text('name', $user->name, ['class' => 'form-control', 'style' => 'text-align: center'])}}
                        </div>
                        <div class="col-md-6">
                            {{Form::label('email', 'E-Mail')}}
                            {{Form::text('email', $user->email, ['class' => 'form-control', 'style' => 'text-align: center'])}}
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            {{Form::label('attending', 'Attendance')}}
                        </div>
                    </div>
                    <table class="table">
                        <tr>
                            <?php
                                $zero = ''; $one = ''; $two = '';
                                switch($user->attending){
                                    case 'Undecided':
                                        $zero = 'true';
                                        break;
                                    case 'Attending':
                                        $one = 'true';
                                        break;
                                    case 'Not Attending':
                                        $two = 'true';
                                        break;
                                }
                            ?>
                            <td style="text-align: center;">{{Form::radio('attending', 'Undecided', $zero)}} Undecided</td>
                                <td style="text-align: center;">{{Form::radio('attending', 'Attending', $one)}} Attending</td>
                            <td style="text-align: center;">{{Form::radio('attending', 'Not Attending', $two)}} Not Attending</td>
                        </tr>
                    </table>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            {{Form::label('plusOne', 'Plus One')}}
                        </div>
                    </div>
                    <table class="table">
                        <tr>
                            <?php
                            $zero = ''; $one = ''; $two = '';
                            switch($user->plusOne){
                                case 'Undecided':
                                    $zero = 'true';
                                    break;
                                case 'Just Me':
                                    $one = 'true';
                                    break;
                                case 'Include Guest':
                                    $two = 'true';
                                    break;
                            }
                            ?>
                            <td style="text-align: center;">
                                {{Form::radio('plusOne', 'Undecided', $zero, ['id' => 'undecidedButton', 'onclick' => 'hideGuests()'])}} Undecided
                            </td>
                            <td style="text-align: center;">
                                {{Form::radio('plusOne', 'Just Me', $one, ['id' => 'meButton', 'onclick' => 'hideGuests()'])}} Just Me
                            </td>
                            <td style="text-align: center;">
                                {{Form::radio('plusOne', 'Include Guest', $two, ['id' => 'includeButton', 'onclick' => 'showGuests()'])}} Include Guest/s
                            </td>
                        </tr>
                    </table>
                    <div class="row" id="plusOneGuestLabel">
                        <div class="col-md-12">
                            {{Form::label('guest1', "Your Guest's Name")}}
                        </div>
                    </div>
                    <div class="row" id="plusOneGuestField">
                        <div class="col-md-8 col-md-offset-2">
                            {{Form::text('guest1', $user->guest1, ['class' => 'form-control', 'style' => 'text-align: center'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div id="otherGuests" class="panel-group" style="text-align: center; padding-top: 5px;">
                                <div class='panel panel-default'>
                                    <div class='panel-heading' style="background: #D7ADFF;">
                                        <h4 class='panel-title'>
                                            <a data-toggle='collapse' href='#collapse1' style="color: white;">Click here to add others in your party (inc. children)</a>
                                        </h4>
                                    </div>
                                    <div id='collapse1' class='panel-collapse collapse'>
                                        <ul class='list-group'>
                                            <li class='list-group-item'>
                                                {{Form::label('guest2', "Additional Guest 1")}}
                                                {{Form::text('guest2', $user->guest2, ['class' => 'form-control', 'style' => 'text-align: center'])}}
                                            </li>
                                            <li class='list-group-item'>
                                                {{Form::label('guest3', "Additional Guest 2")}}
                                                {{Form::text('guest3', $user->guest3, ['class' => 'form-control', 'style' => 'text-align: center'])}}
                                            </li>
                                            <li class='list-group-item'>
                                                {{Form::label('guest4', "Additional Guest 3")}}
                                                {{Form::text('guest4', $user->guest4, ['class' => 'form-control', 'style' => 'text-align: center'])}}
                                            </li>
                                            <li class='list-group-item'>
                                                {{Form::label('guest5', "Additional Guest 4")}}
                                                {{Form::text('guest5', $user->guest5, ['class' => 'form-control', 'style' => 'text-align: center'])}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($user->plusOne == 'Include Guest')
                        <script>loadGuests();</script>
                    @else
                        <script>skipGuests();</script>
                    @endif
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Update Account', ['class' => 'btn btn-primary center-block'])}}
                {!! Form::close() !!}
                <br>
                <br>
                <br>
                <h3>Your Blog Posts</h3>
                @if(count($posts)>0)
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                <td>
                                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'center-block']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger center-block'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p>You have no posts</p>
                @endif
                    <a href="/posts/create" class="btn btn-primary center">Create Post</a>
            </div>
        </div>
    </div>
@endsection
