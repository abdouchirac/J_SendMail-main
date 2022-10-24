<?php

namespace App\Http\Livewire;

namespace App\Http\Livewire;

use App\Models\User;

use Livewire\Component;

class Profile extends Component
{
    public $users,  $first_name,$last_name,$email,$showSavedAlert,$showDemoNotification,$mailSentAlert, $user_id;
    public $updateMode = false;

    public function render()
    {
        $this->users = User::all();
        $data = User::paginate(5);
        return view('livewire.profile');
    }

    private function resetInputFields(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        Users::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $users = User::where('id',$id);
        $this->user_id = $id;
        $this->first_name= $users->first_name;
        $this->last_name= $users->last_name;
        $this->email = $users->email;
        
    }
    

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = Users::find($this->user_id);
            $user->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
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