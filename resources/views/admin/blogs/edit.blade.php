@extends('admin.fixe')
@section('titre', 'Modifier un article')

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
                            Modifier un article
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
            </div>
        </div>
        <!--end breadcrumb-->

        <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="mb-3">Titre</h5>
                                <input type="text" class="form-control" value="{{ $blog->titre }}" required
                                    placeholder="titre de l'article" name="titre" />
                                @error('titre')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <h5 class="mb-3">Description</h5>
                                <textarea class="form-control" cols="4" rows="6" placeholder="write a description here.."
                                    name="description">{{ $blog->description }}</textarea>
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
                                    <label for="Tags" class="form-label fw-bold">Tags</label>
                                    <input type="text" class="form-control" id="Tags" value="{{ $blog->tags }}"
                                        placeholder="Tags" />
                                    @error('tags')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="Tags" class="form-label fw-bold">Image d'illustration</label>
                                    <input type="file" class="form-control" name="photo" />
                                    @error('photo')
                                        <span class="small text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    @if ($blog->photo)
                        <div class="card">
                            <div class="p-2">
                                <img src="{{ Storage::url($blog->photo) }}" alt="{{ $blog->titre }}" class="w-100"
                                    srcset="">
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
