@extends('front.fixe')
@section('titre', 'Actualités')
@section('body')
    <div class="page-title page-title-style-02 bkg-img09">
        <div class="pt-mask-light"></div>

        <!-- .container start -->
        <div class="container">
            <!-- .row start -->
            <div class="row">
                <!-- .col-md-6 start -->
                <div class="col-md-6">
                    <!-- .pt-heading start -->
                    <div class="pt-heading">
                        <h1>Actualités de l'entreprise</h1>
                    </div><!-- .pt-heading end -->
                </div><!-- .col-md-6 end -->

                <!-- .col-md-6 start -->
                <div class="col-md-6">
                    <!-- breadcrumbs start -->
                    <div class="breadcrumb-container clearfix">
                        <ul class="breadcrumb">
                            <li>Vous êtes ici : </li>

                            <li>
                                <a href="{{ route('home') }}">Accueil</a>
                            </li>

                            <li>
                                <span class="active">Grille d'actualités</span>
                            </li>
                        </ul><!-- .breadcrumb end -->
                    </div><!-- .breadcrumb-container end -->
                </div><!-- .col-md-6 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-title-style-01 end -->

    <!-- .page-content start -->
    <div class="page-content">

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row">
                <!-- .col-md-12 start -->
                <ul class="col-md-12 blog-posts blog-grid">


                    @forelse ($articles as $article)
                        <li class="post-container clearfix">
                            <div class="post-media">
                                <a href="{{ route('article',['id'=>$article->id,'titre'=>Str::slug($article->titre)])}}">
                                    <img src="{{ $article->Cover() }}"
                                        alt="{{ $article->titre }}" />
                                </a>
                            </div><!-- .post-media end -->

                            <div class="post-body">
                                <span class="date">
                                    {{ $article->created_at->format('d-m-Y') }}
                                </span>

                                <a href="{{ route('article',['id'=>$article->id,'titre'=>Str::slug($article->titre)])}}">
                                    <h5>
                                        {{ Str::limit($article->titre, 30) }}
                                    </h5>
                                </a>

                                <a href="{{ route('article',['id'=>$article->id,'titre'=>Str::slug($article->titre)])}}"
                                    class="read-more">
                                    Lire l'article
                                </a><!-- .read-more end -->
                            </div><!-- .post-body end -->
                        </li><!-- .post-container end -->
                    @empty
                    @endforelse
                </ul><!-- .col-md-12.blog-posts end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

@endsection
