@extends('layouts.app')

@section('title', 'Make an article')

@section('header')
    <x-header />
@endsection

@section('content')
    <article>
        <small>ID</small>
        <small>User ID</small>
        <small>Category ID</small>

        <h1>Title</h1>
        <p>Body</p>
        <!-- IMG -->
        <img src="" alt="">

        <small>Created At</small>
        <small>Updated At</small>
    </article>
@endsection

@section('footer')
    <x-footer />
@endsection
