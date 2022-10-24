<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\courrier;
use Livewire\Component;
use App\Models\emeteur;
use App\Models\emplacement;
use App\Models\user;

class CourrierShow extends Component
{
    public $courrier;
    public $state = [];
    public $updateMode = false;

    public function mount(Courrier $courrier)
    {
        $this->courriers = courrier::all();
    }

    public function cancel()
    {
        $this->updateMode = false;

        redirect()->intended('/courrier-index');
    }

    public function render()
    {

        return view('livewire.courrier-show');
    }
}
