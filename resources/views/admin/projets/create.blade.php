@extends('admin.fixe')
@section('titre', 'Ajouter un projet')

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
                            Ajouter un projet
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->

        <form action="{{ route('projets.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <label class="mb-3">nom</label>
                                <input type="text" class="form-control" required placeholder="Nom du projet"
                                    name="nom" />
                                @error('nom')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="mb-3">Description</label>
                                <textarea class="form-control" cols="4" rows="6" placeholder="write a description here.."
                                    name="description"></textarea>
                                @error('description')
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
                                    Publier l'article
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="type">
                                        Type de projet
                                    </label>
                                    <select name="type" class="form-select" id="type">
                                        <option value="résidentiel">Résidentiel</option>
                                        <option value="commercial">Commercial</option>
                                    </select>
                                    @error('type')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="video">
                                        Lien vidéo youtube
                                    </label>
                                    <input type="url" class="form-control" id="video" name="video" />
                                </div>
                                <div class="col-12">
                                    <label for="statut">
                                        Statut du projet
                                    </label>
                                    <select name="statut" class="form-select" id="statut">
                                        <option value="en cours">En cours</option>
                                        <option value="terminé">Terminé</option>
                                    </select>
                                    @error('statut')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="map">
                                        Url map pour la carte
                                    </label>
                                    <input type="text" class="form-control" name="map" id="map" />
                                    @error('map')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="photo">Image d'illustration</label>
                                    <div class="text-warning small">
                                        Taille : 416px * 400px
                                    </div>
                                    <input type="file" class="form-control" name="photo" id="photo" required />
                                    @error('photo')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="photos">Gallerie de photos</label>
                                    <div class="text-warning small">
                                        Taille : 1296px * 555px
                                    </div>
                                    <input type="file" class="form-control" name="photos[]" id="photos" multiple />
                                    @error('photos')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--end row-->
    </main>
    <!--end main content-->


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
