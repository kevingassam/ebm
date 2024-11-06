@extends('admin.fixe')
@section('titre', 'Bannières')

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
                            <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Bannières
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->

        <form action="{{ route('configurations.update', $infos->id) }}" id="uploadForm" method="post"
            enctype="multipart/form-data">
            <input type="hidden" class="form-control" required placeholder="Nom du projet"
                                            value="{{ $infos->app_name }}" name="app_name" />
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="card card-body">
                                <div class="mb-2">
                                    <img src="{{ $infos->GetCoverContact() }}" alt="{{ $infos->app_name }}" class="w-100">
                                </div>
                                <label for="cover_contact" class="form-label fw-bold">
                                    Page Contact
                                </label>
                                <div class="small text-warning">
                                    - Taille : <b>1920 px * 401 px</b>.
                                </div>
                                <input type="file" class="form-control" name="cover_contact" id="cover_contact" />
                                @error('cover_contact')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card card-body">
                                <div class="mb-2">
                                    <img src="{{ $infos->GetCoverBlog() }}" alt="{{ $infos->app_name }}" class="w-100">
                                </div>
                                <label for="cover_blog" class="form-label fw-bold">
                                    Page blog
                                </label>
                                <div class="small text-warning">
                                    - Taille : <b>1920 px * 401 px</b>.
                                </div>
                                <input type="file" class="form-control" name="cover_blog" id="cover_blog" />
                                @error('cover_blog')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card card-body">
                                <div class="mb-2">
                                    <img src="{{ $infos->GetCoverProjet() }}" alt="{{ $infos->app_name }}" class="w-100">
                                </div>
                                <label for="cover_projet" class="form-label fw-bold">
                                    Page projet
                                </label>
                                <div class="small text-warning">
                                    - Taille : <b>1920 px * 401 px</b>.
                                </div>
                                <input type="file" class="form-control" name="cover_projet" id="cover_projet" />
                                @error('cover_projet')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card card-body">
                                <div class="mb-2">
                                    <img src="{{ $infos->GetCoverAbout() }}" alt="{{ $infos->app_name }}" class="w-100">
                                </div>
                                <label for="cover_about" class="form-label fw-bold">
                                    Page about
                                </label>
                                <div class="small text-warning">
                                    - Taille : <b>1920 px * 401 px</b>.
                                </div>
                                <input type="file" class="form-control" name="cover_about" id="cover_about" />
                                @error('cover_about')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="card card-body">
                                <div class="mb-2">
                                    <img src="{{ $infos->GetCoverContact2() }}" alt="{{ $infos->app_name }}" class="w-100">
                                </div>
                                <label for="cover_contact2" class="form-label fw-bold">
                                    Image principale de la page contact
                                </label>
                                <div class="small text-warning">
                                    - Taille : <b>1920 px * 817 px</b>.
                                </div>
                                <input type="file" class="form-control" name="cover_contact2" id="cover_contact2" />
                                @error('cover_contact2')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <button type="button" class="btn btn-sm btn-danger px-4">
                                    annuller
                                </button>
                                <button type="submit" class="btn btn-dark px-4">
                                    Mettre a jour
                                </button>
                            </div>
                            <div class="progress mt-3" style="display: none;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--end row-->
    </main>
    <!--end main content-->



@endsection
@section('header')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#uploadForm').on('submit', function(e) {
                e.preventDefault();

                // Récupérer l'action et la méthode du formulaire
                var formAction = $(this).attr('action');
                var formMethod = $(this).attr('method');
                var formData = new FormData(this);

                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();

                        // Mise à jour de la barre de progression
                        xhr.upload.addEventListener('progress', function(e) {
                            if (e.lengthComputable) {
                                var percentComplete = Math.round((e.loaded / e.total) *
                                    100);
                                $('.progress').show();
                                $('.progress-bar').css('width', percentComplete + '%');
                                $('.progress-bar').text(percentComplete + '%');
                            }
                        }, false);

                        return xhr;
                    },
                    url: formAction, // Utiliser l'action du formulaire
                    type: formMethod, // Utiliser la méthode du formulaire
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.statut) {
                            $('.progress').hide();
                            $('.progress-bar').css('width', '0%').text('0%');
                            Swal.fire('Mise à jour réussie', response.message, 'success');

                            //waite 3 seconde and relaod
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        } else {
                            $('.progress').hide();
                            $('.progress-bar').css('width', '0%').text('0%');
                        }
                    },
                    error: function() {
                        alert('Erreur lors du téléchargement du fichier.');
                        $('.progress').hide();
                        $('.progress-bar').css('width', '0%').text('0%');
                    }
                });
            });
        });
    </script>
@endsection
