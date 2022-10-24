<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Models\emeteur;

class EmeteurList extends Component
{

    public $Emeteur;
    public $state = [];
    public $updateMode = false;

    public function store()
    {

        $validator = Validator::make($this->state, [
            'emeteur_noms' => 'required|max:100',
        ])->validate();

        emeteur::create($this->state);
        $this->reset('state');
        $this->Emeteur = emeteur::all();
        redirect()->intended('/courrier-add')->with('message', 'emeteur crée avec succès.');
    }

      public function render()
    {
        return view('livewire.emeteur-list');
    }
}
