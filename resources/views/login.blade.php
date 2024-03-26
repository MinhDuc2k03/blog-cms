@extends('layout')

@section('title', 'Login')
@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-12 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
            @csrf

            {{-- EMAIL ADDRESS --}}
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            
            {{-- PASSWORD --}}
            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="text-sm">
                    {{-- <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a> --}}
                    </div>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" class="pl-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center gap-1">
                    <input id="remember" name="remember" type="checkbox">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Remember me</label>
                </div>
            </div>

            {{-- @if ($errors->any())
            <div class="w-1/2 m-auto text-center">
                @foreach ($errors->all() as $error)
                    <li class="text-red-600 list-none text-sm">
                        {{$error}}
                    </li>
                @endforeach
            </div>
            @endif --}}

            @if (session()->has('error'))
                <li class="text-red-600 list-none text-sm">
                    {{session('error')}}
                </li>
            @endif

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Don't have an account?
            <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign Up</a>
        </p>
    </div>
  </div>
@endsection