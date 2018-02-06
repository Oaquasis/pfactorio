<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test site</title>
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/fontawesome.css" rel="stylesheet">

    <!--Nifty Premium Icons [OPTIONAL]
    <link href="css/premium-line-icons.min.css" rel="stylesheet">-->

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="/css/plugins/pace.min.css" rel="stylesheet">
    <script src="/js/pace.min.js"></script>

    @yield('head')
</head>

<body>
    <div id="container" class="effect boxed-layout aside-float aside-bright mainnav-lg">

    @yield('navigation.top')

      <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
          @yield('header')

          <!--Page content-->
          <!--===================================================-->
          <div id="page-content">
            @yield('content')
          </div>
          <!--===================================================-->
          <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->
        @yield('navigation.main')
      </div>

      <!-- FOOTER -->
      <!--===================================================-->
      @yield('content-footer')
      <!--===================================================-->
      <!-- END FOOTER -->


      <!-- SCROLL PAGE BUTTON -->
      <!--===================================================-->
      <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
      </button>
      <!--===================================================-->



        <notification></notification>
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


    <!--JAVASCRIPT-->
    <!--=================================================-->

    {{--<!--Application JS [ RECOMMENDED ]-->--}}
    {{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}

    <script src="/js/app.js"></script>

    {{--<!--BootstrapJS [ RECOMMENDED ]-->--}}
    {{--<script src="/js/bootstrap.min.js"></script>--}}

    {{--<!--Popper [ RECOMMENDED ]-->--}}
    {{--<script src="/js/popper.js"></script>--}}

    {{--<!--Pace [ RECOMMENDED ]-->--}}
    {{--<script src="/js/pace.min.js"></script>--}}

    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="/js/nifty.min.js"></script>
    @yield('footer')
    </body>
</html>