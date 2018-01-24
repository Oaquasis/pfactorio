<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>PFactorio - Login</title>
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/fontawesome.css" rel="stylesheet">

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="/css/plugins/pace.min.css" rel="stylesheet">
    <script src="/js/pace.min.js"></script>

    @yield('head')
</head>

<body>
    <div id="container" class="cls-container bg-primary">

        <div id="bg-overlay"></div>

        @yield('form')

    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="/js/jquery.min.js"></script>

    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="/js/bootstrap.min.js"></script>

    <!--Popper [ RECOMMENDED ]-->
    <script src="/js/popper.js"></script>

    <!--Pace [ RECOMMENDED ]-->
    <script src="/js/pace.min.js"></script>

    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="/js/nifty.min.js"></script>

    <!--=================================================-->
    </body>
</html>