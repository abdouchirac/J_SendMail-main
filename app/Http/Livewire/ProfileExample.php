<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Image;
use App\Models\poste;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProfileExample extends Component
{
    use WithFileUploads;

    public $images ;
    public $users;
    public  $postes;
    public $title;
    public $poste_libele;
    public $email;
    public $showSavedAlert = false;
    public $showDemoNotification = false;
    public $showData = true;
    public $createData = false;
    public $updateData = false;


    public $image;

    public $edit_id;
    public $edit_title;
    public $old_image;
    public $new_image;
    use WithFileUploads;

    public $photo;


// la fonction rules permet de récupérer les informations utilisateur de la base de données pour affiche ou niveau de son profil

    public function rules()
    {
        return [
        'user.first_name' => 'max:15',
        'user.last_name' => 'max:20',
        'user.email' => 'email',
        'postes.poste_libele'=>'poste_libele',
        'user.gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
        'user.address' => 'max:40',
        'user.number' => 'numeric',
        'user.city' => 'max:20',
        'user.ZIP' => 'numeric',

    ];

    }

    //la fonction mount permet de récupérer les informations utilisateur  dans la table historiqque de la base de données pour affiche ou niveau de son profil
    public function mount()

    {
        $this->user = auth()->user();
         $Poste = poste::where('id',$this->user->id)->first();
         $this->postes= poste::all();
         $this->images=Image::all();
    }



    public function resetField()
    {
        $this->title = "";
        $this->image = "";
        $this->new_image = "";
        $this->old_image = "";

    }

        use WithFileUploads;


//la fonction create permet d'enregistrer l'image sur le profile

    public function create()
    {

        $images = new Image();
        $this->validate([

            'image' => 'image|max:4024',
        ]);

        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('posts', 'public');
        } else{
            $filename = Null;
        }
        session()->flash('message', 'vous avez  modifié avec succès.');

        $images->images = $filename;

        $result = $images->save();
        $users=User::where('email',$this->user->email)->update(['image_id'=>$images->id]);
        session()->flash('message', 'vous avez  modifié votre photo profile avec succès.');
        redirect()->intended('/profile');
        if ($result) {
            session()->flash('success', 'Add Successfully');
            $this->resetField();
            $this->showData = true;

            $this->createData = false;
        } else {
            session()->flash('error', 'Not Add Successfully');
        }
    }

    public function render()
    {
        $this->images=Image::all();
        $this->postes= poste::all();
        $this->users = User::all();
        return view('livewire.profile-example');
    }
}
