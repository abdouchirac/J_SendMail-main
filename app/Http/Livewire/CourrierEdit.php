<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\courrier;
use App\Models\emeteur;
use App\Models\user;
use App\Models\emplacement;

class CourrierEdit extends Component
{
     public $Courrier;
     public $state = [];
    public $updateMode = false;

//cette fonction permet de de recuperer et remplir les information d'un courrier
    public function edit($id)
    {
        $this->updateMode = true;
        $courriers = courrier::find($id);

        $this->state = [
            'courrier_id' => $courriers->courrier_id,
            'courrier_libele' => $courriers->courrier_libele,
            'courrier_date_arrive'=>$courriers-> courrier_date_arrive,
            'emeteur_id' => $courriers->emeteur_id,
            'user_id' => $courriers->user_id,
            'emplacement_id' => $courriers->emplacement_id,
        ];
    }
    private function resetInputFields(){
        $this->reset('state');
    }
//cette fonction permet de modifier les information d'un courrier depuis la base des donnees .
    public function update()
    {
        $validator = Validator::make($this->state, [
            'courrier_libele' => 'required|max:100',
            'courrier_date_arrive' =>'required|max:100',
            'emeteur_id' => 'required|max:100',
            'user_id' => 'required|max:100',
            'emplacement_id' => 'required|max:100'
        ])->validate();

        if ($this->state['id']) {
            $courriers = courrier::find($this->state['id']);
            $courriers->update([
                'courrier_libele' => $this->state['courrier_libele'],
                'courrier_date_arrive' => $this->state['courrier_date_arrive'],
                'emeteur_id' => $this->state['emeteur_id'],
                'user_id' => $this->state['user_id'],
                'emplacement_id' => $this->state['emplacement_id'],
            ]);
            $this->updateMode = false;
            $this->reset('state');
            $this->Courrier = courrier::all();
            redirect()->intended('/courrier-index')->with('message', ' votre courrier a été modifié avec succès.');
        }
    }
    //cette fonction nous permet d'initialiser lers valeurs du courrier et recupere l'id du courrier a modiffier.
    public function mount($id)
    {

        $this->updateMode = true;
        $courriers = courrier::find($id);
        $this->state = [
            'id' => $courriers->id,
            'courrier_libele' => $courriers->courrier_libele,
            'courrier_date_arrive'=>$courriers-> courrier_date_arrive,
            'emeteur_id' => $courriers->emeteur_id,
            'user_id' => $courriers->user_id,
            'emplacement_id' => $courriers->emplacement_id,
        ];

    }

    public function render()
    {
        // $courrier = courrier::find(3);
        $emet = emeteur::all();
        $dest = user::all();
        $empla = emplacement::all();
        return view('livewire.courrier-edit', compact('emet','dest','empla'));
    }
}
