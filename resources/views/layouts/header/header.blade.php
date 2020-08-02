<div class="ui borderless menu">
    <div class="ui container">
        <a class="header item" href="/">
            <i class="big tasks icon"></i>
            {{ config('app.name') }}
        </a>
        @if(auth()->check())
            <a class="item">
                任務
            </a>
            <a class="item">
                項目
            </a>
            <a class="ui right item">
                <i class="large icons">
                    <i class="ui bell outline icon"></i>
                    <i class="small red right top corner circle icon"></i>
                </i>
            </a>
            <div class="ui dropdown item">
                <i class="big user circle icon"></i>
                {{ auth()->user()->name }}
                <i class="dropdown icon"></i>
                @include('layouts.header.user_menu')
            </div>
        @endif
    </div>
</div>
