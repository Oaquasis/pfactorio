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
                        <!--Menu list item-->
                        <!--<li>
                            <a href="#">
                                <i class="pli-home"></i>
                                <span class="menu-title">Dashboard</span>
                                <i class="arrow"></i>
                            </a>

                            <ul class="collapse">
                                <li class="active-link"><a href="">Dashboard 1</a></li>
                                <li><a href="dashboard-2.html">Dashboard 2</a></li>
                                <li><a href="dashboard-3.html">Dashboard 3</a></li>

                            </ul>
                        </li>-->
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