@extends('front.fixe')
@section('titre', $article->titre)
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
                        <h1>{{ Str::limit($article->titre, 50) }}</h1>
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
                                <a href="{{ route('blog') }}">Actualités</a>
                            </li>

                            <li>
                                <span class="active">{{ Str::limit($article->titre, 30) }}</span>
                            </li>
                        </ul><!-- .breadcrumb end -->
                    </div><!-- .breadcrumb-container end -->
                </div><!-- .col-md-6 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-title-style-01 end -->

    <!-- .page-conent start -->
    <div class="page-content">

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row">

                <!-- .col-md-8 start -->
                <ul class="col-md-8 blog-posts blog-grid blog-single clearfix">
                    <li class="post-container clearfix">
                        <div class="post-media">
                            <img src="{{ $article->Cover() }}" style="width: 100% !important;" alt="{{ $article->titre }}">
                        </div><!-- .post-media end -->

                        <div class="post-body">
                            <span class="date">
                                {{ $article->created_at->format('d-m-Y') }}
                            </span>

                            <h2>{{ $article->titre }}</h2>

                            <p>
                                {!! $article->description !!}
                            </p>
                        </div><!-- .post-body end -->
                    </li><!-- .post-container end -->
                </ul><!-- .col-md-8.blog-posts.blog-list end -->

                <aside class="col-md-4 aside-right">

                    <!-- .aside-widgets start -->
                    <ul class="aside-widgets">
                        <li class="widget widget_search clearfix">
                            <div class="title">
                                <h3>Recherche de blogs</h3>
                            </div>

                            <form method="GET" action="{{route('blog') }}">
                                <input class="a_search" name="key" type="text"
                                    placeholder="Tapez et appuyez sur Entrée...">
                                <input class="search-submit" type="submit">
                            </form>
                        </li><!-- .widget.widget_search end -->


                        <li class="widget widget-text">
                            <div class="title">
                                <h3>Derniers articles</h3>
                            </div><!-- .title end -->

                            <ul class="pi-latest-posts-03">
                                @foreach ($autres as $item)
                                    <li class="post-container">
                                        <a
                                            href="{{ route('article', ['id' => $item->id, 'titre' => Str::slug($item->titre)]) }}">
                                            {{ $item->titre }}
                                        </a>
                                        <span class="date">
                                            {{ $item->created_at->format('d-m-Y') }}
                                        </span>
                                    </li><!-- .post-container end -->
                                @endforeach
                            </ul><!-- .pi-latest-posts-03 end -->
                        </li><!-- .widget end -->

                        <li class="widget widget_tag_cloud">
                            <div class="title">
                                <h3>Tags</h3>
                            </div><!-- .title end -->

                            <div class="tagcloud clearfix">
                                <a href="#">management</a>
                                <a href="#">management consulting</a>
                                <a href="#">mergers</a>
                                <a href="#">acquisitions</a>
                                <a href="#">market assessment</a>
                                <a href="#">business strategy</a>
                                <a href="#">customer strategy</a>
                                <a href="#">logistics consulting</a>
                                <a href="#">global expansion</a>
                            </div><!-- .tagcloud end -->
                        </li><!-- .widget.widget_tag_cloud end -->

                    </ul><!-- .aside-widgets -->
                </aside><!-- aside.col-md-4 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

    <!-- .page-content start -->
    <div class="page-content portfolio-blog-nav-simple">

        <!-- .container start -->
        <div class="container-fluid">

            <!-- .row start -->
            <div class="row mb-0">

                <!-- .col-md-4 start -->
                <div class="col-md-4">
                    <p>
                        @if ($previousArticle)
                            <a href="{{ route('article', ['id' => $previousArticle->id, 'titre' => Str::slug($previousArticle->titre)]) }}"
                                class="nav-prev">
                                Article précédent
                            </a>
                        @endif
                    </p>
                </div><!-- .col-md-4 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4">
                    <p>
                        <a href="{{ route('blog') }}">Retour aux actualités</a>
                    </p>
                </div><!-- .col-md-4 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4">
                    <p>
                        @if ($nextArticle)
                            <a href="{{ route('article', ['id' => $nextArticle->id, 'titre' => Str::slug($nextArticle->titre)]) }}"
                                class="nav-next">
                                prochain article
                            </a>
                        @endif
                    </p>
                </div><!-- .col-md-4 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

@endsection
