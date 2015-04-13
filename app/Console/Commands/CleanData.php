<?php namespace Chitunet\Console\Commands;

use Chitunet\Models\Customer;
use Chitunet\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CleanData extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'clean_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean data';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('start clean data');
        $tasks = Task::where('pause', true)->where('status', 0)->get();
        foreach($tasks as $task){
            $task->doPause();
        }
        $tasks = Task::where('resume', true)->where('status', Task::$STATUS_PAUSED)->get();
        foreach($tasks as $task){
            $task->doResume();
        }
        Log::info('end clean data');
    }

}
