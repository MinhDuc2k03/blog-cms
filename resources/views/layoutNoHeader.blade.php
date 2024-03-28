<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        @vite('resources/css/app.css')
        <title>@yield('title', 'unknown')</title>
    </head>
    <body class="bg-blue-100 font-default font-semibold text-gray-800">
        @yield('content')
    </body>
</html>
