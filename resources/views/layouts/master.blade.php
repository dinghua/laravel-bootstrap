<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | {{Lang::get('common.site_name')}} </title>
    @include('layouts.partials.styles')
    @yield('extend_styles')
</head>
<body>
<div class="app">
    @include('layouts.partials.header')
    @include('layouts.partials.aside')
    <div class="app-content">
        <div class="app-content-body ">
            @yield('header')
            <div class="wrapper-md">
                @yield('breadcrumbs')

                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('layouts.partials.scripts')
@yield('extend_scripts')
</body>
</html>