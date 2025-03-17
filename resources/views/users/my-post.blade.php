@extends('users.layout.master')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('User Post Page') }}
    </h2>
@endsection

@section('content')
    <section class="antialiased py-8 md:py-16 text-black">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12 space-y-5">
            @foreach ($posts as $post)
                <div
                    class="text-black bg-slate-100 dark:bg-slate-700 dark:text-white rounded-lg border border-slate-400 hover:border-none hover:drop-shadow-lg dark:hover:drop-shadow-none">
                    <div class="flex flex-col p-5">
                        <div class="flex flex-row justify-between bg-slate-300">
                            <div class=" p-2">{{ $post->category->name }}</div>
                            <div class=" p-2">{{ $post->created_at->format('Y-m-d') }}</div>
                        </div>
                        <h1 class=" p-2">{{ $post->title }}</h1>
                        <p class=" p-2">{{ $post->user->name }}</p>
                        <div class="p-0  flex justify-stretch lg:flex-row sm:flex-col">
                            @if ($post->image)
                                <div class="basis-1/4 p-0 content-center justify-center">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="object-cover w-full h-fit border border-slate-700 dark:border-slate-300">
                                </div>
                            @endif
                            <div class="basis-full p-2">
                                <p>{{ $post->body }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
