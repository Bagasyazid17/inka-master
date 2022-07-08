<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $receiver;
    public $sender;
    public $subject;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender, $receiver, $subject, $content)
    {
        $this->receiver = $receiver;
        $this->sender = $sender;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->subject($this->subject)
                ->markdown('emails.reply');
    }
}
