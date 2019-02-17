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
    
    public $sendData;
    public $options;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sendData, $options)
    {
        $this->sendData = $sendData;
        $this->options = $options;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->options['subject'])
            ->text($this->options['template']);
    }
}
