<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class LiveTable extends Component
{
    public $users,  $first_name,$last_name,$email,$password,$mailSentAlert,$showDemoNotification, $user_id;
    public $updateMode = false;
    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];
    public function render()
    {
        $this->users = User::all();
        
        return view('livewire.live-table');
    }

    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
    }

    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'first_name' =>$this->first_name,
            'last_name' =>$this->last_name,
            
            'email' =>$this->email,
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
            
        ]);
        redirect()->intended('/users');
    }
    public function routeNotificationForMail() {
        return $this->email;
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $users = User::where('id',$id);
        $this->user_id = $id;
        $this->first_name= $users->first_name;
        $this->last_name= $users->last_name;
        $this->email = $users->email;
        dd(" $this->updateMode = true");
    }
    

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = Users::find($this->user_id);
            $user->update([
                'first_name' => $this->first_name,
                'email' => $this->email,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            User::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}

  



