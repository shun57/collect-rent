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
    
    protected $current_user;
    protected $lend;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($current_user,$lend)
    {
        $this->current_user = $current_user;
        $this->lend = $lend;
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
                    'current_user' => $this->current_user,
                    'lend' => $this->lend,
                  ]);
    }
}
