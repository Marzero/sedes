<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEDES</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ URL::to('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::to('admin/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ URL::to('admin/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ URL::to('admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ URL::to('admin/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ URL::to('admin/vendors/jqvmap/dist/jqvmap.min.css')}}">


    <link rel="stylesheet" href="{{ URL::to('admin/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    @yield('styles')

</head>

<body>


    <!-- Left Panel -->

    @include('base.sidebar')

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        @include('base.header')
        @include('flash::message')
        @yield('content')
      



            

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ URL::to('admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ URL::to('admin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ URL::to('admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::to('admin/assets/js/main.js')}}"></script>


    {{-- 
    <script src="{{ URL::to('admin/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{ URL::to('admin/assets/js/dashboard.js')}}"></script>
    <script src="{{ URL::to('admin/assets/js/widgets.js')}}"></script>
    <script src="{{ URL::to('admin/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{ URL::to('admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{ URL::to('admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
        --}}
        @yield('scripts')

</body>

</html>
