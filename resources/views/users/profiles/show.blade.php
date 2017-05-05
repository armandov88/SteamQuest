@extends('layouts.app')

@section('content')
    <div class="col-md-9 col-md-offset-2">
        <div class="profile-heading">
            <a href="https://steamcommunity.com/id/{{ $steamProfile->personaName }}"><h1>{{$user->personaName}}</h1></a>
            {!! $steamProfile->avatarFull !!}
            <div class="vitals">
                <span class="label">Steam Level:</span>{{ $level }}
                <span class="label">Status:</span> {!! $steamProfile->personaState !!}
            </div>
        </div>
        <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-heading">Currently looking for:</div>
            
                <table class="table">
                    <thead>
                        <tr>
                            <th> Group Name:</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->group_name }}</li>
                                <td><button class="btn btn-primary"> <a href="/g/{{$group->id}}">View Group</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Games Owned - (Total: {{ count($playerGames) }})
                <!-- Collapsed Hamburger -->
                <button type="button" class="games-list-toggle collapsed btn btn-primary" data-toggle="collapse" data-target="#games-list-collapse">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                </button>
                </div>
            <div class="games-list collapse" id="games-list-collapse">
            <ul>
                @foreach($playerGames as $game)
                    <li><img src="{{ $game->icon }}"/> {{ $game->name }}</li>
                @endforeach
            </ul>
            </div>
        </div>
    </div>

@endsection