@extends('layoutNoHeader')

@section('title', 'Admin User Show Page')
@section('content')
    <div>
        <div class="sm:mx-auto sm:w-4/5 flex mt-12 gap-1.5 items-baseline w-4/5">
            <p class="text-3xl font-semibold text-gray-900">User</p>
            <p class="text-sm align-text-bottom">Preview user</p>
        </div>

        <div class="sm:mx-auto sm:w-4/5 mt-4">
            <a href="{{ route('admin.user.showAll') }}" class="text-purple-800">&larr;Back</a>
        </div>
        
        <div class="w-4/5 m-auto mt-10 bg-slate-100 border-2 border-slate-400">
            <table class="w-full divide-y dark:divide-gray-700 text-sm table-fixed">
                <tbody class="divide-y dark:divide-gray-700">
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Name:</td>
                        <td class="px-4 py-3">{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Display name:</td>
                        <td class="px-4 py-3">{{$user->display_name}}</td>
                    </tr>

                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Profile picture:</td>
                        <td class="px-4 py-3">
                            @if ($user->profile_picture == null)
                                <img class="w-10 h-10 rounded-full items-center bg-white" src="{{ asset('assets/' .  'DefaultProfilePicture.jpg') }}">
                            @else
                                <img class="w-10 h-10 rounded-full items-center bg-white" src="{{ asset('storage/profiles/' .  $user->profile_picture) }}">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Email:</td>
                        <td class="px-4 py-3">{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Role:</td>
                        @if ($user->role == 2)
                            <td class="px-4 py-3">Super Admin</td>
                        @elseif ($user->role == 1)
                            <td class="px-4 py-3">Admin</td>
                        @elseif ($user->role == 0)
                            <td class="px-4 py-3">User</td>
                        @endif
                    </tr>
                    
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Created at:</td>
                        <td class="px-4 py-3">{{$user->created_at}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Updated at:</td>
                        <td class="px-4 py-3">{{$user->updated_at}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Action:</td>
                        <td class="px-4 py-3 flex gap-2">
                            <div>
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Edit</a>
                            </div>
                            {{-- <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="py-14"></div>
    </div>
@endsection