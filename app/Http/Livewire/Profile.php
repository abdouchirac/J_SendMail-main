<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Models\poste;
use function Ramsey\Uuid\v1;

class Profile extends Component
{
    public $users;
    public $state = [];
    public $password;
   public $updateMode = false;
    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];


    public function render()
    {


        $this->users = User::all();
        $post = poste::all();

        return view('livewire.profile',compact('post'));
    }
    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->poste_id = '';
        $this->password = '';
    }

    //la fonction mount permet de récupérer l'id de l'utilisateur
    public function mount($id)
    {
        $this->updateMode = true;
        $users = User::find($id);
        $this->state = [
            'id' =>$users->id,
             'first_name' => $users->first_name,
             'last_name' => $users->last_name,
             'email' => $users->email,
             'poste_id' => $users->poste_id,
            'password' =>  $users->password,
         ];



    }
      //la fonction cancel pour le retour a l'interface du profile utilisateurs sur profile-example
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        redirect()->intended('/profile');

    }


//la fonction update permet de modifier les informations  des utilisateurs

    public function update()
    {
        $validator = Validator::make($this->state,[

            'first_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email',
            'poste_id' => 'required',
            'password' =>'required',
        ])->validate();

        if ($this->state['id']) {
            $users = User::find($this->state['id']);
            $users->update([
                'first_name' => $this->state['first_name'],
                'last_name' => $this->state[ 'last_name'],
                'email' => $this->state['email'],
                'poste_id' => $this->state['poste_id'],
                'password' => $this->state['password'],
            ]);
            $this->updateMode = false;
            session()->flash('message', 'utilisateur modifié avec succès');
            $this->reset('state') ;
            $this->users=User::all();
            redirect()->intended('/users-index');
        }
    }



}

