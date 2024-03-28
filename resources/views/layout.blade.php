<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        @vite('resources/css/app.css')
        <title>@yield('title', 'unknown')</title>
    </head>
    <body class=" font-default font-semibold text-gray-800">
        <header class="h-20 bg-white backdrop-blur-xl transition duration-150 hover:bg-white md:bg-[#ffffffb3] flex justify-between overflow-hidden fixed inset-x-0 top-0 z-20">
            <div class="flex lg:hidden mt-9 sm:mt-5">
                <div class="ml-6">
                    <button id="button-menu-open">
                        <img src="./images/icons/menu.png" class="h-6" />
                    </button>
                </div>
                <div class="ml-3 mt-0.5">
                    <a href="#" class="btn-logo-small">
                        <img src="./images/icons/logoSmall.png" class="h-4" />
                    </a>
                </div>
            </div>

            <div class="text-sm hidden lg:flex mt-6">
                <div class="mr-10 ml-10">
                    <a href="#" class="opacity-50 transition duration-150 hover:opacity-100">Mua nhà</a>
                </div>
                <div class="mr-10">
                    <a href="#" class="opacity-50 transition duration-150 hover:opacity-100">Thuê nhà</a>
                </div>
                <div class="mr-10">
                    <a href="#" class="opacity-50 transition duration-150 hover:opacity-100">Khám phá</a>
                </div>
                <div class="mr-10">
                    <a href="#" class="pb-1 border-b-2 border-red-600">Blog</a>
                </div>
            </div>

            <a href="{{route('home')}}" class="mt-6 hidden lg:block">
                <img src="{{ asset('assets/' . 'logo.png') }}" class="w-32">
            </a>

            <div class="flex mt-8 ml-14 sm:mt-5">
                <div>
                    <button class="mt-1 lg:hidden">
                        <img src="./images/icons/bell_notif.png" class="h-6 mb-auto"/>
                    </button>
                </div>
                <div>
                    <button class="mt-1 ml-3">
                        <img src="{{ asset('assets/' . 'heart_notif.png') }}" class="h-6 mb-auto"/>
                    </button>
                </div>
                <div class="hidden lg:block ml-6">
                    <a href="{{ route('create.post') }}" class="text-sm text-white bg-red-600 transition duration-150 hover:bg-red-900 px-6 py-3 rounded-full">Create post</a>
                </div>
                <div class="ml-6">
                    <button class="flex">
                        <div class="hidden md:block mr-1">
                            @if (auth()->user() != null)
                                <div class="text-right text-xs">{{auth()->user()->display_name}}</div>
                                @if (auth()->user()->role == 1)
                                    <div class="text-right text-xs opacity-50">Admin</div>
                                @else
                                    <div class="text-right text-xs opacity-50">User</div>
                                @endif
                            @endif
                        </div>
                        @if (auth()->user() != null)
                            @if (auth()->user()->profile_picture == null)
                                <img class="mr-6 md:mr-12 w-10 h-10 rounded-full" src="{{ asset('assets/' .  'DefaultProfilePicture.jpg') }}">
                            @else
                                <img class="mr-6 md:mr-12 w-10 h-10 rounded-full" src="{{ asset('profiles/' .  auth()->user()->profile_picture) }}">
                            @endif
                        @endif
                    </button>
                </div>
            </div>
        </header>
        @yield('content')
    </body>
</html>
