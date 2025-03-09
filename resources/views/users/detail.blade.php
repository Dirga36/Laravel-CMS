<!-- resources/views/users/detail.blade.php-->
@extends('layouts.app')
@section('title', $user['nama']) @section('content')
<ul>
    <li>
        <h1>id : {{ $user['id'] }}</h1>
    </li>
    <li>
        <h1>Nama : {{ $user['nama'] }}</h1>
    </li>
    <li>
        <h1>Umur : {{ $user['umur'] }}</h1>
    </li>
</ul> @endsection
