<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{

    public $email = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $credentials = $this->validate();
        return auth()->attempt($credentials)
                ? redirect()->intended('/profile')
                : $this->addError('email', trans('auth.failed'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
