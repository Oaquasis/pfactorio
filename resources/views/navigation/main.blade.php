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

                        <hr class="nav-divider">


                        <!--Menu list item-->
                        <li {!! $route == "index" ? "class=\"active\"" : '' !!}>
                            <a href="{{ route('index') }}">Home</a>
                        </li>

                        @if(!Auth::check())
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            <hr class="nav-divider">
                        @endif

                        @if(Auth::check())
                            <hr class="nav-divider">
                            <!--Menu list item-->

                            <li {!! $route == "log" ? "class=\"active\"" : '' !!}>
                                <a href="{{ route('log') }}">Logviewer</a>
                            </li>
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
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
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