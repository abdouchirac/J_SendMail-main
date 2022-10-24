<?php


namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Models\emplacement;



class EmplacementShow extends Component
{
    public $emplacement;
    public $state = [];
    public $updateMode = false;

    public function mount(emplacement $Emplacement)
    {
        $this->Emplacement = emplacement::all();

    }
    public function render()
    {
        return view('livewire.emplacement-show');
    }

}
