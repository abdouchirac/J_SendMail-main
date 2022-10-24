
<div>
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
            <li class="breadcrumb-item active" aria-current="page">view-details</li>
        </ol>
    </nav>
    <form method="POST" wire:submit.prevent="update">
        <div class="mt-3">

       </div>
       <br>
       <br>
    <div class="row">
        <div class="col-12 col-xl-7">
            @if($showSavedAlert)
            <div class="alert alert-success" role="alert">

            </div>
            @endif
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4"> Information générale</h2>
                <br>

                <br>


                <form wire:submit.prevent=" mount" action="#" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="first_name">Nom</label>
                                <input wire:model="state.first_name" class="form-control" id="first_name" type="text"
                                    placeholder="Enter your first name" disabled>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Prénom</label>
                                <input wire:model="state.last_name" class="form-control" id="last_name" type="text"
                                    placeholder="Also your last name" disabled>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input wire:model="state.email" class="form-control" id="email" type="email"
                                    placeholder="name@company.com" disabled>
                            </div>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">

                            <div class="form-group">
                                <label for="poste">Poste </label>
                                <input wire:model="state.poste_id" class="form-control" id="poste_id" type="poste_id" placeholder="hello" disabled>

                            </div>
                            @error('poste_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div>

                           <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
                       </div>
                    </div>
            </div>
</form>
             <div class="col-12 col-xl-4">
                <div class="row">

                    <div class="col-12 mb-4">

                       </div>
                            </div>
                        </div>


                    <div class="col-12" >

                        <div class="card card-body border-10 shadow">
                            <h2 class="h5 mb-4" >Authorisation</h2>
                            <div class="d-flex align-items-right">
                                <div class="me-3">
                                    <!-- Avatar -->
                                </div>

                                <div class="file-field">
                                    <div class="d-flex justify-content-xl-center ms-xl-3">
                                        <div class="d-flex">
                                            <div class="d-md-block text-left">
                                                <form>
                                                @foreach ( $per as $permission)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"   wire:model="permiss" id="good" value="{{$permission->id }}" name="good">

                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        {{$permission->permission_libele }}
                                                    </label>
                                                  </div>
                                                  @endforeach

                                             <div class="mb-3"><button class="btn btn-primary" type="submit"value="Ok"  wire:click.prevent="inserpermission">envoyer</button>

                                           <div class="mb-3"style="float: right"> <button wire:click.prevent="deletepermission" class="btn btn-danger">supprimer</button></div>
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
        </div>
    </div>

