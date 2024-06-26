@extends('layoutNoHeader')

@section('title', 'Admin Show Page')
@section('content')
    <div>
        <div class="sm:mx-auto sm:w-4/5 flex mt-12 gap-1.5 items-baseline w-4/5">
            <p class="text-3xl font-semibold text-gray-900">Post</p>
            <p class="text-sm align-text-bottom">Preview post</p>
        </div>

        <div class="sm:mx-auto sm:w-4/5 mt-4">
            <a href="{{ route('admin.post.showAll') }}" class="text-purple-800">&larr;Back</a>
        </div>
        
        <div class="w-4/5 m-auto mt-10 bg-slate-100 border-2 border-slate-400">
            <table class="w-full divide-y dark:divide-gray-700 text-sm table-auto">
                <tbody class="divide-y dark:divide-gray-700">
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Author:</td>
                        <td class="px-4 py-3">{{$post->user->name}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Title:</td>
                        <td class="px-4 py-3">{{$post->title}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Slug:</td>
                        <td class="px-4 py-3">{{$post->slug}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Description:</td>
                        <td class="px-4 py-3">{{$post->description}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Image:</td>
                        <td class="px-4 py-3">
                            @if ($post->thumbnail == '')
                                <div class="select-none">-</div>
                            @else
                                <img src="{{ asset('storage/thumbnails/' .  $post->thumbnail) }}" class="transition-all w-24 hover:w-3/4" alt="">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Category:</td>
                        <td class="px-4 py-3">{{$post->category->name}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Tags:</td>
                        <td class="px-4 py-3">
                            @if (count($post->tags) === 0)
                                <div class="select-none">-</div>
                            @else
                                @foreach ($post->tags as $key=>$tag)
                                    {{$tag->name}}
                                    @if ($key != array_key_last($post->tags->toArray()))
                                        <span class="">,</span>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Content:</td>
                        <td class="px-4 py-3">
                            <p class="break-words">{!! $post->post !!}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Created at:</td>
                        <td class="px-4 py-3">{{$post->created_at}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Updated at:</td>
                        <td class="px-4 py-3">{{$post->updated_at}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 py-3 w-24 bg-slate-200">Actions:</td>
                        <td class="px-4 py-3 flex gap-2">
                            <div>
                                <a href="{{ route('admin.post.edit', $post->id) }}" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Edit</a>
                            </div>
                            <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" class="select-none text-xs font-semibold text-purple-600 hover:text-purple-950 hover:drop-shadow-2xl hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="py-14"></div>
    </div>
@endsection