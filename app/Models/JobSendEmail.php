<?php namespace Chitunet\Models;


class JobSendEmail extends BaseJob {

    protected $table = 'job_send_email';
    protected $tube = 'send_email';


}
