<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title') Advertiser</title> 
    <link rel="icon" type="image/ico" href="" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">        

    <!-- ============================================
    ================= Stylesheets ===================
    ============================================= -->

    <!-- project main css files -->
    {{ Html::style('dist/css/main.css') }}

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>