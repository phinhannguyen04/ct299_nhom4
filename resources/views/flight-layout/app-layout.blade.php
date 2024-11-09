<!doctype html>
<html class="no-js" lang="zxx">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>GALAXY</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="/assets/img/logo/">

        <!-- all css here -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugin.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <script src="{{ asset('assets\js\vendor\modernizr-2.8.3.min.js') }}"></script>
    </head>

    <body>
        <header class="pos_page_inner">

            @include('layouts.navbar')
            
        </header>
        <!--pos page start-->
        <main class="pos_page">
            {{ $slot }}
        </main>

        <!--pos page end-->
        <!--footer area start-->
        @include('layouts.footer')
        <!--footer area end-->

        <!-- all js here -->
        <script src="{{ asset('assets\js\vendor\jquery-1.12.0.min.js') }}"></script>
        <script src="{{ asset('assets\js\popper.js') }}"></script>
        <script src="{{ asset('assets\js\bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets\js\ajax-mail.js') }}"></script>
        <script src="{{ asset('assets\js\plugins.js') }}"></script>
        <script src="{{ asset('assets\js\main.js') }}"></script>
    </body>

</html>
