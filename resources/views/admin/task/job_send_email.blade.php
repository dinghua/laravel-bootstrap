@extends('layouts.master')

@section('title')
    任务管理
@endsection

@section('breadcrumbs')
    <ul class="breadcrumb bg-white b-a">
        <li><a href="/"><i class="fa fa-home"></i> </a></li>
        <li><a href="/admin/task">任务管理</a></li>
        <li class="active"> 详情</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    任务管理
                </div>
                <table class="table table-striped m-b-none">
                    <thead>
                    <tr>
                        <th style="width: 20px;">#</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th>更新时间</th>
                        <th style="width: 70px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->id}}</td>
                            <td>{{$model->status}}</td>
                            <td>{{$model->created_at}}</td>
                            <td>{{$model->updated_at}}</td>
                            <td>
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