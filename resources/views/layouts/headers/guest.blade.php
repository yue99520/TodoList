@extends('layouts.headers.basic')

@section('header_menu_content')
    <a class="right item" href="{{ route('login') }}">
        登入
    </a>
    <a class="item" href="{{ route('register') }}">
        註冊
    </a>
@endsection
