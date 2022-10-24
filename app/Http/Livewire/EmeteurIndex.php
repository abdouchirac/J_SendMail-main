<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Models\emeteur;

class EmeteurIndex extends Component
{
    public $emeteurs;
    public $name;
    public function mount()
    {
        $this->emeteurs = emeteur::all();
    }
    public function render()
    {
        $emet=emeteur::when($this->name,function($query,$name){
            return $query->where ('emeteur_noms','LIKE',"%$name%");
        })->orderByRaw('id DESC')->paginate(5);
        return view('livewire.emeteur-index',compact('emet'));
    }
}
