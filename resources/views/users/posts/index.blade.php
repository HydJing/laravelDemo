@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">

            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('posts', $posts->count()) }}</p>
            </div>

            <div class="bg-white p-6 rouded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />>
                    @endforeach

                    {{ $posts->links() }}
                @else
                    <p>{{ $user->name }} has no post found</p>
                @endif
            </div>

            
        </div>
    </div>
@endsection