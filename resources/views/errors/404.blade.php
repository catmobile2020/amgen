<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Amgen - Not found">
    <title>Amgen | 404 Page</title>
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
<body class="page-error">
<div class="page-error-container">
    <div class="page-error-content">
        <div class="error-code">404</div>
        <h4 class="text-center title">Oops, an error has occurred. Page not found!</h4>
        <form>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" placeholder="Enter keyword..." class="form-control input-lg">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <p class="text-center"><a href="index.html" class="btn btn-primary"> Go to dashboard</a></p>
    </div>
</div>
<!-- /page container -->

<!--Load JQuery-->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
