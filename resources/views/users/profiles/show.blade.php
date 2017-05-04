@extends('layouts.app')

@section('content')
    <div class="col-md-9 col-md-offset-2">
        <a href="https://steamcommunity.com/id/{{ $steamProfile->personaName }}"><h1>{{$steamProfile->personaName}}</h1></a>
        {!! $steamProfile->avatarFull !!}
        <div class="vitals">
            <span class="label">Steam Level:</span>{{ $level }}
            <span class="label">Status:</span> {!! $steamProfile->personaState !!}
        </div>
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

@endsection