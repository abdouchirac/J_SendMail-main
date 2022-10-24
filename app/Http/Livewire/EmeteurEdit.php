<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\emeteur;

class EmeteurEdit extends Component
{

    public $Emeteur;
    public $state = [];
   public $updateMode = false;


   public function edit($id)
   {
       $this->updateMode = true;
       $emeteurs = courrier::find($id);

       $this->state = [
           'emeteur_id' => $emeteurs->emeteur_id,
           'emeteur_noms' => $emeteurs->emeteur_noms,
       ];
   }
   private function resetInputFields(){
       $this->reset('state');
   }

   public function update()
   {

       $validator = Validator::make($this->state, [
           'emeteur_noms' => 'required|max:100',
       ])->validate();

       if ($this->state['emeteur_id']) {
           $emeteurs = emeteur::find($this->state['emeteur_id']);
           $emeteurs->update([
               'emeteur_noms' => $this->state['emeteur_noms'],

            ]);
           $this->updateMode = false;
           $this->reset('state');
           $this->Emeteur = emeteur::all();
           redirect()->intended('/emeteur-index')->with('message', 'emeteur modifié avec succès.');
       }
   }
   public function mount($id)
   {
       $this->updateMode = true;
       $emeteurs = emeteur::find($id);
       $this->state = [
           'emeteur_id' => $emeteurs->id,
           'emeteur_noms' => $emeteurs->emeteur_noms,

       ];
    }

    public function render()
    {

        return view('livewire.emeteur-edit');
    }
}
