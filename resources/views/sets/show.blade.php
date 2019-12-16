@extends('layouts.master')
@section('title') {{ $voter->name }} Log @endsection
@section('styles')
    <!--Summernote-->
    <link href="{{URL::asset('css/plugins/summernote/summernote.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div style="color: #1f648b; text-align: center">
                        <h2>Name: {{$voter->name}}</h2>
                    </div>
                    <hr>
                    @foreach($questions as $question)
                        <h2>{{$question->title}}</h2>
                        <div>
                            @foreach($question->answers as $answer)
                                @if($voter->answers()->where('question_id', $question->id)->where('answer_id', $answer->id)->first())
                                    <p> {{ $answer->answer }} </p>
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!--Summernote Editor-->
    <script src="{{URL::asset('js/plugins/summernote/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['fontsize', 'bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['color', ['color']],
                    ['para', ['style', 'ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['Misc', ['fullscreen', 'codeview', 'undo', 'redo']],
                    ['insert', ['table', 'hr']]
                ],
                height: 260,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true                  // set focus to editable area after initializing summernote
            });

            $('.ui-helper-hidden-accessible').hide();


        });



    </script>
@endsection
