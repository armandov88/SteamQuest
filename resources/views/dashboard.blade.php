@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="player-dashboard">
                    <div class="playerStats">
                        {!! $steamInfo->avatarFull !!}
                        <div class="vitals">
                            <span class="label">Steam Level:</span>{{ $steamLevel }}
                            <span class="label">Status:</span>{!! $steamInfo->personaState !!}
                        </div>
                    </div>
                    <p>
                        Welcome, {{ $player->personaName }}
                        
                        <br>
                        This your dashboard, this is where you can set your LFG status and view your created groups 
                        or to monitor what groups you've been invited to.
                        <br>
                        <a href="/g">Search for Groups</a>
                        <br>
                        <a href="/g/create">Create a Group</a>

                    </p>
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">Active Groups:</div>
                            <div class="table-responsive">
                                 <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Group Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                        @foreach($groups as $group)
                                        <tr>
                                            <td> {{ $group->id }} </td>
                                            <td> <a href="/g/{{$group->id}}">{{ $group->group_name }}</a></td>
                                            <td><div class="btn btn-success"><a href="{{ route('g.edit', $group->id) }}"> Edit</a></div></td>
                                            <td>
                                                {!! Form::open(['route'=>['g.destroy']]) !!}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button>Delete User</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach

                               
                                    </tbody>
                                </table>
                            </div>
                            <ul>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection