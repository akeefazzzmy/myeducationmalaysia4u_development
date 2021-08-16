<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class UserCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $userBaru;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userBaru = $userBaru;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.created-user-mailable')
                    ->subject('Notifikasi Dari Mailable');
    }
}
