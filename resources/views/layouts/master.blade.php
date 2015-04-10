<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('site_name')</title>
    @include('layouts.partials.styles')
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
@yield('extend_scripts')
</body>
</html>