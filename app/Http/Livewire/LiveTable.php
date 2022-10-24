<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\poste;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailable;
use App\Mail\envoiMail;
use Mail;

class LiveTable extends Component
{
    public $users,  $poste_id,$poste_libele,$historiques, $first_name,$last_name,$email,$password,$mailSentAlert,$showDemoNotification, $user_id;
    public $updateMode = false;
    public $passwordConfirmation = '';

    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];

    public $postes='';
    public $state = [];

    public function render()
    {
        $this->users = User::all();
        $post = poste::all();

        return view('livewire.live-table', compact('post'));
    }

    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->poste_id = '';

    }
//l'enregistrement utilisateur
    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'poste_id'=>'required',
            'password' => 'required|same:passwordConfirmation|min:6',
        ]);
        $user = User::create([
            'first_name' =>$this->first_name,
            'last_name' =>$this->last_name,
            'email' =>$this->email,
            'poste_id' =>$this->poste_id,
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
        ]);
         $data=['email' =>$user->email,"nom" =>$user->first_name,"poste_id"=>$this->poste_id,"password" =>$this->password];
        mail::to( $user->email)->send(new envoiMail($data));
        $this->reset('state');
        redirect()->intended('/users-index')->with('message', ' vous avez enregistré un utilisateur avec  succès.');
    }
    public function routeNotificationForMail() {
        return $this->email;
    }

//la fonction de retour sur l'interface utilisateur management

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        redirect()->intended('/users-index');

    }

}





