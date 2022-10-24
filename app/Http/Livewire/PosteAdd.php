<?php

namespace App\Http\Livewire;
use App\Models\poste;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
class PosteAdd extends Component
{
public $Poste;
public $state = [];
    public function store()
    {

        $validator = Validator::make($this->state, [
            'poste_libele' => 'required|max:100',
        ])->validate();

        poste::create($this->state);
        $this->reset('state');
        $this->Poste = poste::all();
        redirect()->intended('/post-index')->with('message', 'poste crée avec succès.');
    }


    public function render()
    {
        return view('livewire.poste-add');
    }
}
