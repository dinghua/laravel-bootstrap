@extends('layouts.master')

@section('content')
    {!! Form::open(['url'=>'admin/role_permissions', 'method'=>'POST']) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            权限分配
        </div>
        <table class="table table-border">
            <thead>
            <tr>
                <th></th>
                <th></th>
                @foreach($roles as $role)
                    <th class="center">{{$role->display_name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                @foreach($roles as $role)
                    <td class="center">
                        <input type="checkbox" class="cbx_role"
                               role_id="{{$role->id}}"/>
                    </td>
                @endforeach
            </tr>

            @foreach($permissions as $permission)
                <tr>
                    <td style="width: 120px;">{{$permission->display_name}}</td>
                    <td class="center" style="width: 50px;"><input type="checkbox" class="cbx_perm"
                               perm_id="{{$permission->id}}"/></td>
                    @foreach($roles as $role)
                        <td class="center">
                            <input type="checkbox" class="cbx"
                                   perm_id="{{$permission->id}}"
                                   role_id="{{$role->id}}" {{$role->hasPerm($permission->name)?'checked':''}}/>
                        </td>
                    @endforeach
                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="panel-footer">
            <a href="javascript:;" class="btn btn-primary btn-sm" onclick="getAllChecked()">保存</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('extend_scripts')
    <script>


        $('.cbx_role').bind('click', function () {
            var role_id = $(this).attr('role_id');
            var checked = $(this).prop('checked');
            $('.cbx[role_id='+role_id+']').prop('checked', checked);
        });

        $('.cbx_perm').bind('click', function () {
            var perm_id = $(this).attr('perm_id');
            var checked = $(this).prop('checked');
            $('.cbx[perm_id='+perm_id+']').prop('checked', checked);
        });

        function getAllChecked() {
            var result = {};
            $('.cbx:checked').each(function (index, element) {
                var role_id = $(element).attr('role_id');
                var perm_id = $(element).attr('perm_id');

                if (!result[role_id]) {
                    result[role_id] = [perm_id];
                } else {
                    result[role_id].push(perm_id);
                }
            });
            console.info(result);
            var token = $('input[name=_token]').val();
            $.ajax({
                url: '/admin/role_permissions',
                method: 'post',
                data: {data: result, _token: token},
                success: function (data) {
                    if (data.result) {
                        location.reload();
                    }
                }
            });
        }
    </script>
@endsection