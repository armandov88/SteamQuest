@extends('layouts.app')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        {!! Form::model($group, ['method' => 'PATCH', 'action' => ['GroupsController@update',$group->id]]) !!}
      
        <div class="form-group">
                {!! Form::label('group_name', 'Group Name:') !!}
                {!! Form::text('group_name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
                {!! Form::label('app_name', 'Select Game:') !!}
                {!! Form::select('app_name', $gameList) !!}
        </div>

        <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-2 col-md-offset-5">
            {!! Form::submit('Create Group', ['class' => 'btn btn-primary form-control']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection

