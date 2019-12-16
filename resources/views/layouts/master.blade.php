
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('pageDescription')">
    <meta name="keywords" content="@yield('Keywords')">
    <title>
        @yield('title') | CatDigital
    </title>
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

    @yield('styles')
</head>
<body>

<!-- Page container -->
<div class="page-container">

    <!-- Page Sidebar -->
    @include('layouts.sidebar')
    <!-- /page sidebar -->

    <!-- Main container -->
    <div class="main-container gray-bg">

        <!-- Main header -->
        <div class="main-header row">
            <div class="col-sm-6 col-xs-7">

                <!-- User info -->
                <ul class="user-info pull-left">
                    <li class="profile-info"><a href="#"> <img width="44" class="img-circle avatar" alt="" src="{{URL::asset('images/logo4.png')}}"> {{ Auth::user()->name }}</a>



                    </li>
                </ul>
                <!-- /user info -->

            </div>


        </div>
        <!-- /main header -->

        <!-- Main content -->
        <div class="main-content">
            @yield('content')
            <!-- Footer -->
            <footer class="footer-main">
                &copy; 2019 <strong>CatSoftware</strong> Amgen Oncology by <a target="_blank" href="#/">CAT</a>
            </footer>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /main container -->

</div>
<!-- /page container -->

<!--Load JQuery-->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/plugins/metismenu/jquery.metisMenu.js')}}"></script>
<script src="{{URL::asset('js/plugins/blockui-master/jquery-ui.js')}}"></script>
<script src="{{URL::asset('js/plugins/blockui-master/jquery.blockUI.js')}}"></script>

@yield('scripts')
<script src="{{URL::asset('js/functions.js')}}"></script>
<script>
    $(document).on('click','.startBtn',function (e) {
        e.preventDefault();
        let self =$(this);
        $.ajax({
            url:self.closest('a').attr('href'),
            success:function (result) {
                $('#startBtnMessage').removeClass('sr-only')
            }
        });
    });
</script>
</body>
</html>
