<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Models\emplacement;

class EmplacementList extends Component
{
    public $Emplacement;
    public $state = [];
    public $updateMode = false;

    public function store()
    {

        $validator = Validator::make($this->state, [
            'emplacement_noms' => 'required|max:100',
            'emplacement_detail' => 'required|max:500',
        ])->validate();
        emplacement::create($this->state);
        $this->reset('state');
        $this->Emplacement = emplacement::all();
        redirect()->intended('/courrier-add')->with('message', 'emplacement crée avec succès.');
    }
    public function render()
    {
        return view('livewire.emplacement-list');
    }
}
