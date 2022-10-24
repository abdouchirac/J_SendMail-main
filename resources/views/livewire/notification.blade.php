<div>
    <title>Volt Laravel Dashboard - Buttons</title>
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Components</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buttons</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">detail d'un notification</h1>
                <p class="mb-0">Dozens of reusable components built to provide buttons, alerts, popovers, and more.</p>
            </div>
            <div>
                <a href="/documentation/components/buttons/index.html" class="btn btn-outline-gray" target="_blank"><i class="far fa-question-circle me-1"></i> Buttons Docs</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <div class="mb-3 mt-5">

                        <h1 class="h4">FICHE D'UN COURRIER</h1>
                        <h1 class="h4"><strong>libele</strong> ={{$notification->type}}</h1>
                        <h1 class="h4">date d'arrivée ={{$notification->notifiable}}</h1>
                            <h1 class="h4">statut ={{$notification->courrier_status}}</h1>
                                <h1 class="h4">noms de l'emeteur ={{$notification->data}}</h1>

                        </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
