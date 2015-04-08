<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('site_name')</title>
    @include('layouts.partials.styles')
</head>
<body>
<div class="app app-header-fixed">
    @yield('content')
</div>

@include('layouts.partials.scripts')
</body>
</html>