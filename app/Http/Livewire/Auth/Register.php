<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Models\postes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Register extends Component
{   public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public $postes='';
    public $state = [];
    public function mount()
    {
        if (auth()->user()) {
            return redirect()->intended('/dashboard');
        }
    }

    public function updatedEmail()
    {
        $this->validate(['email'=>'required|email:rfc,dns|unique:users']);
    }

    //l'enregistrement utilisateur avec une table étrange postes et historiques comme jointure

    public function register()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|same:passwordConfirmation|min:6',
        ]);

        $user = User::create([
            'first_name' =>$this->first_name,
            'last_name' =>$this->last_name,

            'email' =>$this->email,

            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
        ]);



        $validator = Validator::make($this->state, [
            'poste_libele' => 'required|max:100',
        ])->validate();

        postes::create($this->state);
        session()->flash('message','ajouté avec succès!');
        $this->reset('state');
        $this->postes = postes::all();

        auth()->login($user);

        return redirect('/profile-example');
    }


    public function render()
    {
        $dest = postes::all();
        return view('livewire.auth.register', compact('dest'));
    }
}
