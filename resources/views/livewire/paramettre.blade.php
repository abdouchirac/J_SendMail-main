@if($updateMode)

@else

@endif
<div>

<title>j_sendmail</title>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">

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
                <li class="breadcrumb-item"><a href="#">J-SENDMAIL</a></li>
                <li class="breadcrumb-item active" aria-current="page">users-index</li>
            </ol>
        </nav>
        <h2 class="h4">Liste des utilisateurs </h2>

    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('live-table') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Nouvel  Utilisateur
        </a>

           </div>
</div>
<div class="table-settings mb-4">
    <div class="row justify-content-between align-items-center">
        <div class="col-9 col-lg-8 d-md-flex">
            <div class="input-group me-2 me-lg-3 fmxw-400">
                <span class="input-group-text">
                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </span>
                <input type="text" class="form-control" placeholder="Search orders" wire:model="name">
            </div>

        <div class="col-3 col-lg-4 d-flex justify-content-end">
            <div class="btn-group">
                <div class="dropdown me-1">

                    <div class="dropdown-menu dropdown-menu-end pb-0">
                        <span class="small ps-3 fw-bold text-dark">Show</span>
                        <a class="dropdown-item d-flex align-items-center fw-bold" href="#">10 <svg
                                class="icon icon-xxs ms-auto" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></a>
                        <a class="dropdown-item fw-bold" href="#">20</a>
                        <a class="dropdown-item fw-bold rounded-bottom" href="#">30</a>
                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-body shadow border-0 table-wrapper table-responsive">

    <table class="table user-table table-hover align-items-center">
        <thead>
            <tr>
                <th class="border-bottom">
                    <div class="form-check dashboard-check">
                        <input class="form-check-input" type="checkbox" value="" id="userCheck55">
                        <label class="form-check-label" for="userCheck55">
                        </label>
                    </div>
                </th>
                <th class="border-bottom">Nom</th>
                <th class="border-bottom">prénom</th>
                <th class="border-bottom">E-mail</th>

                <th class="border-bottom">Statut</th>

                <th class="border-bottom">poste</th>

                <th class="border-bottom">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->users as $value)
            <tr>
                <td>
                    {{ $value->id }}
                    <div class="form-check dashboard-check">
                        <input class="form-check-input" type="checkbox" value="" id="userCheck1">
                        <label class="form-check-label" for="userCheck1">
                        </label>
                    </div>
                </td>
                <td>
                    {{ $value->first_name}}


                </td>
                <td><span class="fw-normal"></span>{{ $value->last_name}}</td>
                <td><span class="fw-normal d-flex align-items-center">{{ $value->email }}</span></td>



                @if ($value->status=='actif')

                <td><span class="fw-bold text-success">{{$value->status}}</span>

                </td>
                @elseif($value->status=='inactif')
                <td><span class="fw-bold text-danger">{{$value->status}}</span>

                </td>
                @endif
                <td><span class="fw-normal"></span>{{ $value->poste->poste_libele }}</td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-sm">
                                <span class="fas fa-ellipsis-h icon-dark"></span>
                            </span>
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu py-0">
                            <a class="dropdown-item rounded-top" href="{{ route('view-details', $value->id) }}"><span class="fas fa-eye me-2"></span>View Details</a>
                            <a class="dropdown-item" href="{{ route('profile', $value->id) }}"> <span class="fas fa-edit me-2"></span>Edit</a>
                            {{-- <a class="dropdown-item text-danger rounded-bottom" href="#" wire:click.prevent="delete({{  $value->id }})"> </span class="fas fa-trash-alt me-2"></span>Remove</a> --}}
                            <a class="dropdown-item text rounded-bottom" href="#"    wire:click.prevent="changeStatut({{ $value->id }})"></span  class="fw-bold text-success"></span>modifier statut</a>
                        </div>
                    </div>
                    </div>
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        <nav aria-label="Page navigation example">
            <ul class="pagination mb-0">
                  <div> {{$this->users->onEachside(1)->links()}}</div>
            </ul>
        </nav>
</div>
</div>
</div>
