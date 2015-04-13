<?php namespace Chitunet\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    public static $STATUS_PAUSED = 3;
    public static $STATUS_FINISHED = 1;
    public static $STATUS_READY = 0;

    protected $table = 'tasks';

    public function jobs(){
        return app('Chitunet\Models\\'.$this->module)->where('task_id', $this->id);
    }

    public function pause()
    {
        $this->pause = TRUE;
        $this->save();
    }


    public function resume()
    {
        $this->resume = TRUE;
        $this->save();
    }

    public function canDo()
    {
        if (in_array($this->status, [ 0 ]))
        {
            return TRUE;
        }

        return FALSE;
    }

    public function jobRoute($job_id){
        $base = str_replace('_', '-', $this->tube);
        return '/admin/task/'.$base.'/'.$job_id;
    }

    public function finish()
    {
        $this->status = self::$STATUS_FINISHED;
        $this->save();
    }

    public function doPause()
    {
        $this->status = self::$STATUS_PAUSED;
        $this->save();
    }

    public function doResume()
    {
        $this->status = self::$STATUS_READY;
        $this->save();
    }


    public function payloads($key, $value = NULL)
    {

        // getter
        if (NULL === $value)
        {
            $payload = $this->payload;
            if (!$this->payload)
            {
                return NULL;
            }
            $payload = json_decode($payload, TRUE);
            if (isset( $payload[ $key ] ))
            {
                return $payload[ $key ];
            }

            return NULL;
        }

        // setter
        $payload = $this->payload;
        if ($this->payload)
        {
            $payload = "[]";
        }
        $payload         = json_decode($payload, TRUE);
        $payload[ $key ] = $value;
        $this->payload   = json_encode($payload);

    }
}
