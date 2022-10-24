<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Messagedestoké extends Mailable
{
    use Queueable, SerializesModels;
    public $state;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($state)
    {
        $this->state = $state;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from("mailsend@jstockcash.com") // L'expéditeur
                    ->subject('courrier destocké')    //SUJET
                    ->view('emails.Messagedestoké')
; // La vue

    }
}
