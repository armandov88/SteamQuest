@extends('layouts.app')
@section('content')
    <div class="col-md-9 col-md-offset-3">
        <h1> {{ $group->group_name }}</h1>
        <h4> Creator: <a href="/u/{{ $group->creator_id }}">{{ $group->creator_name }}</a></h4>
        <p> {{ $group->description }}</p>
    </div>

@endsection