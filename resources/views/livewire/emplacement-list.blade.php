<div>
    {{-- Stop trying to control. --}}
    <title>enregistrer un emplacement</title>
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">J-sendmail</a></li>
            <li class="breadcrumb-item active" aria-current="page">emplacement</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">enregistrer un emplacement</h1>
            <p class="mb-0">.</p>
        </div>
        <div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-lg-4 col-sm-6">
                      <form wire:submit.prevent="store" action="#" method="POST">
                              <div class="mb-4">
                                    <label for="emplacement_noms">noms de l'emplacement</label>
                                       <input type="text" class="form-control"  wire:model="state.emplacement_noms"id="emplacement_noms" aria-describedby="emplacement_noms">
                                         <small id="" class="form-text text-muted">donnez un noms explicite.</small>
                                             </div>
                                         <div class="mb-3">
                                                <label for="emplacement_detail" class="form-label">detail de l'emplacement</label>
                                                <textarea class="form-control"wire:model="state.emplacement_detail" id="emplacemment_detail" rows="3"></textarea>
                                          </div>
                                             <button class="btn btn-primary" type="submit"value="Ok"  wire:click.prevent="store">envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
