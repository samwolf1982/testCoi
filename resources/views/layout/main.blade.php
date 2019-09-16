<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="DevBest">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>App Name - @yield('title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">


    <!-- jQuery -->
    <script src="/ui-ecommerce/js/jquery-2.0.0.min.js" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="/ui-ecommerce/css/bootstrap.css" rel="stylesheet" type="text/css"/>

    <!-- Font awesome 5 -->
{{--    <link href="/ui-ecommerce/fonts/fontawesome.css" type="text/css" rel="stylesheet">--}}
    <link href="/ui-ecommerce/fonts/fontawesome-all.css" type="text/css" rel="stylesheet">

    <!-- plugin: fancybox  -->
    <script src="/ui-ecommerce/js/plugins/fancybox/fancybox.min.js" type="text/javascript"></script>
    <link href="/ui-ecommerce/css/plugins/fancybox/fancybox.min.css" type="text/css" rel="stylesheet">

    <!-- plugin: owl carousel  -->
    <link href="/ui-ecommerce/css/plugins/owlcarousel/owl.carousel.css" rel="stylesheet">
    <link href="/ui-ecommerce/css/plugins/owlcarousel/owl.theme.default.css" rel="stylesheet">
    <script src="/ui-ecommerce/js/plugins/owlcarousel/owl.carousel.js"></script>

    <!-- custom style -->
    <link href="/ui-ecommerce/css/ui.css" rel="stylesheet" type="text/css"/>
    <link href="/ui-ecommerce/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

    <!-- custom javascript -->
    <script src="/ui-ecommerce/js/script.js" type="text/javascript"></script>
{{--    <script src="/js/app.js" type="text/javascript"></script>--}}

    <script type="text/javascript">

        // jquery ready start
        $(document).ready(function() {
            // jQuery code

        });


        var reloadPageAndSetCookie=function (cookie,val) {
            setCookie(cookie,val,1);
            document.location.reload(true);
        }
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }



        // /// remove images
        // goods.images.remove
        // function removeImages() {
        //
        // }

        // jquery end
    </script>
</head>
<body>

@include('includes.header')

@yield('content')

@include('includes.footer')

</body>
{{--Vue not use--}}
{{--<script src="js/app.js" type="text/javascript"></script>--}}
</html>
