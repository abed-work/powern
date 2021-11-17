<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Powern</title>        
        <link rel="stylesheet" href="/styles/app.css">
        <link rel="stylesheet" href="/libraries/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="/libraries/owl-carousel/owl.theme.default.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body>
        @include('includes.header')
        
        @yield('content')
        
        <script src="/libraries/owl-carousel/owl.carousel.min.js"></script>

        @include('includes.footer')

    </body>
</html>
