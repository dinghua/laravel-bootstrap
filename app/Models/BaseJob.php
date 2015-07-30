<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseJob extends Model {

    protected $table = '';
    protected $tube = '';

    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }

    public function finish()
    {
        $this->status = 1;
        $this->save();

        // check task status
        $task_id     = $this->task->id;
        $pending_job = self::where('task_id', $task_id)->whereIn('status', [ 0 ])->count();
        if (0 == $pending_job)
        {
            $this->task->finish();
        }
    }
}
