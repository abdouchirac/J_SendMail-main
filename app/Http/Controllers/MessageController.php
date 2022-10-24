<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\user;
//Importation des classes pour le mail

use Illuminate\Support\Facades\Mail;
use App\Mail\MessageGoogle;

class MessageController extends Controller
{

    // Envoi du mail aux utilisateurs
	public function sendMessage () {
    $user=User::first();
    $enrollmentData=[
    'body'=>' nouveau courrier',
    'enrollmentText'=>'vous avez recu un nouveau courrier ',
    'url'=>url('/'),
    'thankyou'=>'vous pouvez venir le retirer '

];

$user->notify(new Message($enrollmentData));

		return back()->withText("Message envoyé");
	}

}
