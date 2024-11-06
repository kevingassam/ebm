@extends('admin.fixe')
@section('titre', 'Modifier le projet')

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
                            Modifier le projet
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->

        <form action="{{ route('projets.update', $projet->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <label class="mb-3">nom</label>
                                <input type="text" class="form-control" required placeholder="Nom du projet"
                                    value="{{ $projet->nom }}" name="nom" />
                                @error('nom')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="mb-3">Description</label>
                                <textarea class="form-control" cols="4" rows="6" placeholder="write a description here.."
                                    name="description">{{ $projet->description }}</textarea>
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
                                    Mettre a jour
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="col-12">
                                        <label for="type">
                                            Type de projet
                                        </label>
                                        <select name="type" class="form-select" id="type">
                                            <option value="résidentiel" @selected($projet->type == 'résidentiel')>Résidentiel</option>
                                            <option value="commercial" @selected($projet->type == 'commercial')>Commercial</option>
                                        </select>
                                        @error('type')
                                            <span class="small text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <label for="Tags">
                                        Lien vidéo youtube
                                    </label>
                                    <input type="url" class="form-control" value="{{ $projet->video }}"
                                        name="video" />
                                </div>
                                <div class="col-12">
                                    <label for="Tags">
                                        Statut du projet
                                    </label>
                                    <select name="statut" class="form-select" id="">
                                        <option value="en cours" @selected($projet->statut == 'en cours')>En cours</option>
                                        <option value="terminé" @selected($projet->statut == 'terminé')>Terminé</option>
                                    </select>
                                    @error('statut')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="Tags">
                                        Url map pour la carte
                                    </label>
                                    <input type="text" class="form-control" value="{{ $projet->map }}" name="map" />
                                    @error('map')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="Tags">Image d'illustration</label>
                                    <div class="text-warning small">
                                        Taille : 416px * 400px
                                    </div>
                                    <input type="file" class="form-control" name="photo" />
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
                    @if ($projet->photo)
                        <div class="card">
                            <div class="p-2">
                                <img src="{{ Storage::url($projet->photo) }}" alt="{{ $projet->nom }}" class="w-100"
                                    srcset="">
                            </div>
                        </div>
                    @endif
                    @if ($projet->photos)
                        <div class="card">
                            <div class="p-2">
                                <div class="row">
                                    @forelse (json_decode($projet->photos) ?? [] as $key =>$pic)
                                        <div class="col-4" id="img-{{ $key }}">
                                            <div class="img-card">
                                                <img src="{{ Storage::url($pic) }}" alt="{{ $projet->nom }}"
                                                    srcset="">
                                            </div>
                                            <button type="button" class="btn btn-sm btn-danger w-100 mb-2" onclick="delete_image('{{ $key }}','{{ $pic }}')" >
                                                Supprimer
                                            </button>
                                        </div>
                                    @empty
                                    <div class="col-12 text-center">
                                        Aucune image pour le moment.
                                    </div>
                                </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @endif
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

        function delete_image(key,url){
            $.ajax({
                url: "/admin/projet.deleteImage",
                type: 'POST',
                data: {
                    'key': key,
                    'url': url ,
                    'projet_id':  {{ $projet->id}},
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    if(response.statut){
                        $('#img-' + key).remove();
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    </script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>


<style>
    .img-card{
        width: 100%;
        height: 100px;
        overflow: hidden;
        border: 1px solid #ccc;
        position: relative;
        border-radius: 5px;
    }
    .img-card img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .img-card img:hover{
        opacity: 0.5;
        cursor: pointer;

    }
</style>
@endsection


@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/7eigadx4xspqfo7xw2wn60evebnplqcuor4a08g85lc7jq3z/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection
