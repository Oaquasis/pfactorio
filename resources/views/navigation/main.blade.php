<?php
    $route = \Illuminate\Support\Facades\Route::currentRouteName();
?>
<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container">
    <div id="mainnav">

        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <ul id="mainnav-menu" class="list-group">

                        <!--Category name-->
                        <li class="list-header">Navigation</li>

                        <!--Menu list item-->
                        <li {!! $route == 'index' ? 'class="active-link"' : '' !!}>
                            <a href="{{ route('index') }}">
                                <i class="fal fa-home"></i>
                                <span class="menu-title">Home</span>
                            </a>
                        </li>

                        @if(!Auth::check())
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="fal fa-sign-in"></i>
                                    <span class="menu-title">Login</span>
                                </a>
                            </li>
                            <hr class="nav-divider">
                        @endif

                        @if(Auth::check())
                            <!--Menu list item-->

                            <li {!! $route == 'log' ? 'class="active-link"' : '' !!}>
                                <a href="{{ route('log') }}">
                                    <i class="fal fa-file-alt"></i>
                                    <span class="menu-title">Logviewer</span>
                                </a>
                            </li>
                            <li {!! preg_match('/^(server|modpack|mod)(.*)/i',$route) ? 'class="active-sub active"' : ''!!}>
                                <a href="#">
                                    <i class="fal fa-unlock-alt"></i>
                                    <span class="menu-title">Admin</span>
                                    <i class="arrow"></i>
                                </a>

                                <ul class="collapse">
                                    <li {!! $route == 'server.index' ? 'class="active-link"' : '' !!}>
                                        <a href="{{ route('server.index') }}">
                                            <i class="fal fa-server"></i>
                                            <span class="menu-title">Servers</span>
                                        </a>
                                    </li>
                                    <li {!! $route == 'modpack.index' ? 'class="active-link"' : '' !!}>
                                        <a href="{{ route('modpack.index') }}">
                                            <i class="fal fa-file-archive"></i>
                                            <span class="menu-title">Modpacks</span>
                                        </a>
                                    </li>
                                    <li {!! $route == 'mod.index' ? 'class="active-link"' : '' !!}>
                                        <a href="{{ route('mod.index') }}">
                                            <i class="fal fa-file"></i>
                                            <span class="menu-title">Mods</span>
                                        </a>
                                    </li>
                                    <li {!! $route == 'oauth' ? 'class="active-link"' : '' !!}>
                                        <a href="{{ route('oauth') }}">
                                            <span class="fa-stack ">
                                                <i class="fal fa-rectangle-wide fa-stack-1x"></i>
                                                <i class="fal fa-ellipsis-h fa-stack-1x"></i>
                                            </span>
                                            <span class="menu-title">Oauth Tokens</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            @if(Auth::check())
                                <li {!! $route == 'profile' ? 'class="active-link"' : '' !!}>
                                    <a href="#">
                                        <i class="fal fa-file"></i>
                                        <span class="menu-title">Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fal fa-sign-out"></i>
                                        <span class="menu-title">Sign out</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
<!--===================================================-->
<!--END MAIN NAVIGATION-->