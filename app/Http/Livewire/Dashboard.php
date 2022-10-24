<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;

class Dashboard extends Component
{

    public $first_name = '';
    public $email = '';
    public $message= '';

    protected $rules = [
        'first_name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ];
    public function saveMessage(){
            dd('je suis la');
        Message::create([
            'first_name' =>$this->first_name,
            'email' =>$this->email,
            'message' =>$this->message,
        ]);
        $message = message::create([
            'first_name' =>$this->first_name,
            
            'email' =>$this->email,
            'message' =>$this->message,
    
        ]);
        
        dd($message);
    }

    public function updatedEmail()
    {
        $this->validate(['email'=>'required|email:rfc,dns|unique:messages']);
    }
    
    public function Dashboard()
    {
        $this->validate([
            'first_name' => 'required',
            
            'email' => 'required',
            'message' => 'required',
        ]);
    }
    public function render()
    {
        return view('dashboard');
    }
}
