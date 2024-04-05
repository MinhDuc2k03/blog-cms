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
        <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
            <div class="relative h-full">
                <div class="w-full h-20 bg-gray-600 text-center flex">
                    <span class="ml-5 m-auto text-white">Admin lol</span>
                </div>
                <div class="h-fit pb-4 overflow-y-auto bg-gray-800">
                    <ul>
                        <li class="bg-gray-800 hover:bg-gray-700 pl-3 py-3">
                            <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-slate-300 text-lg">Dashboard</a>
                        </li>
                        <li class="bg-gray-800 hover:bg-gray-700 pl-3 py-3 group">
                            <div class="text-white text-lg select-none">Blog</div>
                            <ul class="">
                                <li class="pl-2 py-1.5 hidden group-hover:block">
                                    <span class="text-white select-none text-md">- </span>
                                    <a href="{{ route('admin.post.showAll') }}" class=" text-white hover:text-slate-300 text-md">Posts</a>
                                </li>
                                <li class="pl-2 py-1.5 hidden group-hover:block">
                                    <span class="text-white select-none text-md">- </span>
                                    <a href="{{ route('admin.category.showAll') }}" class="text-white hover:text-slate-300 text-md">Categories</a>
                                </li>
                                <li class="pl-2 py-1.5 hidden group-hover:block">
                                    <span class="text-white select-none text-md">- </span>
                                    <a href="{{ route('admin.tag.showAll') }}" class="text-white hover:text-slate-300 text-md">Tags</a>
                                </li>
                            </ul>
                        </li>
                        <li class="bg-gray-800 hover:bg-gray-700 pl-3 py-3">
                            <a href="{{ route('admin.user.showAll') }}" class="text-white hover:text-slate-300 text-lg">Users</a>
                        </li>
                        <li class="bg-gray-800 hover:bg-gray-700 pl-3 py-3">
                            <a href="" class="text-white hover:text-slate-300 text-lg">Logs</a>
                        </li>
                    </ul>
                </div>
                <div class="w-full h-20 bg-gray-600 absolute bottom-0 flex justify-between group">
                    <button class="gap-2 flex justify-start align-baseline relative items-center">
                        @if (auth()->user()->profile_picture == null)
                            <img class="w-10 h-10 rounded-full items-center bg-white my-auto ml-5" src="{{ asset('assets/' .  'DefaultProfilePicture.jpg') }}">
                        @else
                            <img class="w-10 h-10 rounded-full items-center bg-white my-auto ml-5" src="{{ asset('profiles/' .  auth()->user()->profile_picture) }}">
                        @endif
                        <div class="my-auto">
                            <div>{{auth()->user()->name}}</div>
                            <div class="text-xs opacity-50">Admin</div>
                        </div>
                        <a href="{{ route('logout') }}" class="w-fit h-10 px-3 bg-white">Logout</a>
                    </button>
                </div>
            </div>
        </aside>
        @yield('content')
    </body>
</html>
