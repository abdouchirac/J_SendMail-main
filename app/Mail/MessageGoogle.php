<?php

namespace App\Mail;
use App\Http\Livewire\CourrierList;
use App\Models\courrier;
use App\Models\user;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageGoogle extends Mailable
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
                    ->subject('bon de reception')    //SUJET
                    ->view('emails.message-google')
; // La vue

    }
}
