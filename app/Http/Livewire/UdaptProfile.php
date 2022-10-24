<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Image;
use Carbon\Carbon;

class UdaptProfile extends Component
{

    public    $images;
    public function render()
    {
        $images = Image::orderBy('id','DESC')->get();
        return view('livewire.udapt-profile');
    }

    use WithFileUploads;


    public $image;
    

    public function mount()
    {
        
    }


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'image' => 'required',
        ]);
    }
    
    public function uploadImage()
    {
        $this->validate([
            'image' => 'required',
        ]);


        $image = new Image();


        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image->storeAs('image_uploads', $imageName);
        $image->image = $imageName;


        $image->save();


        session()->flash('message', 'Image has been uploaded successfully');


        $this->image = '';


    }
    

}
