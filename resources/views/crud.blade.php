@extends('layouts.app')

@section('header')
    <!-- Header section with title -->
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('CRUD Page') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Main content title -->
                    {{ __("CRUD Page") }}
                </div>
                    
                <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
                    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                            <div class="p-4">
                                <!-- Form to create a new post -->
                                <form action="{{ route('posts.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <!-- Title input field -->
                                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                                        <input type="text" name="title" id="title" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Title" required>
                                    </div>
                                    <div>
                                        <!-- Body textarea field -->
                                        <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Body</label>
                                        <textarea name="body" id="body" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Body" required></textarea>
                                    </div>
                                    <div>
                                        <!-- Category select field -->
                                        <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                                        <select name="category_id" id="category_id" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <!-- Image file input field -->
                                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                                        <input type="file" name="image" id="image" class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    </div>
                                    <div class="flex justify-end">
                                        <!-- Submit button -->
                                        <button type="submit" class="px-4 py-2 bg-primary-700 text-white rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            Add Post
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="overflow-x-auto">
                                <!-- Table to display posts -->
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">Post Name</th>
                                            <th scope="col" class="px-4 py-3">Category</th>
                                            <th scope="col" class="px-4 py-3">Author</th>
                                            <th scope="col" class="px-4 py-3">Description</th>
                                            <th scope="col" class="px-4 py-3">Date</th>
                                            <th scope="col" class="px-4 py-3">Image</th>
                                            <th scope="col" class="px-4 py-3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                            <tr class="border-b dark:border-gray-700">
                                                <!-- Post details -->
                                                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $post->title }}</td>
                                                <td class="px-4 py-3">{{ $post->category->name }}</td>
                                                <td class="px-4 py-3">{{ $post->user->name }}</td>
                                                <td class="px-4 py-3 max-w-[12rem] truncate">{{ $post->body }}</td>
                                                <td class="px-4 py-3">{{ $post->created_at }}</td>
                                                <td class="px-4 py-3">
                                                    @if($post->image)
                                                        <!-- Display post image if available -->
                                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-16 h-16 object-cover">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3 flex items-center justify-end space-x-2">
                                                    <!-- Actions (Edit/Delete) -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
