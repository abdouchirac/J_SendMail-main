<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Route;

use Livewire\Component;

class Notification extends Component
{

    public function mount(Notification $notification)
    {
        $this->notifications = notification::all();
    }
    public function render()
    {

        return view('livewire.notification');
    }
}
