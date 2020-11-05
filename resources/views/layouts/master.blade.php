<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">


        <title>@section('title')Gaber @show</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('dashboard/favicon.ico') }}" type="image/x-icon">

        @include('partials.styles')
        <link rel="stylesheet" href="{{ asset("dashboard/style.css") }}">

        @yield('style')

    </head>

    <body class="hold-transition sidebar-mini layout-fixed">

        <!-- Page Loader -->
        <div id="loader">
            <div></div>
        </div>
        <!-- Page Loader -->

        <div class="wrapper" id="app">

            @include('partials.navbar')

            @include('partials.aside')

            {{-- <div class="content-wrapper"> --}}

            {{-- @yield('content') --}}

            <router-view></router-view>

            {{-- </div> --}}

            @include('partials.footer')

            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>

        <script src="{{ asset("dashboard/script.js") }}"></script>
        @include('partials.scripts')
        <script src="{{ asset("dashboard/app.js") }}"></script>

        @yield('script')

        <script>
            $(function() {
            	$("#loader").fadeOut("slow");;
            });
        </script>

    </body>

</html>