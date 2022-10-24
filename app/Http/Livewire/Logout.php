<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Auth;
use Livewire\Component;

class Logout extends Component
{

//cette fonction permet utilisateur de déconnecter sur son profil



    public function logout() {
        auth()->logout();
        return redirect('/login');
    }
    public function render()
    {
        return view('livewire.logout');
    }
}
