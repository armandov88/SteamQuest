@extends('layouts.app')
@section('content')
    <div class="col-md-6 col-md-offset-3">
    <h1 class="text-center"> Users</h1>
    <p>Here is a list of users that are currently looking for a group. You can view their public profile and browse the games they own.</p>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th> Player Name: </th>
                    <th> Profile: </th>
                </tr>
            </thead>
            <tbody>
                @foreach($listUsers as $user)
                    <tr>
                        <td><img src="{{ $user->avatar }}"/> <a href="/u/{{ $user->id }}">{{ $user->personaName }}</a></td>
                        <td><button class="btn btn-primary"> <a href="https://steamcommunity.com/id/{{ $user->personaName }}">View Steam Profile</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>
    </div>
@endsection