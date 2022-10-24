<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\user;
use Illuminate\Queue\SerializesModels;

class envoiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->from("mailsend@jstockcash.com") // L'expéditeur
                    ->subject('login')    //SUJET
                    ->view('emails.envoiMail');
    }
}
