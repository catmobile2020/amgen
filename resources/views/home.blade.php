@extends('layouts.master')
@section('title')Statistics @endsection
@section('styles')
    <style>
        .dangers{
            color: #ffffff !important;
            background-color: #db2c2c !important;
            border-color: #bb3038 !important;
        }
        .primary {
            color: #ffffff !important;
            background-color: #3276B1 !important;
            border-color: #184a76 !important
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Statistics</div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="col-lg-6 col-md-6">
                                <div class="panel minimal panel-default">
                                    <div class="panel-heading primary clearfix">
                                        <div class="panel-title">All teams</div>
                                    </div>
                                    <!-- panel body -->
                                    <div class="panel-body">
                                        <div class="stack-order">
                                            <h1 class="no-margins">{{ $all_users }}</h1>
                                            <small>Number of All teams</small>
                                        </div>
                                        <div class="bar-chart-icon"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="panel minimal panel-default">
                                    <div class="panel-heading primary clearfix">
                                        <div class="panel-title">All Questions</div>
                                    </div>
                                    <!-- panel body -->
                                    <div class="panel-body">
                                        <div class="stack-order">
                                            <h1 class="no-margins">{{ $deact_users }}</h1>
                                            <small>Number of All Questions</small>
                                        </div>
                                        <div class="bar-chart-icon"></div>
                                    </div>
                                </div>
                            </div>





                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: 'eu',
            forceTLS: true
        });

        var channel = pusher.subscribe('startExam');
        channel.bind('App\\Events\\StartEvent', function(data) {
            console.log(JSON.stringify(data));
        });
        
    </script>
@endsection
