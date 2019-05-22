<?php

namespace App\Jobs;

use App\Mail\EMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use \DrewM\MailChimp\MailChimp;

class SubscribeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EMail();
        $email->subject = 'Subscribe';
        $email->receiver_address = $this->email;
        $email->receiver_name = 'Customer';
        $email->body = [
            'view'=>'emails.subscribe',
            'content'=>[
                'email'=>$this->email
            ]
        ];
        sendMail($email);
    }
}
