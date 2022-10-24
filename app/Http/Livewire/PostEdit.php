<?php

namespace App\Http\Livewire;
use App\Models\poste;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;

class PostEdit extends Component
{

    public $name,  $mailSentAlert,$showDemoNotification, $post_id;
    public $updateMode = false;
    public $search = '';

    protected $messages = [
        'email.exists' => 'The Email Address must be in our database.',
    ];


    //cette fonction permet d'affiche les différents postes d'utilisateurs sur le profil post management
    public function render()
    {

        $postes=poste::when($this->name,function($query,$name){

            return $query->where('poste_libele','LIKE',"%$name%");
        })->orderByRaw('id DESC')->paginate(5);

        return view('livewire.post-edit', compact('postes'));
    }



    }


