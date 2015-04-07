<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    @include('layouts.partials.styles')
</head>
<body>
<div class="app app-header-fixed">
    @include('layouts.partials.header')
    @include('layouts.partials.aside')
    <div class="app-content">
        @yield('content')
    </div>
</div>

@include('layouts.partials.scripts')
</body>
</html>