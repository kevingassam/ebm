@extends('admin.fixe')
@section('titre', 'Ajouter un service')

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
                            Ajouter un service
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->

        <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <label class="mb-3">Titre</label>
                                <input type="text" class="form-control" value="{{ old('titre') }}" required
                                    placeholder="titre du service" name="titre" />
                                @error('titre')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
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
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <button type="button" class="btn btn-sm btn-danger px-4">
                                    annuler
                                </button>
                                <button type="submit" class="btn btn-dark px-4">
                                    Publier le service
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="image">Image d'illustration</label>
                                    <div class="text-warning small">
                                        Taille : 416px * 400px
                                    </div>
                                    <input type="file" class="form-control" name="image" id="image" required />
                                    @error('image')
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
    <script src="https://cdn.tiny.cloud/1/prci1ask4660amvheuqm4tcy5y725g238o05h4g3rii7zkdd/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection
