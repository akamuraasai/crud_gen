<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>CRUDGen - CRUD Generator for Laravel 5.x.</title>
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/reset.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/site.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/container.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/grid.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/header.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/image.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/menu.css">

    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/icon.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/input.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/button.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/checkbox.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/divider.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/form.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/label.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/message.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/segment.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/list.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/transition.css">
    <link rel="stylesheet" type="text/css" href="/crudgen/build/components/popup.css">

    <style type="text/css">
        ::-webkit-scrollbar {
            width: 4px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background: rgba(255,255,255,0.8);
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
        }
        ::-webkit-scrollbar-thumb:window-inactive {
            background: rgba(255,255,255,0.4);
        }
    </style>
    @yield('css-especifico')

    <script src="/crudgen/js/all.js"></script>
    <script src="/crudgen/js/jquery.easing.min.js"></script>
    <script src="/crudgen/build/components/visibility.js"></script>
    <script src="/crudgen/build/components/sidebar.js"></script>
    <script src="/crudgen/build/components/dropdown.js"></script>
    <script src="/crudgen/build/components/popup.js"></script>
    <script src="/crudgen/build/components/form.js"></script>
    <script src="/crudgen/build/components/transition.js"></script>
</head>
<body>

@yield('content')

</body>
</html>