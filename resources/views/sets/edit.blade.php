@extends('layouts.master')
@section('title') Edit {{ $set->name }} @endsection
@section('styles')
    <style>
        .select{
            height: 39px !important;
        }
    </style>
@endsection
@section('content')





    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{ $set->name }}</div>
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
                    {!! Form::model($set, ['route'=>['sets.update', $set->id], 'method'=>'PATCH', 'enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['placeholder'=>'Please enter set name ...', 'class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('type', 'Type') !!}
                            {!! Form::text('type', null, ['placeholder'=>'Please enter set type ...', 'class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('level', 'Level') !!}
                            {!! Form::select('level',
                             ['1'=>'Low level', '2'=>'MID level', '3'=>'High level'],
                              $set->level ,
                               ['placeholder'=>'Please select level ...',
                                'class'=>'form-control select']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('team_id', 'Teams') !!}
                            {!! Form::select('team_id',
                             $teams,$set->team_id,
                               ['placeholder'=>'Please select team ...',
                                'class'=>'form-control select']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_id', 'Categories') !!}
                            {!! Form::select('category_id',
                             $categories,$set->category_id,
                               ['placeholder'=>'Please select team ...',
                                'class'=>'form-control select']) !!}
                        </div>



                    {!! Form::submit('Update set' , ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection


