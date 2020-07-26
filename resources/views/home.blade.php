@extends('layouts.layout')

@section('title', 'Home')

@section('layout_header')
    @if(auth()->check())
        @include('layouts.headers.user')
    @else
        @include('layouts.headers.guest')
    @endif
@endsection

@section('layout_sidebar')

@endsection

@section('layout_content')

@endsection
