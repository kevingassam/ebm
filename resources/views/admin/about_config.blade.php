@extends('admin.fixe')
@section('titre', 'Page à-propos')

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
                            Page à-propos
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
            <input type="hidden" class="form-control" required placeholder="Nom du projet" value="{{ $infos->app_name }}"
                name="app_name" />
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-8">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="mb-4">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" name="about_titre"
                                        value="{{ $infos->about_titre }}">
                                </div>
                            </div>
                            <div class="col-4 col-sm-12">
                                <div class="mb-4">
                                    <h6 class="mb-1">Paragraphe 1</h6>
                                    <textarea name="about_texte1" id="about_texte1" class="form-control" rows="3">{{ $infos->about_texte1 }}</textarea>
                                    @error('about_texte1')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 col-sm-12">
                                <div class="mb-4">
                                    <h6 class="mb-1">Paragraphe 2</h6>
                                    <textarea name="about_texte2" id="about_texte2" class="form-control" rows="3">{{ $infos->about_texte2 }}</textarea>
                                    @error('about_texte2')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 col-sm-12">
                                <div class="mb-4">
                                    <h6 class="mb-1">Paragraphe 3</h6>
                                    <textarea name="about_texte3" id="about_texte3" class="form-control" rows="3">{{ $infos->about_texte3 }}</textarea>
                                    @error('about_texte3')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
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
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <label for="Tags" class="form-label fw-bold">
                                    Video
                                </label>
                                <input type="file" class="form-control" name="about_video" />
                                @error('about_video')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                @if ($infos->about_video)
                                <video  id="video" src="{{ Storage::url($infos->about_video) }}"
                                    loop="" muted="" autoplay="" class="w-100">
                                </video>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <label for="about_photo1" class="form-label fw-bold">
                                    Image de paragraphe 1
                                </label>
                                <input type="file" class="form-control" name="about_photo1" />
                                @error('about_photo1')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                @if ($infos->about_photo1)
                                <img src="{{ Storage::url($infos->about_photo1) }}" class="w-100" alt="" srcset="">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <label for="about_photo2" class="form-label fw-bold">
                                    Image de paragraphe 2
                                </label>
                                <input type="file" class="form-control" name="about_photo2" />
                                @error('about_photo2')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                @if ($infos->about_photo2)
                                <img src="{{ Storage::url($infos->about_photo2) }}" class="w-100" alt="" srcset="">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <label for="about_photo3" class="form-label fw-bold">
                                    Image de paragraphe 3
                                </label>
                                <input type="file" class="form-control" name="about_photo3" />
                                @error('about_photo3')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                @if ($infos->about_photo3)
                                <img src="{{ Storage::url($infos->about_photo3) }}" class="w-100" alt="" srcset="">
                                @endif
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
