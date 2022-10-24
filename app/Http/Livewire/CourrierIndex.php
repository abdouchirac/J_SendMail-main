<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\courrier;
use Livewire\Component;
use Illuminate\Mail\Mailable;
use App\Mail\Messagedestoké;
use App\Models\emeteur;
use App\Models\emplacement;
use App\Models\user;
use Mail;

class CourrierIndex extends Component
{
    public $courriers;
    public $name;

    public function mount()
    {
        $this->courriers = courrier::all();
    }
//supprimer un courrier

    public function delete($id)
    {
        if($id){
            courrier::where('id',$id)->delete();
            $this->Courriers = courrier::all();

            redirect()->intended('/courrier-index')->with('message', 'le courrier a été supprimé avec succès.');

        }
    }

    public function render()
    {
        $courr = courrier::when($this->name,function($query,$name){
        return $query->where ('courrier_libele','LIKE',"%$name%");
    })->orderByRaw('id DESC')->paginate(5);

        return view('livewire.courrier-index',compact('courr'));
    }
       //cette fonction permet de changer le statut du courrier l'ors du destoksge  de celui -ci.
    public function changeStatut($id)
    {
        if($id){
            $courriers = courrier::find($id);

            $this->state = [
                'id' => $courriers->id,
                'courrier_libele' => $courriers->courrier_libele,
                'courrier_date_arrive'=>$courriers-> courrier_date_arrive,
                'courrier_status'=>$courriers-> courrier_status,
                'emeteur_id' => $courriers->emeteur_id,
                'user_id' => $courriers->user_id,
                'emplacement_id' => $courriers->emplacement_id,
            ];
            //recuperation de l'email de l'utilisateur
            $courriers->user_id;
            $courrier=user::find($courriers->user_id);
            $users=user::all();
            if($courriers-> courrier_status=='enCours'){
          courrier::where('id',$id)->update(['courrier_status'=>'destoke']);
          redirect()->intended('/courrier-index')->with('message', 'le courrier a été  destocké avec succès.');
         //envoie du mail
          mail::to($courrier->email)->send(new Messagedestoké ($this->state));
        }else{
            redirect()->intended('/courrier-index')->with('messag', 'le courrier n,a pas été validé par le destinataire ou courrier destocké.');
            }
       // $courriers =DB::table('courriers')->where('courrier_status','enStok')->update(['courrier_status'=>'enCours']);
    }
}


}
