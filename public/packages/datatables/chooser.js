/**
 * Created by alex on 4/17/15.
 */
+function ($) {
    'use strict';

    function init() {
        $(".chooser").each(function (index, element) {
            var title = $(element).attr('data-title');
            var route = $(element).attr('data-route');
            var columns = $(element).attr('data-columns');
            var url = $(element).attr('data-url');

            var modal_id = route + '-modal';
            var table_id = route + 'Table';

            $(element).attr('data-target', "#" + modal_id);
            $(element).attr('data-toggle', "modal");
            $(".app").append(
                '<div url="' + url + '" class="modal fade" id="' + modal_id + '" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><spanaria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">选择: 角色</h4></div><div class="modal-body"><table id="roles-table" class="table table-responsive"></table></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">关闭</button><button type="button" class="btn btn-primary" onclick="$.attach(\'' + modal_id + '\')">确定</button></div></div></div></div>'
            );


            columns = columns.split(',');
            var heads = '';
            for (var i = 0; i < columns.length; i++) {
                var col = columns[i];
                heads += '<td>' + col + '</td>';
            }

            $("#" + modal_id + " .modal-body").append('<table class="table table-responsive" id="' + table_id + '"><thead><tr>' + heads + '</tr></thead><tbody></tbody></table>');

            $('#' + table_id).DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "/api/choose/" + route,
                "columnDefs": [
                    {
                        "render": function (data, type, row) {
                            return '<input class="' + modal_id + '" type="checkbox" value="' + data + '"/>';
                        },
                        "targets": 0
                    }
                ]
            });
        });
    }

    $.extend({
        attach: function (modal_id) {
            var ids = [];
            $("." + modal_id + ":checked").each(function (index, element) {
                ids.push($(element).val());
            });
            var url = $("#" + modal_id).attr("url");
            $.ajax({
                url: url,
                method: 'post',
                data: {ids: ids, _token: token},
                success: function (data) {
                    if (data.result) {
                        location.reload();
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }
    });

    $.extend({
        detach: function (id) {
            $.ajax({
                url: '/api/user/{{$model->id}}/detach/roles',
                method: 'post',
                data: {ids: [id], _token: token},
                success: function (data) {
                    if (data.result) {
                        location.reload();
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }
    });

    init();
}(jQuery);