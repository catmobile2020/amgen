@extends('layouts.master')
@section('title') Create New Question @endsection
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
            <div class="panel-heading">Add New Question</div>
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
        {!! Form::open(['route'=>'question.store', 'method'=>'POST']) !!}
                    <div class="form-group">
        {!! Form::label('title', 'Question') !!}
        {!! Form::text('title', null, ['placeholder'=>'Question....', 'class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
        {!! Form::label('score', 'Score') !!}
        {!! Form::text('score', null, ['placeholder'=>'Score points....', 'class'=>'form-control']) !!}
                    </div>
                    @if(!$set->id)
                    <div class="form-group">
                        {!! Form::label('set_id', 'Set') !!}
                        {!! Form::select('set_id',
                         $sets,$set->id,
                           ['placeholder'=>'Please select Set ...',
                            'class'=>'form-control select']) !!}
                    </div>
                    @else
                        {!! Form::hidden('set_id', $set->id ) !!}

                    @endif

                {!! Form::submit('Add Question' , ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
