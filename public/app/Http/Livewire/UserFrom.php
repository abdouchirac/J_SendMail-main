<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\users; 

class UserForm extends Component
{

     
    public $first_name;
    public $last_name;
    public $email;
    public $age;
    public $address;

    public function render()
    {
        return view('livewire.user-form');
    }


    public function save()
    {
        $validated = $this->validate([
            'first_name' => 'required|min:10',
            'email' => 'required|email|min:10',
            'age' => 'required|integer',
            'address' => 'required|min:10',
        ]);
    
        if ($this->user_id) {
            User::find($this->user_id)
                ->update([
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required',
                    'age' => $this->age,
                    'address' => $this->address,
                ]);
    
            $this->dispatchBrowserEvent('user-saved', ['action' => 'updated', 'user_name' => $this->name]);
        } else {
            User::create(array_merge($validated, [
                'user_type' => 'users',
                'password' => bcrypt($this->email)
            ]));
    
            $this->dispatchBrowserEvent('user-saved', ['action' => 'created', 'user_name' => $this->name]);
        }
    
        $this->resetForm();
        $this->emitTo('live-table', 'triggerRefresh');

    public function resetForm()
    {
        $this->user_id = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->age = null;
        $this->address = null;
    }

}