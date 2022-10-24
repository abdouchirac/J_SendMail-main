<main>
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
            <li class="breadcrumb-item active" aria-current="page">users/id/edit</li>
        </ol>
    </nav>
        <!-- Section -->
        <section class="vh-lg-200 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                {{-- <p class="text-center"><a href="{{ route('dashboard') }}" class="text-gray-700"><i class="fas fa-angle-left me-2"></i> Back to homepage</a></p> --}}
                <div wire:ignore.self class="row justify-content-center form-bg-image" data-background-lg="/assets/img/illustrations/signin.svg">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Modifier les données d'un utlisateur</h1>
                            </div>
                            <form wire:submit.prevent="mount" action="#" method="POST">
                                <div class="form-group mt-4 mb-4">
                                    <label for="first_name">Nom</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                          </svg></span>
                                        <input wire:model="state.first_name" id="first_name" type="first_name" class="form-control" placeholder="njutapmvoui" autofocus required>
                                    </div>
                                    @error('first_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                                </div>

                                 <!-- Form -->
                                 <div class="form-group mt-4 mb-4">
                                    <label for="last_name">prénom</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                          </svg></span>
                                        <input wire:model="state.last_name" id="last_name" type="last_name" class="form-control" placeholder="abdou" autofocus required>
                                    </div>
                                    @error('last_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                                </div>

                                 <!-- Form -->

                                <div class="form-group mt-4 mb-4">
                                    <label for="email">Votre e-mail</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon3"><svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg></span>
                                        <input wire:model="state.email" id="email" type="email" class="form-control" placeholder="example@company.com" autofocus required>
                                    </div>
                                    @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                                </div>
                                <!-- End of Form -->
                                <div class="form-group mt-4 mb-4">

                                </a> <label class="my-1 me-2" for="poste_id">poste occupé</label>
                                <select class="form-select" wire:model="state.poste_id" id="poste_id" aria-label="Default select example">
                                    <option selected>selectionez ici</option>
                                    @foreach ($post as $value)
                                    <option value="{{$value->id}}">{{$value->poste_libele}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password">Votre mot de passe</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon4"><svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg></span>
                                        <input wire:model.lazy="state.password" type="password" placeholder="Password" class="form-control" id="password" required>
                                    </div>
                                    @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                                </div>
                            </form>
                                <div class="col-md-6 mb-3">
                                    <button type="submit"wire:click.prevent="update"class="btn btn-primary">Sign in</button>
                                    <button style="float: right" wire:click.prevent="cancel()" class="btn btn-danger">Retour</button>
                                </div>

                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <span class="fw-normal">

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
