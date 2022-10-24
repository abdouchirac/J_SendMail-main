<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Register extends Component
{   public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

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
    
    public function register()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|same:passwordConfirmation|min:6',
        ]);

        $user = User::create([
            'first_name' =>$this->first_name,
            'last_name' =>$this->last_name,
            
            'email' =>$this->email,
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
        ]);

        auth()->login($user);

        return redirect('/profile');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
