@extends('layouts.master')

@section('title')
    {{$model->name}}
@endsection

@section('breadcrumbs')
    <ul class="breadcrumb bg-white b-a">
        <li><a href="/"><i class="fa fa-home"></i> </a></li>
        <li><a href="/admin/customer">用户</a></li>
        <li class="active"> {{$model->name}}</li>
    </ul>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="clearfix">
                        <a class="pull-left thumb-md avatar b-3x m-r">
                            <img src="/{{$model->avatar}}" alt="...">
                        </a>

                        <div class="clear">
                            <div class="h3 m-t-xs m-b-xs">
                                {{$model->name}}
                                <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
                            </div>
                            <small class="text-muted">{{$model->desc}}</small>
                        </div>
                    </div>
                </div>
                <div class="list-group no-radius alt">
                    <a class="list-group-item" href="">
                        <span class="badge bg-success">25</span>
                        <i class="fa fa-fire fa-fw text-muted"></i>
                        活动
                    </a>
                    <a class="list-group-item" href="">
                        <span class="badge bg-light">{{$model->groups->count()}}</span>
                        <i class="fa fa-user fa-fw text-muted"></i>
                        用户组
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tab1" data-toggle="tab">概览</a></li>
            <li><a href="#tab2" data-toggle="tab">用户组</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="streamline b-l b-info m-l-lg m-b padder-v">
                    <div>
                        <a class="pull-left thumb-sm avatar m-l-n-md">
                            <img src="/img/a4.jpg" class="img-circle" alt="...">
                        </a>

                        <div class="m-l-lg m-b-lg">
                            <div class="m-b-xs">
                                <a href="/admin/user/1" class="h4">Admin</a>
                                      <span class="text-muted m-l-sm pull-right">
                                        4h ago
                                      </span>
                            </div>
                            <div>
                                <div class="m-b">创建组
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab2">
            </div>
        </div>
    </div>
@endsection