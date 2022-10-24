<?php

namespace App\Mail;
use App\Http\Livewire\CourrierList;
use App\Models\CourrierUser;
use App\Models\user;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $state;
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
                    ->subject('courrier validé')    //SUJET
                    ->view('emails.demoMail');
    }
}
