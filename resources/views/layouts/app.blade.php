<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <style type="text/css">
        body {

        /* Ubicación de la imagen */

        background-image: url("{{asset('assets/img/p_big3.jpg')}}");

        /* Para dejar la imagen de fondo centrada, vertical y horizontalmente */

        background-position: center center;

        /* Para que la imagen de fondo no se repita */

        background-repeat: no-repeat;

        /* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */

        background-attachment: fixed;

        /* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */

        background-size: cover;

        /* Se muestra un color de fondo mientras se está cargando la imagen de fondo o si hay problemas para cargarla */

        background-color: #66999;

        }

        @media only screen and (max-width: 767px) {
            body {
                background-position: center center;
                background-repeat: no-repeat;
                background: url("{{asset('assets/img/p5.jpg')}}");
            }
    </style>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cache-control" content="max-age-0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="cache-control" content="no-store"/>
    <meta http-equiv="cache-control" content="must-revalidate"/>
    <meta http-equiv="expieres" content="0"/>
    <meta http-equiv="expieres" content="Tue, 01 Jan 1980 1:00:00 GMT"/>
    <meta http-equiv="pragma" content="no-cache"/>
    

    <title>Inicio</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->

    <!-- Styles -->


    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="gray-bg">
            @yield('content')


    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
