<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Livewire\Component;
//Importation des classes pour le mail
use App\Models\user;
use Illuminate\Support\Facades\Mail;

class EnvoiMail extends Component
{

    public function sendMessage () {
        $User=user::first();
        $enrollmentData=[
        'body'=>' nouveau courrier',
        'enrollmentText'=>'vous avez recu un nouveau courrier ',
        'url'=>url('/'),
        'thankyou'=>'vous pouvez venir le retirer '

    ];

    $user->notify(new EnvoiMail($enrollmentData));
        }

    // public function render()
    // {

    //     view('livewire.envoi-mail');
    // }
}
