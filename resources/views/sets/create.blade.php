@extends('layouts.master')
@section('title') Create set @endsection
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
            <div class="panel-heading">
                <h2>Add new set</h2>
            </div>
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
        {!! Form::open(['route'=>'sets.store', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
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
          1 ,
           ['placeholder'=>'Please select level ...',
            'class'=>'form-control select']) !!}
                    </div>
                    <div class="form-group">
                {!! Form::label('team_id', 'Teams') !!}
                {!! Form::select('team_id',
                 $teams,null,
                   ['placeholder'=>'Please select team ...',
                    'class'=>'form-control select']) !!}
                    </div>
                    <div class="form-group">
                {!! Form::label('category_id', 'Categories') !!}
                {!! Form::select('category_id',
                 $categories,null,
                   ['placeholder'=>'Please select Category ...',
                    'class'=>'form-control select']) !!}
                    </div>

                {!! Form::submit('Add new set' , ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
