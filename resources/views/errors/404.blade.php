@extends('layouts.page')

@section('content')
    <div class="container w-xxl w-auto-xs" ng-init="app.settings.container = false;">
        <div class="text-center m-b-lg">
            <h1 class="text-shadow text-white">404</h1>
        </div>
        <div class="list-group bg-info auto m-b-sm m-b-lg">
            <a href="/" class="list-group-item">
                <i class="fa fa-chevron-right text-muted"></i>
                <i class="fa fa-fw fa-mail-forward m-r-xs"></i> 首页
            </a>
            <a href="/auth/login" class="list-group-item">
                <i class="fa fa-chevron-right text-muted"></i>
                <i class="fa fa-fw fa-sign-in m-r-xs"></i> 登录
            </a>
            <a href="/auth/register" class="list-group-item">
                <i class="fa fa-chevron-right text-muted"></i>
                <i class="fa fa-fw fa-unlock-alt m-r-xs"></i> 注册
            </a>
        </div>
    </div>

@endsection