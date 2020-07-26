@extends('layouts.headers.basic')

@section('header_menu_content')
    <a class="item">
        任務
    </a>
    <a class="item">
        項目
    </a>
    <a class="ui small right item">
        <i class="large bell outline icon"></i>
        <div class="ui left pointing tiny red label">{{ //todo get notification number }}</div>
    </a>
    <div class="ui dropdown item">
        <i class="big user circle icon"></i>
        {{ auth()->user()->name }}
        <i class="dropdown icon"></i>
        <div class="menu">
            <a class="item">
                <i class="large child icon"></i>
                個人檔案</a>
            <a class="item">
                <i class="large cog icon"></i>
                設定</a>
            <a class="item">
                <i class="large sign out alternate icon"></i>
                登出</a>
        </div>
    </div>
@endsection
