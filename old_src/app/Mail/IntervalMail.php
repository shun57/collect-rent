<?php

namespace App\Mail;

use App\User;
use App\Lend;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IntervalMail extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $user;
    protected $user_lend;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$user_lend)
    {
        $this->user = $user;
        $this->user_lend = $user_lend;
        
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('取り立て屋appからのご連絡です！')
            ->text('emails.interval_mail')
            ->with([
                    'user' => $this->user,
                    'lend' => $this->user_lend,
                  ]);
    }
}
