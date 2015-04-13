@extends('layouts.master')

@section('title')
    任务管理
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
                        <th>名字</th>
                        <th>类型</th>
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
                            <td><a href="/admin/task/show/{{$model->id}}">{{$model->name}}</a></td>
                            <td>{{$model->tube}}</td>
                            <td>{{$status[$model->status]}}</td>
                            <td>{{$model->created_at}}</td>
                            <td>{{$model->updated_at}}</td>
                            <td>
                                <div class="dropdown">
                                    @if(in_array($model->status, [\Chitunet\Models\Task::$STATUS_READY, \Chitunet\Models\Task::$STATUS_READY]))
                                        <button class="btn btn-danger btn-xs" onclick="pause({{$model->id}})">
                                            <i class="icon-control-pause"></i> 暂停
                                        </button>
                                    @endif

                                    @if(in_array($model->status, [\Chitunet\Models\Task::$STATUS_PAUSED]))
                                        <button class="btn btn-danger btn-xs" onclick="resume({{$model->id}})">
                                            <i class="icon-control-play"></i> 恢复
                                        </button>
                                    @endif

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
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
@endsection


@section('extend_scripts')
    <script>
        function pause(id) {
            var token = $("input[name=_token]").val();
            $.ajax({
                data: {_token: token},
                method: 'post',
                url: '/admin/task/pause/' + id,
                success: function (data) {
                    location.reload();
                }
            })
        }

        function resume(id) {
            var token = $("input[name=_token]").val();
            $.ajax({
                data: {_token: token},
                method: 'post',
                url: '/admin/task/resume/' + id,
                success: function (data) {
                    location.reload();
                }
            })
        }


    </script>
@endsection