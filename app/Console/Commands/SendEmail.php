<?php namespace Chitunet\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

use Chitunet\Models\Customer;
use Chitunet\Models\JobSendEmail;
use Chitunet\Models\Task;

class SendEmail extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'send_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // get last job
        $job = JobSendEmail::where('status', 0)->orderBy('created_at')->first();
        if(!$job){
            Log::info('no job todo');
            return;
        }
        $task = $job->task;
        if(!$task->canDo()){
            Log::info('task paused');
        }
        $subject = $task->payloads('subject');
        $customer_ids = json_decode($job->customers, true);
        foreach($customer_ids as $customer_id){
            $customer = Customer::find($customer_id);
            Log::info('send email ['.$subject.'] to '.$customer->email);
        }
        $job->finish();
    }

    public static function push(Task $task)
    {
        $customers = Customer::all();
        $total = $customers->count();
        $current = 0;
        $step = 3;
        $flag = true;
        $ids = [];
        while($flag){
            $ids = Customer::skip($current)->take($step)->get()->lists('id');
            $current += $step;
            $job = new JobSendEmail();
            $job->task_id = $task->id;
            $job->customers = json_encode($ids);
            $job->save();
            if($current>= $total){
                $flag = false;
                break;
            }
        }
        return;
    }
}
