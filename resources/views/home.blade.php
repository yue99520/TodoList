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
        <div id="cards" class="six wide column">
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
            <div id="placeholder_developer_card"></div>
            @include('layouts.user.info_card')
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        let card = loadInfoCard(1);
        card.then(function (html) {
            $('#placeholder_developer_card').replaceWith(html);
        });
    })
</script>
@endsection
