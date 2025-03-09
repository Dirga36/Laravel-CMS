<!-- resources/views/users/users.blade.php -->
@extends('layouts.app') @section('title', 'List Users') @section('content')
<table border="1">
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>umur</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($users as $user)
        </tr>
        <td>{{ $user['id'] }}</td>
        <td>
            <a href='{{ route('users.detail', $user['id']) }}'> {{ $user['nama'] }}
            </a>
        </td>
        <td>{{ $user['umur'] }}</td>
        @endforeach
    </tbody>
</table>
@endsection
