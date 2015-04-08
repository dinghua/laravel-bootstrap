@extends('layouts.page')

@section('content')
    <div class="container w-xxl w-auto-xs" ng-controller="SignupFormController"
         ng-init="app.settings.container = false;">
        <a href class="navbar-brand block m-t">{{Lang::get('common.site_name')}}</a>

        <div class="m-b-lg">
            <div class="wrapper text-center">
                <strong>{{Lang::get('common.register')}}</strong>
            </div>
            {!! Form::open(['url'=>'auth/register', 'method'=>'POST']) !!}
            <div class="text-danger wrapper text-center" ng-show="authError">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
            </div>
            <div class="list-group list-group-sm">
                <div class="list-group-item">
                    <input name="name" placeholder="{{Lang::get('common.name')}}" class="form-control no-border"
                           value="{{ old('name') }}" required>
                </div>
                <div class="list-group-item">
                    <input name="email" type="email" placeholder="{{Lang::get('common.email')}}" class="form-control no-border"
                           value="{{ old('email') }}" required>
                </div>
                <div class="list-group-item">
                    <input name="password" type="password" placeholder="{{Lang::get('common.password')}}"
                           class="form-control no-border" value="" required>
                </div>
            </div>
            <div class="checkbox m-b-md m-t-none">
                <label class="i-checks">
                    <input type="checkbox" ng-model="agree" required><i></i> Agree the <a href>terms and policy</a>
                </label>
            </div>
            <button type="submit" class="btn btn-lg btn-primary btn-block">{{Lang::get('common.register')}}
            </button>
            {!! Form::close() !!}
            <div class="line line-dashed"></div>
            <p class="text-center">
                <small>Already have an account?</small>
            </p>
            <a href="/auth/login" class="btn btn-lg btn-default btn-block">{{Lang::get('common.login')}}</a>
        </div>
        <div class="text-center">
            <p>
                <small class="text-muted">&copy; 2015</small>
            </p>
        </div>
    </div>
@endsection