<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
        <title>@yield('title') | {{ config('app.name') }}</title>
    </head>
    <body>
        @yield('layout_header')
        <div class="ui container">
            @yield('layout_sidebar')
            @yield('layout_content')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
