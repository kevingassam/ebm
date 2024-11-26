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
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ Str::limit($service->titre, 20) }}
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Sous-services
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
                    <button type='button' class="btn btn-dark px-4"  data-bs-toggle="modal"
                    data-bs-target="#add">
                        <i class="bi bi-plus-lg me-2"></i>Ajouter un sous-service
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
                                    <th>Titre</th>
                                    <th>Date modification</th>
                                    <th>Date publication</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sous_services as $sous)
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="checkbox">
                                        </td>
                                        <td>
                                            <a class="d-flex align-items-center gap-3" href="javascript:;">
                                                <div class="customer-pic">
                                                    <img src="{{ Storage::url($sous->image) }}" class="rounded-circle" width="40"
                                                        height="40" alt="{{ $sous->titre }}">
                                                </div>
                                                <p class="mb-0 customer-name fw-bold">
                                                    {{ $sous->titre }}
                                                </p>
                                            </a>
                                        </td>
                                        <td>
                                            {{ $sous->updated_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $sous->created_at->format('d/m/Y') }}
                                            <x-ModalSousServices :sous="$sous"></x-ModalSousServices>
                                        </td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#ModalUpdate{{ $sous->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete{{ $sous->id }}">
                                                <i class="bi bi-trash-fill"></i> Supprimer
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-center m-3 alert alert-warning">
                                                Aucun sous-service trouvé.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $sous_services->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!--end main content-->

    

     <!-- Modal -->
 <div class="modal fade" id="ModalUpdate{{ $sous->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    Ajouter un sous-service
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('sous_service.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="service_id" value="{{ $service->id}}" />
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
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="" class="mb-1">Titre</label>
                            <input type="text" class="form-control" required id="titre"
                                value="{{ old('titre') }}" name="titre" required>
                            @error('titre')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <label class="mb-3">Description</label>
                            <textarea class="form-control" cols="4" rows="6" placeholder="write a description here.."
                                name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="small text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="mb-1">image</label>
                        <span class="small text-warning mb-1">
                            ( Fichiers : jpeg,png,jpg )
                        </span>
                        <input type="file" class="form-control" id="image" required name="image">
                        @error('image')
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
@section('scripts')
    <script>
        $("#fancy-file-upload").FancyFileUpload({
            params: {
                action: "fileuploader",
            },
            maxfilesize: 1000000,
        });
    </script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endsection


@section('header')

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/7eigadx4xspqfo7xw2wn60evebnplqcuor4a08g85lc7jq3z/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection
