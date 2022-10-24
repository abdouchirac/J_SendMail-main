<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Route;
use App\Mail\MessageGoogle;
use App\Models\courrier;
use App\Models\emeteur;
use App\Models\user;
use App\Models\emplacement;
use Livewire\Component;
use Mail;
use Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\courriernotification;

class CourrierCreate extends Component
{
    public $Courrier;
    public $state = [];
    public $updateMode = false;
    public $users;
    public $recep;

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
            'courrier_libele' => 'required|max:100',
            'courrier_date_arrive' => 'required|max:100',
            'receptioniste'=> 'required|max:100',
            'emeteur_id' => 'required|max:100',
            'user_id' => 'required|max:100',
            'emplacement_id' => 'required|max:100',
        ])->validate();
        $var=courrier::create($this->state);
        redirect()->intended('/courrier-index')->with('message', 'le courrier a été ajouté avec succès.');
        $var->user_id;
        $var=user::find($var->user_id);
        $users=user::all();
        mail::to($var->email)->send(new MessageGoogle($this->state));
        foreach ($users as $user) {
       $user->notify(new courriernotification($this->state));
        }
        $this->reset('state');
        $this->Courrier = courrier::all();
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->reset('state');
    }

    public function delete($id)
    {
        if($id){
            courrier::where('id',$id)->delete();
            $this->Courrier = courrier::all();
        }
    }



    public function render()
    {
        $emet = emeteur::all();
        $dest = user::all();
        $empla = emplacement::all();
        return view('livewire.courrier-create', compact('emet','dest','empla'));
    }
}
