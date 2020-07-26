@extends('layouts.layout')

@section('title', 'Login')

@section('layout_header')
    @include('layouts.headers.guest')
@endsection

@section('layout_content')
    <div class="ui grid">
        <div class="six wide column">
            <a data-pin-do="embedBoard" href="https://www.pinterest.com/pinterest/official-news/"></a>
        </div>
        <div class="ten wide column">
            @include('layouts.auth.login_form')
        </div>
    </div>
@endsection
