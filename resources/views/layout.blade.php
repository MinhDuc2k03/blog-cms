<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <script src="https://cdn.tailwindcss.com"></script>
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
    <body class=" font-default font-semibold text-gray-800">
        <header class="shadow-md h-20 bg-white backdrop-blur-xl transition duration-150 hover:bg-white md:bg-[#ffffffb3] flex justify-between items-center fixed inset-x-0 top-0 z-20">
            <div class="flex lg:hidden ">
                <div class="ml-6">
                    <button id="button-menu-open">
                        <img src="{{ asset('assets/' . 'menu.png') }}" class="h-6" />
                    </button>
                </div>
                <div class="ml-3 ">
                    <a href="{{route('home')}}" class="btn-logo-small">
                        <img src="{{ asset('assets/' . 'logoSmall.png') }}" class="h-4" />
                    </a>
                </div>
            </div>

            <div class="text-sm hidden lg:flex">
                <div class="mr-10 ml-10">
                    <a href="" class="opacity-50 transition duration-150 hover:opacity-100 line-clamp-1">Mua nhà</a>
                </div>
                <div class="mr-10">
                    <a href="" class="opacity-50 transition duration-150 hover:opacity-100 line-clamp-1">Thuê nhà</a>
                </div>
                <div class="mr-10">
                    <a href="" class="opacity-50 transition duration-150 hover:opacity-100 line-clamp-1">Khám phá</a>
                </div>
                <div class="mr-10">
                    <a href="" class="pb-1 border-b-2 border-red-600 line-clamp-1">Blog</a>
                </div>
            </div>

            <a href="{{route('home')}}" class="hidden lg:block">
                <img src="{{ asset('assets/' . 'logo.png') }}" class="w-32">
            </a>

            <div class="flex ml-14">
                @if (auth()->user() != null)
                    <div class="flex items-center">
                        <button class="lg:hidden">
                            <img src="{{ asset('assets/' . 'bell_notif.png') }}" class="h-6 mb-auto"/>
                        </button>
                    </div>
                    <div class="flex items-center">
                        <button class="ml-3">
                            <img src="{{ asset('assets/' . 'heart_notif.png') }}" class="h-6 mb-auto"/>
                        </button>
                    </div>
                @endif
                <a href="{{ route('create.post') }}" class="hidden lg:block ml-4 text-base text-white bg-red-600 transition duration-150 hover:bg-red-900 px-6 py-2 rounded-full line-clamp-1">
                    <div class="line-clamp-1"> 
                        Create post
                    </div>
                </a>
                @if (auth()->user() != null)
                    <div class="ml-6 relative">
                        <button class="flex" id="button-user-open">
                            <div class="hidden md:block mr-1">
                                <div class="text-right text-sm">{{auth()->user()->display_name}}</div>
                                <div class="text-right text-xs opacity-50">{{'@'}}{{auth()->user()->name}}</div>
                            </div>
                            @if (auth()->user()->profile_picture == null)
                                <img class="mr-6 md:mr-12 w-10 h-10 rounded-full object-cover" src="{{ asset('assets/' .  'DefaultProfilePicture.jpg') }}">
                            @else
                                <img class="mr-6 md:mr-12 w-10 h-10 rounded-full object-cover" src="{{ asset('profiles/' .  auth()->user()->profile_picture) }}">
                            @endif
                        </button>
                        <div id="user-dropdown" class="hidden">
                            <ul class="z-[1000] absolute mt-8 mr-4 items-end hidden lg:block border border-black border-opacity-40 bg-slate-50">
                                <li class="py-2 w-full line-clamp-1">
                                    <a href="{{ route('profile.edit', auth()->user()->name) }}" class="w-full px-3 text-sm line-clamp-1">Edit Profile</a>
                                </li>
                                <li class="py-2 w-full line-clamp-1">
                                    <a href="{{ route('profile.show', auth()->user()->name) }}" class="w-full text-sm px-3 line-clamp-1">View Profile</a>
                                </li>
                                <li class="py-2 w-full line-clamp-1">
                                    <a href="{{ route('logout') }}" class="w-full text-sm px-3 line-clamp-1">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>       
                @else
                    <a href="{{ route('login') }}" class="hidden lg:block ml-3 text-base bg-transparent text-gray-800 transition duration-150 hover:bg-gray-300 px-6 py-2 rounded-full">Login</a>
                    <a href="{{ route('register') }}" class="hidden lg:block ml-3 mr-6 text-base text-white bg-gray-800 transition duration-150 hover:bg-gray-900 px-6 py-2 rounded-full">Register</a>
                @endif
            </div>
        </header>

        @yield('content')
        <div id="modal" class="fixed inset-x-0 inset-y-0 bg-white z-50 hidden flex-col justify-between items-center">
            <div class="w-full">
                <div class="h-20 bg-white flex justify-between overflow-hidden inset-x-0 top-0 z-20 mb-20">
                    <div class="flex mt-6">
                        <div class="ml-6">
                            <button id="button-menu-close">
                                <img src="{{ asset('assets/' . 'close.png') }}" class="h-6" />
                            </button>
                        </div>
                        <div class="ml-3">
                            <a href="{{route('home')}}">
                                <img src="{{ asset('assets/' . 'logo.png') }}" class="h-4" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="ml-5 mr-5 text-2xl grid grid-cols-5 items-center gap-x-3 gap-y-5 font-bold">
                    <a href="" class="opacity-50 col-span-3 sm:col-span-2">Mua nhà</a>
                    <div class="h-1 w-full col-span-2 sm:col-span-3 bg-transparent mr-7"></div>
                    <a href=""  class="opacity-50 col-span-3 sm:col-span-2">Thuê nhà</a>
                    <div class="h-1 w-full col-span-2 sm:col-span-3 bg-transparent mr-7"></div>
                    <a href=""  class="opacity-50 col-span-3 sm:col-span-2">Khám phá</a>
                    <div class="h-1 w-full col-span-2 sm:col-span-3 bg-transparent mr-7"></div>
                    <a href=""  class="text-red-500 col-span-3 sm:col-span-2">Blog</a>
                    <div class="h-1 w-full col-span-2 sm:col-span-3 bg-red-500 mr-3"></div>
                </div>
            </div>
            <div class="mb-4 text-sm w-full sm:w-3/5 block">
                <div class="mx-4 flex gap-4">
                    <a href="{{ route('create.post') }}" class="w-full rounded-full bg-red-500 text-white py-2 text-center mb-3 sm:mb-5">Create post</a>
                </div>
                <div class="mx-4 flex gap-4">
                    @if (auth()->user() != null)
                        <a href="{{ route('logout') }}" class="rounded-full bg-gray-700 text-white py-2 text-center w-full">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-full bg-transparent text-gray-800 py-2 text-center w-full">Login</a>
                        <a href="{{ route('register') }}"class="rounded-full bg-gray-800 text-white py-2 text-center w-full">Register</a>
                    @endif
                </div>
            </div>
        </div>
        <script type="text/javascript">
            document.querySelector("#button-menu-open").onclick = function() {
                if(document.querySelector('#modal').classList.contains('hidden')) {
                    document.querySelector('#modal').classList.add('flex')
                    document.querySelector('#modal').classList.remove('hidden')
                } else {
                    document.querySelector('#modal').classList.add('hidden')
                    document.querySelector('#modal').classList.remove('flex')
                }
            }

            document.querySelector("#button-menu-close").onclick = function() {
                if(document.querySelector('#modal').classList.contains('hidden')){
                    document.querySelector('#modal').classList.add('flex')
                    document.querySelector('#modal').classList.remove('hidden')
                } else {
                    document.querySelector('#modal').classList.add('hidden')
                    document.querySelector('#modal').classList.remove('flex')
                }
            }

            if(document.querySelector("#button-user-open") != null) {
                document.querySelector("#button-user-open").onclick = function() {
                    if(document.querySelector('#user-dropdown').classList.contains('hidden')){
                        document.querySelector('#user-dropdown').classList.add('flex')
                        document.querySelector('#user-dropdown').classList.remove('hidden')
                    } else {
                        document.querySelector('#user-dropdown').classList.add('hidden')
                        document.querySelector('#user-dropdown').classList.remove('flex')
                    }
                }
            }   
        </script>
    </body>
</html>
