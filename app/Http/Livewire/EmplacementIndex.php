<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\emplacement;

class EmplacementIndex extends Component
{
    public $courriers;
    public $name;

    public function mount()
    {
        $this->courriers = emplacement::all();
    }
    public function render()
    {
        $empla=emplacement::when($this->name,function($query,$name){
            return $query->where ('emplacement_noms','LIKE',"%$name%");
        })->orderByRaw('id DESC')->paginate(5);

        return view('livewire.emplacement-index',compact('empla'));
    }
}
