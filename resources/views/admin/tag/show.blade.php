@extends('layout')

@section('title', 'Admin Tag Show Page')
@section('content')
    <div>
        <div class="sm:mx-auto sm:w-4/5 flex mt-12 gap-1.5 items-baseline w-4/5">
            <p class="text-2xl font-semibold text-gray-900">Tag</p>
            <p class="text-sm align-text-bottom">Preview tag</p>
        </div>

        <div class="sm:mx-auto sm:w-4/5 mt-4">
            <a href="{{ route('admin.tag.showAll') }}" class="text-purple-800">&larr;Back</a>
        </div>
        
        <div class="w-4/5 m-auto mt-10 bg-slate-100 border-2 border-slate-400">
            <table class="w-full divide-y dark:divide-gray-700 text-sm table-fixed">
                <tbody class="divide-y dark:divide-gray-700">
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Name:</td>
                        <td class="px-4 py-3">{{$tag->name}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Slug:</td>
                        <td class="px-4 py-3">{{$tag->slug}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Created at:</td>
                        <td class="px-4 py-3">{{$tag->created_at}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Updated at:</td>
                        <td class="px-4 py-3">{{$tag->updated_at}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Action:</td>
                        <td class="px-4 py-3 flex gap-2">
                            <div>
                                <a href="{{ route('admin.tag.edit', $tag->id) }}" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Edit</a>
                            </div>
                            <form action="{{ route('admin.tag.delete', $tag->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this tag?')" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection