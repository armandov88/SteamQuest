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
                    <div class="panel-body">
                        <p>
                            Welcome, {{ $player->personaName }}
                            <br>
                            This your dashboard, this is where you can set your LFG status and view your created groups 
                            or to monitor what groups you've been invited to.
                            <br>
                            <a href="#">Looking For Group</a>
                            <br>
                            <a href="#">Looking For More</a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
