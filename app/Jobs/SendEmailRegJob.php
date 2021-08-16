<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Models\User;

class SendEmailRegJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $userBaru;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(user $userBaru)
    {
        $this->userBaru = $userBaru;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('noordiana.zaharah@gmail.com')->send(new \App\Mail\UserCreatedMail($this->userBaru));
    }
}
