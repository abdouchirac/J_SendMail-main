<div>
    <title>j_sendmail</title>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">J-sendmail</a></li>
            <li class="breadcrumb-item active" aria-current="page">profile</li>
        </ol>
    </nav>
    <form method="POST" wire:submit.prevent="update">
        <div class="mt-3">

       </div>
       <br>
       <br>
    <div class="row">
        <div class="col-12 col-xl-8">
            @if($showSavedAlert)
            <div class="alert alert-success" role="alert">

            </div>
            @endif
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4"> Informations Générales</h2>
                <br>
                <a class="dropdown-item"style="float:rigth" href="{{ route('profile',$this->user->id) }}"> <span class="fas fa-edit me-1"></span>Modifier le profil</a>
                <a class="dropdown-item"style="float:rigth" href="{{ route('modiffier-pwd',$this->user->id) }}"> <span class="fas fa-edit me-1"></span>Modifier password</a>
                <br>
                <form wire:submit.prevent="save" action="#" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="first_name"> Nom</label>
                                <input wire:model="user.first_name" class="form-control" id="first_name" type="text"
                                    placeholder="Enter your first name" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Prénom</label>
                                <input wire:model="user.last_name" class="form-control" id="last_name" type="text"
                                    placeholder="Also your last name" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input wire:model="user.email" class="form-control" id="email" type="email"
                                    placeholder="name@company.com" disabled>
                            </div>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">

                            <div class="form-group">
                                <label for="email">Poste </label>
                                <input wire:model="user.poste_libele" class="form-control" id="poste.poste_libele" type="poste.poste_libele"
                                    placeholder="{{$user->poste->poste_libele}}" disabled>
                            </div>
                            @error('poste_libele') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </form>
                @if($showDemoNotification)
                <div class="alert alert-info mt-2" role="alert">
                    You cannot do that in the demo version.
                </div>
                @endif
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card shadow border-0 text-center p-0">
                        <div wire:ignore.self class="profile-cover rounded-top"
                            data-background="../assets/img/profile-cover.jpg">   
                            @if(empty(auth()->user()->Image->images ))
                                
                            
                            <img class="avatar rounded-circle" alt="Image placeholder" src="/assets/img/team/profile-picture-1.jpg" style="width: 200px; height:250px;">
                            
                            @else 
                            <img alt="Image placeholder" src="/storage/{{auth()->user()->Image->images}}" style="width: 200px; height:250px;" class="avatar rounded-circle">
              
                            @endif</div>
                        <div class="card-body pb-5">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" wire:submit.prevent='create'>
                                        <div class="card-body">
                                            
                                            <div class="custom-file mt-3">
                                                <input type="file" wire:model='image' class="custom-file-input" id="customFile"  >
             
                
                                                
                                            </div>
                                            
                                            @if ($image)
                                            <img src="{{$image->temporaryUrl()}}" style="width: 200px;height:200px;" alt="" class="avatar rounded-circle">
                                            @endif
                                        </div>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>

                                        </div>

                                    </form>
                                </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<div>


