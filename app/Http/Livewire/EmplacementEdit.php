<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\emplacement;

class EmplacementEdit extends Component
{

    public $Emplacement;
    public $state = [];
   public $updateMode = false;


   public function edit($id)
   {
       $this->updateMode = true;
       $emplacements = courrier::find($id);

       $this->state = [
           'emplacement_id' => $emplacements->emplacement_id,
           'emplacement_noms' => $emplacements->emplacement_noms,
           'emplacement_detail'=>$emplacements->emplacement_detail,

       ];
   }
   private function resetInputFields(){
       $this->reset('state');
   }

   public function update()
   {

       $validator = Validator::make($this->state, [
           'emplacement_noms' => 'required|max:100',
           'emplacement_detail' =>'required|max:100',
       ])->validate();

       if ($this->state['emplacement_id']) {
           $emplacements = emplacement::find($this->state['emplacement_id']);
           $emplacements->update([
               'emplacement_noms' => $this->state['emplacement_noms'],
               'emplacement_detail' => $this->state['emplacement_detail'],
           ]);

           $this->updateMode = false;
           $this->reset('state');
           $this->Emplacement = emplacement::all();
           redirect()->intended('/courrier-index')->with('message', 'emplacement modifié avec succès.');
       }
   }
   public function mount($id)
   {
       $this->updateMode = true;
       $emplacements = emplacement::find($id);
       $this->state = [
           'emplacement_id' => $emplacements->id,
           'emplacement_noms' => $emplacements->emplacement_noms,
           'emplacement_detail'=>$emplacements-> emplacement_detail,
       ];
    }
    public function render()
    {

        return view('livewire.emplacement-edit');
    }
}
