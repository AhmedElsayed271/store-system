<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'page')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/assets/dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/assets/dashboard/dist/css/adminlte.min.css') }}">
    @yield('style')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include    ('dashboard.includes.navbar')
        @include    ('dashboard.includes.sidebar')

        @yield('content');

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        @include    ('dashboard.includes.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('/assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/assets/dashboard/dist/js/adminlte.min.js') }}"></script>
    <script>
        const userId = "{{ Auth::id() }}";
    </script>
     <script>

         const userId = "{{ Auth::id() }}";
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('4676023b96ad930e1523', {
          cluster: 'eu'
        });
    
        var channel = pusher.subscribe('`App.Models.User.${userId}`');
        channel.bind('my-event', function(data) {
          alert(JSON.stringify(data));
        });
      </script>
    {{-- <script src="{{ asset('/js/pusher.js') }}"></script>
    {{ asset('/js/app.js')  }} --}}
    @yield('scripts')
</body>

</html>
