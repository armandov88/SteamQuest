@extends('layouts.app')
@section('content')
    <div class="col-md-9 col-md-offset-2">
    <h1 class="text-center"> Users</h1>
    <p>Here is a list of users that are currently looking for a group. You can view their public profile and browse the games they own.</p>
        <ul>
            @foreach($listUsers as $user)
                <li><img src="{{ $user->avatar }}"/> <a href="/u/{{ $user->id }}">{{ $user->personaName }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection