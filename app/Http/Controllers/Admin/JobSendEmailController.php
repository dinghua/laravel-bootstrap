<?php namespace App\Http\Controllers\Admin;

use App\Models\Task;

/**
 * Created by chitunet.com
 * Author: Alex (dinghua@me.com)
 * Date: 4/13/15
 * Time: 6:40 PM
 * All rights reserved.
 */
class JobSendEmailController extends BaseJobController {

    public static function show($id)
    {
        $task   = Task::findOrFail($id);
        $models = $task->jobs()->paginate(10);
        return view('admin.task.job_send_email')->with(compact('task', 'models'));
    }
}