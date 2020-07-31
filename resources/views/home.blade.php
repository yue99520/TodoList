@extends('layouts.layout')

@section('layout_content')
<div class="ui stackable grid">
    <div class="row" style="height: 70vh">
        <div class="ui middle aligned ten wide column">
            <div class="ui huge header">
                TodoList
                <div class="sub header">
                    具備優秀可調適空間，打造適合自己的個人管理工具。
                </div>
            </div>
        </div>
        <div class="six wide column">
            <div class="ui secondary pointing tabular menu">
                <a class="active item" data-tab="login">
                    登入
                </a>
                <a class="item" data-tab="register">
                    註冊
                </a>
            </div>
            <div class="ui active tab" data-tab="login">
                @include('layouts.auth.login_form')
            </div>
            <div class="ui tab" data-tab="register">
                @include('layouts.auth.register_form')
            </div>
            @include('layouts.user.info_card', ['user' => [
                'img' => 'https://instagram.frmq2-2.fna.fbcdn.net/v/t51.2885-19/s150x150/104462271_711458869632845_4620254332450582741_n.jpg?_nc_ht=instagram.frmq2-2.fna.fbcdn.net&_nc_ohc=0xGUAb_VsNsAX8ksAHV&oh=9e3222a0c262945381f0bb550fee923e&oe=5F4BF0BC',
                'title' => '開發人員',
                'name' => '阿泥',
                'meta' => '靜宜大學 資訊工程學系',
                'description' => 'Be a programmer, not a coder.',
                'facebook_link' => 'https://www.facebook.com/yue99520/',
                'github_link' => 'https://github.com/yue99520',
                'instagram_link' => 'https://www.instagram.com/dy99520/'
            ]])
        </div>
    </div>
</div>
@endsection
