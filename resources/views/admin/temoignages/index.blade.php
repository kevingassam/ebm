@extends('admin.fixe')
@section('titre', 'témoignages')

@section('body')
    <!--start main content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ $infos->app_name }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Liste des témoignages
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->


        <div class="row g-3">
            <div class="col-auto">
                <div class="position-relative">
                    <input class="form-control px-5" type="search" placeholder="Recherche un témoignage">
                    <span
                        class="material-symbols-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
                </div>
            </div>
            <div class="col-auto flex-grow-1 overflow-auto">
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <button type="button" class="btn btn-dark px-4" data-bs-toggle="modal"
                        data-bs-target="#AjouterTemoignage">
                        <i class="bi bi-plus-lg me-2"></i>Ajouter
                    </button>
                </div>
            </div>
        </div><!--end row-->

        <div class="card mt-4">
            <div class="card-body">
                <div class="customer-table">
                    <div class="table-responsive white-space-nowrap">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>
                                        <input class="form-check-input" type="checkbox">
                                    </th>
                                    <th>Nom</th>
                                    <th>Poste</th>
                                    <th>Note</th>
                                    <th>Date modification</th>
                                    <th>Date publication</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($temoignages as $item)
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="checkbox">
                                        </td>
                                        <td>
                                            <a class="d-flex align-items-center gap-3" href="javascript:;">
                                                <div class="customer-pic">
                                                    <img src="{{ $item->Cover() }}" class="rounded-circle"
                                                        width="40" height="40" alt="">
                                                </div>
                                                <p class="mb-0 customer-name fw-bold">
                                                    {{ $item->nom }}
                                                </p>
                                            </a>
                                        </td>
                                        <td>
                                            {{ $item->poste }}
                                        </td>
                                        <td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $item->note)
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                @else
                                                    <i class="bi bi-star-fill text-secondary"></i>
                                                @endif
                                            @endfor
                                        </td>
                                        <td>
                                            {{ $item->updated_at->diffForHumans()  }}
                                        </td>
                                        <td>
                                            {{ $item->created_at->format('d/m/Y') }}
                                            <x-ModalTemoignages :id="$item->id"></x-ModalTemoignages>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#ModalUpdate{{ $item->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete{{ $item->id }}">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <div class="text-center m-3 alert alert-warning">
                                                Aucun témoignage trouvé.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!--end main content-->


    <!-- Modal -->
    <div class="modal fade" id="AjouterTemoignage" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">
                        Ajouter un témoignage
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('temoignages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" required id="nom" name="nom" >
                                @error('nom')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="poste">Poste</label>
                                <input type="text" class="form-control" required id="poste" name="poste" >
                                @error('poste')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="note">Note ( 0 - 5 ) </label>
                                <div class="form-control">
                                    <input type="range" class="w-100" required min="0" max="5"
                                        id="note" name="note" >
                                </div>
                                @error('note')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="photo">Photo avatar</label>
                                <input type="file" class="form-control" required id="photo" name="photo" >
                                @error('photo')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message">Message</label>
                            <textarea class="form-control" required id="message" name="message" rows="5"></textarea>
                            @error('message')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">
                            Fermer
                        </button>
                        <button type="submit" class="btn btn-dark">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
