@extends('layout')

@section('title', 'User Profile Page')
@section('content')
<div class="w-10/12 pt-32 m-auto">
    <div class="flex mb-16 justify-between">
        <div class="flex">
            <a href="{{ route('profile.show', $user->name) }}">
                @if ($user->profile_picture == null)
                    <img class="object-cover w-24 h-24 rounded-full" src="{{ asset('assets/' .  'DefaultProfilePicture.jpg') }}">
                @else
                    <img class="object-cover w-24 h-24 rounded-full" src="{{ asset('profiles/' .  $user->profile_picture) }}">
                @endif
            </a>
            
            <div class="flex flex-col ml-3 justify-center">
                <div class="text-2xl">{{$user->display_name}}</div>
                <div class="text-base opacity-50">{{'@'}}{{$user->name}}</div>
            </div>
        </div>
        @if (auth()->user()->id == $user->id)
            <div>
                <a href="{{ route('profile.edit', $user->name) }}" class="text-sm mr-10 md:mr-40 bg-white px-3 py-1.5 text-gray-500 border-2 border-gray-500 rounded-md hover:bg-gray-500 hover:text-white">Edit</a>
            </div>
        @endif
    </div>
    <div class="h-12 w-full bg-white border-y-2"></div>
    <div class="my-20"></div>
</div>
@endsection