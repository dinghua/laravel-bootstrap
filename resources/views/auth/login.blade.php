@extends('layouts.page')

@section('content')
    <div class="container w-xxl w-auto-xs">
        <a href class="navbar-brand block m-t">{{Lang::get('common.site_name')}}</a>

        <div class="m-b-lg">
            <div class="wrapper text-center">
                <strong>{{Lang::get('common.login')}}</strong>
            </div>
            {!! Form::open(['url'=>'auth/login', 'method'=>'POST']) !!}
            <div class="text-danger wrapper text-center">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <h5>{{ $error }}</h5>
                    @endforeach
                @endif
            </div>
            <div class="list-group list-group-sm">
                <div class="list-group-item">
                    <input type="email" name="email" placeholder="{{Lang::get('common.email')}}"
                           class="form-control no-border" required>
                </div>
                <div class="list-group-item">
                    <input type="password" name="password" placeholder="{{Lang::get('common.password')}}"
                           class="form-control no-border" required>
                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary btn-block" ng-click="login()"
                    ng-disabled='form.$invalid'>{{Lang::get('common.login')}}
            </button>
            <div class="text-center m-t m-b"><a ui-sref="access.forgotpwd">Forgot password?</a></div>
            {!! Form::close() !!}
            <div class="line line-dashed"></div>
            <p class="text-center">
                <small>Do not have an account?</small>
            </p>
            <a href="/auth/register" class="btn btn-lg btn-default btn-block">{{Lang::get('common.register')}}</a>
        </div>
        <div class="text-center">
            <p>
                <small class="text-muted">&copy; 2015</small>
            </p>
        </div>
    </div>
@endsection