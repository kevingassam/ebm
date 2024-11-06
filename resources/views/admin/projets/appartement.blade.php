@extends('admin.fixe')
@section('titre', $appartement->nom)

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
                            {{ $appartement->nom }}
                            <span class="text-capitalize">
                                ( {{ $appartement->type }} )
                            </span>
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
                    <input class="form-control px-5" type="search" placeholder="Recherche d'article">
                    <span
                        class="material-symbols-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
                </div>
            </div>
            <div class="col-auto flex-grow-1 overflow-auto">
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <button type="button" class="btn btn-dark px-4" data-bs-toggle="modal" data-bs-target="#AjouteEtage">
                        <i class="bi bi-plus-lg me-2"></i>Ajouter un apppartement
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
                                    <th>ID</th>
                                    <th>Référence</th>
                                    <th>Numéro</th>
                                    <th>étage</th>
                                    <th>Type</th>
                                    <th>vocation</th>
                                    <th>Surface</th>
                                    @if ($appartement->type == 'habitation')
                                        <th>Surface Terrasse</th>
                                    @endif
                                    <th>Pièces</th>
                                    <th>Chambres</th>
                                    <th>Prix</th>
                                    <th>Plan</th>
                                    <th>Date publication</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($appartement->DetailsAppartement as $maison)
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="checkbox">
                                        </td>
                                        <td>{{ $maison->id }}</td>
                                        <td>{{ $maison->reference ?? '-' }}</td>
                                        <td>{{ $maison->numero }}</td>
                                        <td class="text-capitalize">{{ $maison->etage }}</td>
                                        <td class="text-capitalize">{{ $maison->type }}</td>
                                        <td class="text-capitalize">{{ $maison->vocation ?? '-' }}</td>
                                        <td>{{ $maison->surface }}</td>
                                        @if ($appartement->type == 'habitation')
                                            <td>{{ $maison->surface_terrase ?? '-' }}</td>
                                        @endif
                                        <td>{{ $maison->piece }}</td>
                                        <td>{{ $maison->chambre ?? '0' }}</td>
                                        <td>
                                            @if ($maison->prix)
                                                {{ $maison->prix }} DT
                                            @else
                                                <b class="text-danger">
                                                    Démande !
                                                </b>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ Storage::url($maison->plan) }}"
                                                class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-file-earmark-pdf"></i> PDF
                                            </a>
                                        </td>
                                        <td>
                                            {{ $maison->created_at->format('d-m-Y H:m') }}
                                            <x-ModalEtage :Id="$maison->id"></x-ModalEtage>
                                        </td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-dark" type="button" data-bs-toggle="modal"
                                                data-bs-target="#ModalUpdate{{ $maison->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete{{ $maison->id }}">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ $appartement->type == 'habitation' ? '15' : '14' }}"
                                            class="text-center p-3">
                                            <div class="alert alert-warning">
                                                Aucun étage disponible.
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


    <div class="modal fade" id="AjouteEtage" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">
                        Ajouté un appartement
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger small">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('etages.store') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="appartement_id" id="appartement_id" value="{{ $appartement->id }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-6 col-6">
                                <label for="" class="mb-1">Référence</label>
                                <input type="text" class="form-control" required id="reference"
                                    value="{{ old('reference') }}" name="reference" required>
                                @error('reference')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-6">
                                <label for="" class="mb-1">Numéro</label>
                                <input type="text" class="form-control" required id="numero"
                                    value="{{ old('numero') }}" name="numero" required>
                                @error('numero')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-1">Etage</label>
                            <input type="text" class="form-control" required id="etage"
                                value="{{ old('etage') }}" name="etage" required>
                            @error('etage')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6 col-6">
                                <label for="" class="mb-1">Type</label>
                                <select class="form-select" required id="type" name="type">
                                    <option value="résidentiel">Résidentiel</option>
                                    <option value="commercial">Commercial</option>
                                </select>
                                @error('type')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-6">
                                <label for="" class="mb-1">Vocation</label>
                                <select class="form-select" required id="vocation" name="vocation">
                                    <option value="location">Location</option>
                                    <option value="vente">Vente</option>
                                </select>
                                @error('vocation')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6 col-6">
                                <label for="" class="mb-1">Surface</label>
                                <input type="text" class="form-control" required id="surface" name="surface"
                                    value="{{ old('surface') }}" required>
                                @error('surface')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            @if ($appartement->type == 'habitation')
                                <div class="col-sm-6 col-6">
                                    <label for="" class="mb-1">Surface de la terrasse</label>
                                    <input type="text" class="form-control" required id="surface_terrase"
                                        name="surface_terrase" value="{{ old('surface_terrase') }}">
                                    @error('surface_terrase')
                                        <span class="small text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            @endif
                            <div class="col-sm-6 col-6">
                                <label for="" class="mb-1">Nombre de pièce</label>
                                <input type="text" class="form-control" required id="piece"
                                    value="{{ old('piece', 0) }}" name="piece" required>
                                @error('piece')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-6">
                                <label for="" class="mb-1">Nombre de chambre</label>
                                <input type="text" class="form-control" required id="chambres"
                                    value="{{ old('chambres', 0) }}" name="chambres" required>
                                @error('chambres')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-6">
                                <label for="" class="mb-1">Prix</label>
                                <input type="number" step="0.1" class="form-control" id="prix"
                                    value="{{ old('prix') }}" name="prix">
                                <div class="small text-warning">
                                    Laisser null si c'est sur commande.
                                </div>
                                @error('prix')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-1">Plan</label>
                            <span class="small text-warning mb-1">
                                ( Fichiers : jpeg,png,jpg,pdf )
                            </span>
                            <input type="file" class="form-control" required id="plan" name="plan" required>
                            @error('plan')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm"
                                data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-dark">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
