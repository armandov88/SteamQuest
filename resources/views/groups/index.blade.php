@extends('layouts.app')

@section('content')

<div class="col-md-6 col-md-offset-3">
    <div class="table table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th> Group Name </th>
                    <th> Group Creator </th>
                    <th> Game </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td><a href="/g/{{ $group->id }}">{{ $group->group_name }}</a></td>
                        <td><a href="/u/{{ $group->creator_id }}">{{ $group->creator_name }}</a></td>
                        <td>{{ $group->app_name }}</td>
                    </tr>
                @endforeach
        </table>

    </div>
</div>

@endsection