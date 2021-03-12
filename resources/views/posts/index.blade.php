@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rouded-lg">
            <form action="{{ route('posts') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button class="bg-ble-500 text-white px-4 py-2 rounded font-medium">Post</button>
                </div>
            </form>

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="" class="font-bold">{{ $post->user->name }}</a>
                        <span class="text-gray-600 text-sm">{{ $post->created_at->diffforhumans() }}</span>

                        <p class="mb-2">{{ $post->body }}</p>

                        @if ($post->ownedBy(Auth::user()))
                            <div>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-blue-500" type="submit">Delete</button>
                                </form>
                            </div>
                        @endif

                        <div class="flex items-conter">
                            @auth
                                
                                @if (!$post->likedBy(Auth::user()))
                                    
                                    <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                                        @csrf
                                        <button class="text-blue-500" type="submit">Like</button>
                                    </form>
                                    
                                @else

                                    <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-blue-500" type="submit">Unlike</button>
                                    </form>
                                @endif

                            @endauth

                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>

                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}
            @else
                <p>No post found</p>
            @endif
        </div>
    </div>
@endsection