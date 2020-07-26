@extends('layouts.layout')

@section('title', 'Login')

@section('layout_header')
    @include('layouts.headers.guest')
@endsection

@section('layout_content')
    <div class="ui padded middle aligned relaxed grid">
        <div class="row">
            <div class="ten wide column">
                <div class="ui huge header">為自由而生
                    <div class="sub header">
                        具備優秀可調適空間，打造適合自己的個人管理工具。
                    </div>
                </div>
            </div>
            <div class="six wide column">
                @include('layouts.auth.login_form')
                @include('layouts.my_info_card')
            </div>
        </div>
    </div>
@endsection
{{--            <a data-pin-do="embedBoard" href="https://www.pinterest.com/pinterest/official-news/"></a>--}}
