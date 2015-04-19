@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/{{$controller->route.'/create'}}" class="btn btn-default btn-xs pull-right">新建</a>
                    角色
                </div>
                <table class="table table-striped m-b-none">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>名称</th>
                        <th>显示名称</th>
                        <th>描述</th>
                        <th style="width: 70px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->id}}</td>
                            <td>{{$model->name}}</td>
                            <td>{{$model->display_name}}</td>
                            <td>{{$model->description}}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-default btn-xs" data-target="#" href="javascript:;"
                                       data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                        操作
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/{{$controller->route.'/'.$model->id.'/edit'}}"
                                               class="text-xs">编辑</a></li>
                                        <li><a href="/{{$controller->route.'/'.$model->id.'/delete'}}" href=""
                                               class="text-xs">删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {!! $models->render() !!}
        </div>
    </div>
@endsection