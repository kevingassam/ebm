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

        <form action="{{ route('update_about') }}" id="uploadForm" method="post"
            enctype="multipart/form-data">
            <input type="hidden" class="form-control" required placeholder="Nom du projet" value="{{ $infos->app_name }}"
                name="app_name" />
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="mb-4">
                                    <label for="titre" for="about_titre">Titre</label>
                                    <input type="text" class="form-control" name="about_titre"
                                        placeholder="Titre de la page a propos" value="{{ $infos->about_titre }}">
                                </div>
                            </div>
                            <div class="col-4 col-sm-12">
                                <div class="mb-4">
                                    <label class="mb-3" for="about_texte">Description</label>
                                    <textarea class="form-control" cols="4" rows="6" placeholder="write a description here.."
                                        name="about_texte">{{ $infos->about_texte }}</textarea>
                                    @error('about_texte')
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
                                    annuler
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
                                <label for="about_cover" class="form-label fw-bold">
                                    Image de présentation
                                </label>
                                <input type="file" class="form-control" name="about_cover" />
                                @error('about_cover')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <br>
                                <img src="{{ $infos->GetAboutPhotoCover() }}" class="w-100" alt="about_cover"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <label for="pdf_presentation" class="form-label fw-bold">
                                    Pdf de présentation
                                </label>
                                <input type="file" class="form-control" name="pdf_presentation" accept=".pdf" />
                                @error('pdf_presentation')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                @if ($infos->pdf_presentation)
                                    <div class="card mt-2 p-2 ">
                                        <div class="mb-2">
                                            <iframe src="{{ Storage::url($infos->pdf_presentation) }}" class="w-100" frameborder="0"></iframe>
                                        </div>
                                        <a href="{{ Storage::url($infos->pdf_presentation) }}" target="_blank">
                                            <i class="bi bi-file-pdf"></i>
                                            Voir le pdf
                                        </a>
                                    </div>
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

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/prci1ask4660amvheuqm4tcy5y725g238o05h4g3rii7zkdd/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
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
