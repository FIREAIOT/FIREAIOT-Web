<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="{{ asset("images/fav.png") }}" />

        <!-- SEO -->
        <title>FIREAIOT</title>
        <meta name="author" content="Saleem Hadad">
        <meta name="description" content="FIREAIOT">
        <meta name="keywords" content="iot, embedded systems">
        <link rel="canonical" href="{{ url('/') }}" />

        <style>
            @font-face {
                font-family: 'Nexa Light';
                src: url("/fonts/text/nexa/NexaLight.woff") format("woff"), url("/fonts/text/nexa/NexaLight.ttf")  format("truetype");
            }

            @font-face {
                font-family: 'Nexa Bold';
                font-weight: bold;
                src: url("/fonts/text/nexa/NexaBold.woff") format("woff"), url("/fonts/text/nexa/NexaBold.ttf")  format("truetype");
            }
        </style>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet">
    </head>
    <body>

        <noscript>
            <strong>
                We're sorry but FIREAIOT doesn't work properly without JavaScript enabled. Please enable it to continue.
            </strong>
        </noscript>
        <div id="app"></div>
        
        <!-- Scripts -->
        <script src="{{ mix('/js/manifest.js') }}"></script>
        <script src="{{ mix('/js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>