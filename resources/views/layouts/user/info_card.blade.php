<div class="ui fluid card">
    <div class="content">
        @if($user['img'] != null)
            <img class="right floated mini circular ui image" src="{{ $user['img'] }}" alt="{{ $user['name'] }}">
        @else
            <img class="right floated mini circular ui image" src="https://semantic-ui.com/images/avatar/small/matt.jpg" alt="{{ $user['name'] }}">
            <img class="right floated mini circular ui image" src="https://semantic-ui.com/images/avatar/small/jenny.jpg" alt="{{ $user['name'] }}">
        @endif
        <div class="header">
            {{ $user['title'] }} {{ $user['name'] }}
        </div>
        <div class="meta">
            {{ $user['meta'] }}
        </div>
        <div class="description">
            {{ $user['description'] }}
        </div>
    </div>
    <div class="content">
        <div class="ui fluid mini buttons">
            @if($user['facebook_link'] != null)
                <a class="ui facebook button" href="{{ $user['facebook_link'] }}" target="_blank">
                    <i class="facebook icon"></i>
                    FB
                </a>
            @endif
            @if($user['instagram_link'] != null)
                <a class="ui instagram button" href="{{ $user['instagram_link'] }}" target="_blank">
                    <i class="instagram icon"></i>
                    IG
                </a>
            @endif
            @if($user['github_link'] != null)
                <a class="ui black button" href="{{ $user['github_link'] }}" target="_blank">
                    <i class="github icon"></i>
                    GitHub
                </a>
            @endif
        </div>
    </div>
</div>
