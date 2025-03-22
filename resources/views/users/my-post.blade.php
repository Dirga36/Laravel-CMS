@extends('layouts.master')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Your Posts Page') }}
    </h2>
@endsection

@section('content')
    @include('components.main')
@endsection
