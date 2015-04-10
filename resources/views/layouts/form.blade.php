<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('site_name')</title>
    @include('layouts.partials.styles')
    <link href="/packages/colorbox/colorbox.css" rel="stylesheet">
    <link href="/packages/barryvdh/elfinder/css/elfinder.min.css" rel="stylesheet">
    <link href="/packages/barryvdh/elfinder/css/theme.css" rel="stylesheet">
    @yield('extend_styles')
</head>
<body>
<div class="app">
    @include('layouts.partials.header')
    @include('layouts.partials.aside')
    <div class="app-content">
        <div class="wrapper-md">
            @yield('content')
        </div>
    </div>
</div>

@include('layouts.partials.scripts')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
<script type="text/javascript" src="/packages/colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="/packages/barryvdh/elfinder/js/elfinder.min.js"></script>
<script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>
@yield('extend_scripts')
</body>
</html>