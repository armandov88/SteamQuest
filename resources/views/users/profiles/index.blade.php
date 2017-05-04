@extends('layouts.app')
@section('content')
    
    <ul>
        @foreach($listUsers as $user)
            <li><img src="{{ $player->avater }}"/> {{ $user->personaName }}</li>
        @endforeach
    </ul>
@endsection