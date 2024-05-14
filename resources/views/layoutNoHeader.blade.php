<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            default:['Montserrat', 'sans-serif'],
                            display: ['Montserrat', 'sans-serif'],
                            body: ['Montserrat', 'sans-serif'],
                        },
                    },
                },
            }
        </script>
        <title>@yield('title', 'unknown')</title>
    </head>
    <body class="bg-blue-100 font-semibold text-gray-800">
        @yield('content')
    </body>
</html>
