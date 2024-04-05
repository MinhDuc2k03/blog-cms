@extends('admin.layouts.layoutSidebar')

@section('title', 'Admin Dashboard Page')
@section('content')
<div class="py-4 sm:ml-64">
    <div class="sm:mx-auto sm:w-4/5 w-4/5">
        <div class="flex mt-12 gap-1.5 items-baseline">
            <p class="text-3xl font-semibold text-gray-900">Dashboard</p>
        </div>
        <div class="flex mt-12 relative w-full items-baseline">
            <a href="{{ route('admin.user.showAll') }}" class="w-1/4 mr-2 bg-slate-100 transition duration-150 hover:bg-slate-200 border-2 border-slate-400 rounded-sm pb-8 px-1 pt-1">
                <div class="text-sm pb-0.5 pl-0.5 tracking-tighter">Registered Users.</div>
                <div class="text-xl pl-1">{{$users->count()}}</div>
            </a>
            <a href="{{ route('admin.post.showAll') }}" class="w-1/4 mx-2 bg-slate-100 transition duration-150 hover:bg-slate-200 border-2 border-slate-400 rounded-sm pb-8 px-1 pt-1">
                <div class="text-sm pb-0.5 pl-0.5 tracking-tighter">Posts.</div>
                <div class="text-xl pl-1">{{$posts->count()}}</div>
            </a>
            <a href="{{ route('admin.category.showAll') }}" class="w-1/4 mx-2 bg-slate-100 transition duration-150 hover:bg-slate-200 border-2 border-slate-400 rounded-sm pb-8 px-1 pt-1">
                <div class="text-sm pb-0.5 pl-0.5 tracking-tighter">Categories.</div>
                <div class="text-xl pl-1">{{$categories->count()}}</div>
            </a>
            <a href="{{ route('admin.tag.showAll') }}" class="w-1/4 ml-2 bg-slate-100 transition duration-150 hover:bg-slate-200 border-2 border-slate-400 rounded-sm pb-8 px-1 pt-1">
                <div class="text-sm pb-0.5 pl-0.5 tracking-tighter">Tags.</div>
                <div class="text-xl pl-1">{{$tags->count()}}</div>
            </a>
        </div>
        <div class="relative overflow-x-auto">
            
        </div>
    </div>
</div>
@endsection