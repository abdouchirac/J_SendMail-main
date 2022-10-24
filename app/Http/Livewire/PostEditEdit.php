<?php

namespace App\Http\Livewire;

use App\Models\poste;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class PostEditEdit extends Component
{
    public $postes;
    public $state = [];
    public $password;
   public $updateMode = false;
    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];


    public function render()
    {


        $this->postes = poste::find(1);


        return view('livewire.post-edit-edit');
    }

    //la fonction édit permet de récupérer l'id de l'utilisateur

    public function edit($id)
    {
        dd($id);
        $this->updateMode = true;

        $postes = poste::find($id);
        dd($id);

        $this->state = [

           'id' =>$postes->id,
            'poste_libele' => $postes->poste_libele,

        ];

    }
    private function resetInputFields(){
        $this->poste_libele = '';

    }
    //la fonction mount permet de récupérer l'id post de l'utilisateur

    public function mount($id)
    {
        $this->updateMode = true;
        $postes = poste::find($id);
       $this->state = [
            'id' => $postes->id,
             'poste_libele' =>  $postes->poste_libele,

         ];


    }

    //la fonction cancel pour le retour a l'interface des postes du management

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        redirect()->intended('/post-index');

    }

//la fonction update permet de modifier les postes des utilisateurs

    public function update()
    {
        $validator = Validator::make($this->state,[

            'poste_libele' => 'required',

        ])->validate();

        if ($this->state['id']) {
            $postes = poste::find($this->state['id']);
            $postes->update([
                'id' => $this->state['id'],
                'poste_libele' => $this->state['poste_libele'],
            ]);
            $this->updateMode = false;
            session()->flash('message', 'utilisateur modifié avec succcès.');
            $this->reset('state') ;
            $this->postes=poste::all();
            redirect()->intended('/post-index');
        }
    }


}



















