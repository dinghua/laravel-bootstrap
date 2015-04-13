<?php namespace Chitunet\Http\Controllers\Admin;

use Chitunet\Models\Task;
use Illuminate\Routing\Controller as Controller;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/8/15
 * Time: 12:01 PM
 * All rights reserved.
 */
class TaskController extends Controller {

    protected $status = [
        '0' => '正常',
        '1' => '完成',
        '2' => '执行中',
        '3' => '暂停',
        '4' => '已取消',
        '5' => '错误'
    ];

    public function getIndex()
    {
        $models = Task::paginate(10);
        return view('admin.task.index')->with(compact('models'))->with('status', $this->status);
    }

    public function postPause($id)
    {
        $task = Task::findOrFail($id);
        if(in_array($task->status, [0,2])){
            $task->pause();
        }else{
            return response()->json([ 'result' => 0, 'msg'=>'error status' ]);
        }
        return response()->json([ 'result' => 1 ]);
    }

    public function getSendEmail($id){
        return 'OK: '.$id;
    }

    public function getShow($id){
        $task = Task::findOrFail($id);
        $module = $task->module;
        $controller = app('Chitunet\Http\Controllers\Admin\\'.$module.'Controller');
        return $controller::show($id);
    }

    public function postResume($id)
    {
        $task = Task::findOrFail($id);
        if(in_array($task->status, [3])){
            $task->resume();
        }else{
            return response()->json([ 'result' => 0, 'msg'=>'error status' ]);
        }
        return response()->json([ 'result' => 1 ]);
    }

}