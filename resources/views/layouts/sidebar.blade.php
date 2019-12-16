<div class="page-sidebar">

    <!-- Site header  -->
    <header class="site-header">
        <div class="site-logo"><a href="index.html">
                <img src="{{URL::asset('images/logo.png')}}" width="198" alt="Amgen" title="Amgen">
            </a></div>
        <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
        <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
    </header>
    <!-- /site header -->

    <!-- Main navigation -->
    <ul id="side-nav" class="main-menu navbar-collapse collapse">

        <li><a href="{{ route('home') }}"><i class="icon-gauge"></i><span class="title">Dashboard</span></a>
        </li>
{{--        <li><a href="{{ route('start.push') }}" class="startBtn"><i class="icon-play"></i><span class="title">Start Game</span></a>--}}
{{--        </li>--}}
{{--        <li class="sr-only" id="startBtnMessage">--}}
{{--            <div class="alert alert-success">--}}
{{--                Start Successfully--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="has-sub"><a href="#"><i class="icon-bookmark"></i><span class="title">Teams</span></a>
            <ul class="nav collapse">
                <li><a href="{{ route('teams.index') }}"><span class="title">All teams</span></a></li>
                <li><a href="{{ route('teams.create') }}"><span class="title">Add new team</span></a></li>
            </ul>
        </li>
        <li class="has-sub"><a href="#"><i class="icon-docs"></i><span class="title">Sets</span></a>
            <ul class="nav collapse">
                <li><a href="{{ route('sets.index') }}"><span class="title">All sets</span></a></li>
                <li><a href="{{ route('sets.create') }}"><span class="title">Add new set</span></a></li>
            </ul>
        </li>
       <li class="has-sub"><a href="#"><i class="icon-monitor"></i><span class="title">Screens</span></a>
            <ul class="nav collapse">
                <li><a href="{{ route('screen.first') }}"><span class="title">Team score</span></a></li>
                <li><a href="{{ route('screen.current') }}"><span class="title">Current question</span></a></li>
            </ul>
        </li>
        {{--<li class="has-sub"><a href="#"><i class="icon-adjust"></i><span class="title">Questions</span></a>--}}
            {{--<ul class="nav collapse">--}}
                {{--<li><a href="{{ route('question.index') }}"><span class="title">Questions</span></a></li>--}}
                {{--<li><a href="{{ route('question.create') }}"><span class="title">Add new question</span></a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        
        <li><a href="{{ route('reset-data') }}"><i class="icon-user"></i><span class="title">Reset Data</span></a>
        </li>

        <li>@if (Auth::guest())
                <a href="{{ route('login') }}">Login</a>
            @else

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="icon-logout"></i>
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

        @endif

    </ul>
    <!-- /main navigation -->
</div>
