<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\poste;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class Paramettre extends Component
{

    public $totoalPages, $mailSentAlert,$showDemoNotification;
    public $updateMode = false;
    protected $users;
    public $name;
    public $field;
    public  $search='';
    public $status;

    public function mount()
    {
        $this->users = User::all();
    }


    public function render ()
    {
        $this->users=User::when($this->name,function($query,$name){
            return $query->where ('first_name','LIKE',"%$name%");
        }) ->where( 'id',1)
        ->orderByRaw('id DESC')->paginate(5);
        return view('livewire.paramettre');
    }

    public function changeStatut($id)
{

    if($id){
        $users = User::find($id);


        $this->state = [
            'id' => $users->id,
            'status'=> $users->status,
        ];

        if( $users->status=='actif'){
            User::where('id',$id)->update(['status'=>'inactif']);
            redirect()->intended('/users-index')->with('messag', 'utilisateur  inatif.');

           }else{
            User::where('id',$id)->update(['status'=>'actif']);
               redirect()->intended('/users-index');
               session()->flash('message', 'utilisateur  actif.');
               }
       // $courriers =DB::table('courriers')->where('courrier_status','enStok')->update(['courrier_status'=>'enCours']);
    }
}

}
