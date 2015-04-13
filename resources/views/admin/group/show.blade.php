@extends('layouts.master')

@section('title')
    {{$model->name}}
@endsection

@section('breadcrumbs')
    <ul class="breadcrumb bg-white b-a">
        <li><a href="/"><i class="fa fa-home"></i> </a></li>
        <li><a href="/admin/group">用户组</a></li>
        <li class="active"> {{$model->name}}</li>
    </ul>
@endsection

@section('content')
    <div ng-app="app" ng-controller="groupController">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="clearfix">
                            <a class="pull-left thumb-md avatar b-3x m-r">
                                <img src="/{{$model->photo}}" alt="...">
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
                            <span class="badge bg-light">5</span>
                            <i class="fa fa-user fa-fw text-muted"></i>
                            用户
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#tab1" data-toggle="tab">概览</a></li>
                <li><a href="#tab2" data-toggle="tab">用户 <span
                                class="badge bg-default badge-sm m-l-xs">6</span></a></li>
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
                    <div class="table-responsive"  >
                        <div ui-grid="gridOptionsUser" ui-grid-auto-resize></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extend_scripts')
    <script src="/packages/angular/angular.min.js"></script>
    <script src="/packages/angular/angular-ui-grid/ui-grid.min.js"></script>
    <link rel="stylesheet" href="/packages/angular/angular-ui-grid/ui-grid.min.css"/>
    <script>
        var app = angular.module('app', ['ui.grid', 'ui.grid.autoResize'], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
	        $interpolateProvider.endSymbol('%>');
        });
        app.controller('groupController', ['$scope', '$http', function ($scope, $http) {
            $scope.gridOptionsUser = {
                data: [
                   ]
            };

            $http.get('/api/group/1/customers.json')
                    .success(function(data) {
                        $scope.gridOptionsUser.data = data;
                    });
        }]);
        console.info(app);
    </script>
@endsection