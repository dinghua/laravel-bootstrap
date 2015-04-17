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

                        </a>

                        <div class="clear">
                            <div class="h3 m-t-xs m-b-xs">
                                {{$model->name}}
                                <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
                            </div>
                            <small class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="list-group no-radius alt">

                    <a class="list-group-item" href="">
                        <span class="badge bg-light">{{$model->roles->count()}}</span>
                        <i class="fa fa-user fa-fw text-muted"></i>
                        角色
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tab1" data-toggle="tab">概览</a></li>
            <li><a href="#tab2" data-toggle="tab">角色</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
            </div>
            <div class="tab-pane" id="tab2">
                <button class="m-b-lg btn btn-default btn-sm chooser"
                        data-route="roles"
                        data-columns="#,名字,角色"
                        data-url="/api/user/{{$model->id}}/attach/roles"
                        data-title="角色">
                    添加
                </button>
                <?php
                $table = Datatable::table()
                        ->addColumn('#', '名称', '角色', '')
                        ->setUrl(URL::to('/api/user/' . $model->id . '/roles.json'))
                        ->noScript();
                // to render the table:
                echo $table->render();
                ?>
            </div>
        </div>
    </div>

@endsection


@section('extend_scripts')
    <script src="/packages/datatables/jquery.dataTables.min.js"></script>
    <script src="/packages/datatables/dataTables.bootstrap.js"></script>
    <link href="/packages/datatables/dataTables.bootstrap.css" rel="stylesheet"/>
    <script src="/packages/datatables/chooser.js"></script>
    {!! $table->script(); !!}

    <script>
        var token = "{{csrf_token()}}";



    </script>
@endsection