<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>@yield('title', 'unknown')</title>
    </head>
    <body class="bg-blue-200">
        <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
            <div class="w-full h-20 bg-gray-600"></div>
            <div class="h-full pb-4 overflow-y-auto bg-gray-800">
                <ul>
                    <li class="bg-gray-800 hover:bg-gray-700 pl-3 py-3">
                        <a href="" class="text-white hover:text-slate-300 text-lg">Dashboard</a>
                    </li>
                    <li class="bg-gray-800 hover:bg-gray-700 pl-3 py-3 group">
                        <div class="text-white text-lg select-none">Blog</div>
                        <ul class="">
                            <li class="pl-2 py-1.5 hidden group-hover:block"><a href="{{ route('admin.post.showAll') }}" class="text-white hover:text-slate-300 text-lg">- Posts</a></li>
                            <li class="pl-2 py-1.5 hidden group-hover:block"><a href="{{ route('admin.category.showAll') }}" class="text-white hover:text-slate-300 text-lg">- Categories</a></li>
                            <li class="pl-2 py-1.5 hidden group-hover:block"><a href="{{ route('admin.tag.showAll') }}" class="text-white hover:text-slate-300 text-lg">- Tags</a></li>
                        </ul>
                    </li>
                    <li class="bg-gray-800 hover:bg-gray-700 pl-3 py-3">
                        <a href="" class="text-white hover:text-slate-300 text-lg">Users (WIP)</a>
                    </li>
                </ul>
            </div>
        </aside> 
        @yield('content')
    </body>
</html>
