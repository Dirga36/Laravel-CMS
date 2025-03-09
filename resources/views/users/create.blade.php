{{-- filepath: /c:/Users/Admin/Desktop/laravels/Belajar-Laravel/resources/views/users/create.blade.php --}}
@extends('layouts.master')

@section('title', 'User Form')

@section('content')
    <div class="container mx-auto p-4">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">Please correct the following errors:</span>
                <ul class="list-disc mt-2 ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                <input type="text" id="Gama" name="nama"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="umur" class="block text-gray-700 text-sm font-bold mb-2">Umur:</label>
                <input type="number" id="umur" name="umur"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="gambar" class="block text-gray-700 text-sm font-bold mb-2">Gambar:</label>
                <input type="file" id="gambar" name="gambar"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>
            </div>
        </form>
        @isset($payload)
            <div class="mt-8">
                <h1 class="text-2xl font-bold">Haloo namaku, {{ $payload['nama'] }}</h1>
                <h1 class="text-2xl font-bold">Umurku sekarang, {{ $payload['umur'] }} tahun</h1>
                <h1 class="text-2xl font-bold">Kenalan yukk</h1>
                <img src="{{ asset('storage/' . $payload['gambar']) }}" alt="ERRRRROR" class="mt-4 rounded-full w-32 h-32">
            </div>
        @endisset
    </div>
@endsection