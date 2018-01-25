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

                    @if(Auth::user())
                    <div id="mainnav-shortcut" class="">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3 col-xs-offset-3" data-content="My Profile" data-original-title="" title="">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-xs icon-circle bg-mint">
                                        <i class="fal fa-user-circle" style="font-size:1.25em"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Sign out" data-original-title="" title="">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-xs icon-circle bg-purple">
                                        <i class="fal fa-sign-out" style="font-size:1.25em"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif

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
                            <li {!! $route == 'server.index' ? 'class="active-sub active"' : ''!!}>
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
                                </ul>
                            </li>
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