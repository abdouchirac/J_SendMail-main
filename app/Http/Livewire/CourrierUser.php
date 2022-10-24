<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailable;
use App\Mail\DemoMail;
use App\Models\courrier;
use Livewire\Component;
use App\Models\emeteur;
use Mail;
use App\Models\emplacement;
use App\Models\user;

class CourrierUser extends Component
{
    public $courriers;
    public $name;
    public $email;

    public function mount()
    {
        $this->courriers = courrier::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        // $courr = courrier::where('user_id', auth()->user()->id)->get();
        $courr = courrier::when($this->name,function($query,$name){
            return $query->where ('courrier_libele','LIKE',"%$name%");
            })->where('user_id', auth()->user()->id)->orderByRaw('id DESC')->paginate(5);

            return view('livewire.courrier-user',compact('courr'));
    }
    //cette fonction permet de changer le statut du courrier l'ors de la validation de celui -ci.
    public function changeStatut($id)
    {
        if($id){
            $courriers = courrier::find($id);
            $this->state = [
                'courrier_id' => $courriers->courrier_id,
                'courrier_libele' => $courriers->courrier_libele,
                'courrier_date_arrive'=>$courriers-> courrier_date_arrive,
                'receptioniste'=>$courriers->receptioniste,
                'emeteur_id' => $courriers->emeteur_id,
                'user_id' => $courriers->user_id,
                'emplacement_id' => $courriers->emplacement_id,
            ];
            if($courriers-> courrier_status=='enStok'){
         courrier::where('id',$id)->update(['courrier_status'=>'enCours']);
         mail::to($courriers->receptioniste)->send(new DemoMail ($this->state));
         redirect()->intended('/courrier-user')->with('message', 'vous avez validé votre courrier avec succès.');
        }else{
            redirect()->intended('/courrier-user')->with('messag', 'vous avez deja validé ou courrier destocké.');
            }

       // $courriers =DB::table('courriers')->where('courrier_status','enStok')->update(['courrier_status'=>'enCours']);
    }
}
}
