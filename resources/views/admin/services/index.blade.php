@extends('admin.fixe')
@section('titre', 'Services')

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
                            Services
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
                    <input class="form-control px-5" type="search" placeholder="Recherche un Services">
                    <span
                        class="material-symbols-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
                </div>
            </div>
            <div class="col-auto flex-grow-1 overflow-auto">
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <a href="{{ route('services.create') }}" class="btn btn-dark px-4">
                        <i class="bi bi-plus-lg me-2"></i>Ajouter un service
                    </a>
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
                                    <th>Titre</th>
                                    <th>Sous Services</th>
                                    <th>Date modification</th>
                                    <th>Date publication</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                @forelse ($services as $service)
                                    <tr data-id="{{ $service->id }}" id="tr-service-{{ $service->id }}">
                                        <td>
                                            <i class="bi bi-grid-3x3-gap" style="cursor: pointer;"></i>
                                        </td>
                                        <td>
                                            <a class="d-flex align-items-center gap-3" href="javascript:;">
                                                <div class="customer-pic">
                                                    <img src="{{ $service->Cover() }}" class="rounded-circle" width="40"
                                                        height="40" alt="{{ $service->titre }}">
                                                </div>
                                                <p class="mb-0 customer-name fw-bold">
                                                    {{ $service->titre }}
                                                </p>
                                            </a>
                                        </td>
                                        <td> {{ $service->SousServices->count() }} </td>
                                        <td>
                                            {{ $service->updated_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $service->created_at->format('d/m/Y') }}
                                            <x-ModalServices :Id="$service->id"></x-ModalServices>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('services.edit', $service->id) }}" type="button"
                                                class="btn btn-sm btn-dark">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('sous_service', $service->id) }}" type="button"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-list-nested"></i>
                                                Sous-Services
                                            </a>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete{{ $service->id }}">
                                                <i class="bi bi-trash-fill"></i> Supprimer
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="text-center m-3 alert alert-warning">
                                                Aucun service trouvé.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $services->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!--end main content-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <script>
        var sortable = new Sortable(document.getElementById('sortable'), {
            onEnd: function(evt) {
                var order = [];
                var rows = document.querySelectorAll('#sortable tr');
                rows.forEach(function(row) {
                    order.push(row.getAttribute('data-id'));
                });
                $.ajax({
                    url: '{{ route('update.service.order') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        order: order
                    },
                    success: function(response) {
                        console.log('Ordre mis à jour avec succès');
                    },
                    error: function(xhr, status, error) {
                        console.error('Erreur lors de la mise à jour de l\'ordre', error);
                    }
                });
            }
        });
    </script>
@endsection
