@extends('admin.fixe')
@section('titre', 'Configurations')

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
                            Configurations
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
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-4">
                                        <h6 class="mb-1">Nom du site web</h6>
                                        <input type="text" class="form-control" required placeholder="Nom du projet"
                                            value="{{ $infos->app_name }}" name="app_name" />
                                        @error('app_name')
                                            <span class="small text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <h6 class="mb-1">Email 1</h6>
                                        <input type="email" class="form-control" value="{{ $infos->email1 }}"
                                            name="email1" />
                                        @error('email1')
                                            <span class="small text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <h6 class="mb-1">Email 2</h6>
                                        <input type="email" class="form-control" value="{{ $infos->email2 }}"
                                            name="email2" />
                                        @error('email2')
                                            <span class="small text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <h6 class="mb-1">Téléphone 1</h6>
                                        <input type="tel" class="form-control" value="{{ $infos->tel1 }}"
                                            name="tel1" />
                                        @error('tel1')
                                            <span class="small text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <h6 class="mb-1">Téléphone 2</h6>
                                        <input type="tel" class="form-control" value="{{ $infos->tel2 }}"
                                            name="tel2" />
                                        @error('tel2')
                                            <span class="small text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <h6 class="mb-1">Adresse 1</h6>
                                        <input type="text" class="form-control" value="{{ $infos->adresse1 }}"
                                            name="adresse1" />
                                        @error('adresse1')
                                            <span class="small text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <h6 class="mb-1">Adresse 2</h6>
                                        <input type="text" class="form-control" value="{{ $infos->adresse2 }}"
                                            name="adresse2" />
                                        @error('adresse2')
                                            <span class="small text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-4">
                                        <h6 class="mb-1">Texte dans le footer du site</h6>
                                        <textarea name="text_footer" id="text_footer" class="form-control" rows="3">{{ $infos->text_footer }}</textarea>
                                        @error('text_footer')
                                            <span class="small text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="col-sm-12">
                                        <div class="mb-4">
                                            <h6 class="mb-1">Adresse url de la carte map</h6>
                                            <textarea name="map" id="map" class="form-control" rows="2">{{ $infos->map }}</textarea>
                                            @error('map')
                                                <span class="small text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                <div class="col-sm-12">
                                    <div class="mb-4">
                                        <h6 class="mb-1">Vidéo / Image pour la bannière</h6>
                                        <div class="small text-warning">
                                            - Pour la bannière, vous pouvez utiliser une image ou une vidéo. <br>
                                            - L'image doit être au format PNG, JPEG ou GIF. La vidéo doit être au format
                                            MP4.
                                        </div>
                                        <input type="file" class="form-control" name="video" />
                                        @error('video')
                                            <span class="small text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h6>
                                Gestion des réseaux
                            </h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="facebook">Facebook</label>
                                    <input type="url" name="facebook" id="facebook" class="form-control" value="{{ $infos->facebook }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="twitter">twitter</label>
                                    <input type="url" name="twitter" id="twitter" class="form-control" value="{{ $infos->twitter }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="youtube">youtube</label>
                                    <input type="url" name="youtube" id="youtube" class="form-control" value="{{ $infos->youtube }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="linkedin">linkedin</label>
                                    <input type="url" name="linkedin" id="linkedin" class="form-control" value="{{ $infos->linkedin }}">
                                </div>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <label for="Tags" class="form-label fw-bold">Logo du site</label>
                                <div class="text-warning small mb-1">
                                    - Vous pouvez utiliser une image au format PNG, JPEG ou SVG. <br>
                                    - La taille de l'image doit être de 792x233 pixels.
                                </div>
                                <input type="file" class="form-control" name="logo" />
                                @error('logo')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center mt-3">
                                <img src="{{ $infos->GetLogo() }}" alt="{{ $infos->app_name }}" height="40"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <label for="Tags" class="form-label fw-bold">Icon du site</label>
                                <input type="file" class="form-control" name="icon" />
                                @error('icon')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center mt-3">
                                <img src="{{ $infos->GetIcon() }}" alt="{{ $infos->app_name }}" height="40"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                    @if ($infos->map)
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mt-3">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5582.609118491117!2d-73.54149799999998!3d45.604523300000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91ddec4869e59%3A0x5dec9f78f6200f29!2s5685%20Avenue%20St%20Donat%2C%20Anjou%2C%20QC%20H1K%203P6!5e0!3m2!1sfr!2sca!4v1730073274193!5m2!1sfr!2sca"
                                        class="w-100" height="250" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-3">
                                <h6>
                                    Banniére {{ $infos->GetTypeMedia() }}
                                </h6>
                                @if ($infos->GetTypeMedia() == 'video')
                                    <video  id="video" src="{{ $infos->GetVideo() }}"
                                        loop="" muted="" autoplay="" class="w-100">
                                    </video>
                                @else
                                    <img src="{{ $infos->GetVideo() }}" class="w-100" alt="" srcset="">
                                @endif
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
