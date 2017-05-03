@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="player-dashboard">
                    <div class="playerStats">
                        {!! $player->avatarFull !!}
                        <div class="vitals">
                            <span class="label">Steam Level:</span>{{ $steamLevel }}
                            <span class="label">Status:</span> {!! $player->personaState !!}
                        </div>
                    </div>
                    <p>
                        Welcome, {{ $player->personaName }}
                        
                        <br>
                        This your dashboard, this is where you can set your LFG status and view your created groups 
                        or to monitor what groups you've been invited to.
                        <br>
                        <a href="#">Search for Groups</a>
                        <br>
                        <a href="#">Create a Group</a>

                    </p>
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">Games Owned - (Total: {{ count($playerGames) }})</div>
                            <div class="games-list">
                            <ul>
                                @foreach($playerGames as $game)
                                    <li><img src="{{ $game->icon }}"/> {{ $game->name }}</li>
                                @endforeach
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
