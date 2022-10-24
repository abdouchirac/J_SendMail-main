<div>
    <title>j-sendMail vue du courrier</title>
    <div class="py-4">
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
                <li class="breadcrumb-item active" aria-current="page">courrier-show</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h5 class="h4">detail d'un courrier</h5>

            </div>
            <div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <div class="mb-3 mt-5">
                        <h5 class="mb-0"><strong>libellé</strong> ={{$courrier->courrier_libele}}</h5><br>
                        <h5 class="mb-0">date d'arrivée ={{$courrier->courrier_date_arrive }}</h5><br>
                            <h5 class="mb-0">statut =  {{$courrier->courrier_status}}</h5><br>
                                <h5 class="mb-0">noms de l'émetteur ={{$courrier->emeteur->emeteur_noms}}</h5><br>
                                    <h5 class="mb-0">noms du destinataire ={{$courrier->user->first_name}}</h5><br>
                                        <h5 class="mb-0">noms de l'emplacement ={{$courrier->emplacement->emplacement_noms}}</h5><br>
                        </div>

                        <div>

                            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
