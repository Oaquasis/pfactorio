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
                        <li {!! $route == "index" ? "class=\"active\"" : '' !!}>
                            <a href="{{ route('index') }}">Home</a>
                        </li>
                        <li {!! $route == "log" ? "class=\"active\"" : '' !!}>
                            <a href="{{ route('log') }}">Logviewer</a>
                        </li>

                        @if(Auth::check())
                            <!--Menu list item-->
                            <li>
                                <a href="#">
                                    <span class="menu-title">Admin</span>
                                    <i class="arrow"></i>
                                </a>

                                <ul class="collapse">
                                    <li><a href="">Servers</a></li>

                                </ul>
                            </li>
                            <!--Menu list item-->
                            <li>
                                <a href="{{ route('logout') }}">Logout</a>
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