@extends('layouts.master')
@section('title') Edit {{ $team->name }} @endsection
@section('content')





    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{ $team->name }}</div>
                <div class="panel-body">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Errors !</strong><br>
                            @foreach($errors->all() as $error)
                                {{ $error }} <br/>
                            @endforeach
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::model($team, ['route'=>['teams.update', $team->id], 'method'=>'PATCH', 'enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['placeholder'=>'Enter team name ', 'class'=>'form-control']) !!}
                    </div>



                    {!! Form::submit('Update team' , ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection


