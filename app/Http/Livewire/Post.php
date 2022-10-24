<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

use App\Models\postes;
use App\Models\User;

class Post extends Component
{


    public $postes;
    public $state = [];
    public $updateMode = false;


    public function store()
    {

        $validator = Validator::make($this->state, [
            'poste_libele' => 'required|max:100',
        ])->validate();

        postes::create($this->state);
        session()->flash('message','crée avec succès!');
        $this->reset('state');
        $this->postes = postes::all();
        redirect()->intended('/post-edit');

    }

    public function cancel()
    {

        redirect()->intended('/post-edit');

    }


    public function render()
    {
        return view('livewire.post');
    }

    public function view(){
    $postesData= postes::find(1);
    $users= User::orderBy('first_name', 'asc')->get();
    return view('User.view', compact('postesData', 'users'));
}

}







