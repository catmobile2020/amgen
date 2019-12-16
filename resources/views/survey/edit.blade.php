@extends('layouts.master')
@section('title') Edit {{ $question->title }} @endsection
@section('content')





    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{ $question->title }}</div>
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
                    {!! Form::model($question, ['route'=>['question.update', $question->id], 'method'=>'PATCH', 'enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Question') !!}
                        {!! Form::text('title', null, ['placeholder'=>'Enter question ', 'class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('score', 'Score') !!}
                        {!! Form::text('score', null, ['placeholder'=>'Enter score ', 'class'=>'form-control']) !!}
                    </div>


                    {!! Form::submit('Update question' , ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script src="{{URL::asset('js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#date-popup').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                todayHighlight: false,
                format: "yyyy-mm-dd",
                startDate: '+7d',
            });


            $(".select2").select2();
        });

    </script>

@endsection
