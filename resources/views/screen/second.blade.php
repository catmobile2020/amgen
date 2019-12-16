<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Amgen - Hematology, Oncology">
    <title>Amgen | Current Question</title>
    <!-- Site favicon -->
    <link rel='shortcut icon' type='image/x-icon' href='{{URL::asset('images/fav.ico')}}' />
    <!-- /site favicon -->

    <!-- Entypo font stylesheet -->
    <link href="{{URL::asset('css/entypo.css')}}" rel="stylesheet">
    <!-- /entypo font stylesheet -->

    <!-- Font awesome stylesheet -->
    <link href="{{URL::asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- /font awesome stylesheet -->

    <!-- Bootstrap stylesheet min version -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- /bootstrap stylesheet min version -->

    <!-- Mouldifi core stylesheet -->
    <link href="{{URL::asset('css/mouldifi-core.css')}}" rel="stylesheet">
    <!-- /mouldifi core stylesheet -->

    <link href="{{URL::asset('css/mouldifi-forms.css')}}" rel="stylesheet">
    <style>
        .login-branding {
            margin: auto;
            padding: 0;
            width:200px;
        }
    </style>
    <!-- Bootstrap RTL stylesheet min version -->
{{--<link href="css/bootstrap-rtl.min.css" rel="stylesheet">--}}
<!-- /bootstrap rtl stylesheet min version -->

    <!-- Mouldifi RTL core stylesheet -->
{{--<link href="css/mouldifi-rtl-core.css" rel="stylesheet">--}}
<!-- /mouldifi rtl core stylesheet -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('js/html5shiv.min.js') }}"></script>
    <script src="{{URL::asset('js/respond.min.js')}}"></script>
    <![endif]-->

    <!--[if lte IE 8]>
    <script src="{{URL::asset('js/plugins/flot/excanvas.min.js')}}"></script>
    <![endif]-->

    <![endif]-->

</head>
<body class="login-page">
<div class="container">
    <div class="login-branding">
        <a href="#"><img src="images/logo.png" alt="Amgen" title="Amgen"></a>
    </div>
    <div class="container text-center">


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div>
                        <h1 id="team_name">Question</h1>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="question">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

</div>
</div>

<!--Load JQuery-->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
        cluster: 'eu',
        forceTLS: true
    });

    var channel_team = pusher.subscribe('teamChannel');
    channel_team.bind('App\\Events\\AnswerEvent', function(data) {
        let team = data.team;
        $('#team_name').html(`[ `+ team.name +` ]`);
    });

    var channel = pusher.subscribe('QuestionChannel');
    channel.bind('App\\Events\\QuestionEvent', function(data) {
        let question = data.question;
        let element=`
                        <p class="text-info"><i class="fa fa-newspaper-o"></i> `+question.title+`</p>
            `;
        $.each(question.answers,function (answer,value) {
            element+=`<div class="well">
<h3 class="title">`+value['answer']+`</h3>
</div>`;
        });
        $('#question').html(element);
    });

</script>

<style>
    
    .well {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #ffffff;
        border-radius: 20px;
-webkit-box-shadow: 2px 12px 5px -9px rgba(0,0,0,0.16);
-moz-box-shadow: 2px 12px 5px -9px rgba(0,0,0,0.16);
box-shadow: 2px 12px 5px -9px rgba(0,0,0,0.16);
}
    h3 {
        margin : 0px;
    }
    .panel-default {
        border-radius: 20px;
        padding-top: 20px;
    }
    #question p {
     display: inline-block;
    padding: 10px;
    background-color: #fafafa;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 20px;
    font-size: 24px;
    }
   h1#team_name {
    position: relative;
    left: 0px;
    right: 0px;
    z-index: 999;
    background-color: #2162a6;
    display: inline-table;
    margin: auto;
    margin-top: -21px;
    padding: 20px;
    color: #fff;
    -webkit-border-bottom-right-radius: 20px;
    -webkit-border-bottom-left-radius: 20px;
    -moz-border-radius-bottomright: 20px;
    -moz-border-radius-bottomleft: 20px;
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;
}
</style>

</body>
</html>