@extends('front.fixe')
@section('titre', 'À propos de nous')
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
                        <h1>À propos de nous</h1>
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
                                <span class="active">À propos de nous</span>
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
                <div class="col-md-8">

                    <!-- .row start -->
                    <div class="row mb-30">
                        <!-- .col-md-12 start -->
                        <div class="col-md-12">
                            <img src="{{ $infos->GetAboutPhotoCover() }}"
                                alt="{{ $infos->app_name }}">
                        </div><!-- .col-md-12 end -->
                    </div><!-- .row end -->

                    <!-- .row start -->
                    <div class="row mb-80">
                        <!-- .col-md-12 start -->
                        <div class="col-md-12">
                            <!-- .custom-heading-01 start -->
                            <div class="custom-heading-01">
                                <span>{{ $infos->app_name }}</span>
                                <h2>{{ $infos->about_titre ?? "[ Titre de la page ]" }}</h2>
                            </div><!-- .custom-heading-01 end -->

                            <p>
                                {!! $infos->about_texte ?? "[ Description de la page ]" !!}
                            </p>
                        </div><!-- .col-md-12 end -->
                    </div><!-- .row end -->

                    <!-- .row start -->
                    <div class="row mb-80">
                        <!-- .col-md-12 start -->
                        <div class="col-md-12">
                            <div class="feature-box custom-background bkg-color-dark dark centered">
                                <h3>Notre mission</h3>
                                <p>
                                    Aider les entreprises à se développer en définissant leur
                                    objectifs commerciaux et étapes pour les atteindre.
                                </p>
                            </div><!-- .feature-box end -->
                        </div><!-- .col-md-12 end -->
                    </div><!-- .row end -->

                </div><!-- .col-md-8 end -->

                <aside class="col-md-4 aside-right">

                    <!-- .aside-widgets start -->
                    <ul class="aside-widgets">
                        <li class="widget widget_nav_menu clearfix">
                            <div class="title">
                                <h3>Nos derniers articles</h3>
                            </div><!-- .title end -->

                            <!-- .menu-quick-links-container start -->
                            <div class="menu-quick-links-container">
                                <ul id="menu-quick-links" class="menu">
                                    @foreach ($articles as $article)
                                        <li class="menu-item current-menu-item">
                                            <a href="{{ route('article',['id'=>$article->id,'titre'=>Str::slug($article->titre)])}}">
                                                {{ Str::limit($article->titre, 30) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul><!-- #menu-quick-links end -->
                            </div><!-- .menu-quick-links-container end -->
                        </li><!-- .widget_nav_menu end -->


                        <li class="widget widget_nav_menu clearfix">
                            <div class="title">
                                <h3>Nos services</h3>
                            </div><!-- .title end -->

                            <!-- .menu-quick-links-container start -->
                            <div class="menu-quick-links-container">
                                <ul id="menu-quick-links" class="menu">
                                    @foreach ($services as $service)
                                        <li class="menu-item current-menu-item">
                                            <a href="{{ route('service', ['id' => $service->id, 'titre' => Str::slug($service->titre)]) }}">
                                                {{ Str::limit($service->titre ,20) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul><!-- #menu-quick-links end -->
                            </div><!-- .menu-quick-links-container end -->
                        </li><!-- .widget_nav_menu end -->



                        <li class="widget">
                            <div class="feature-box custom-background bkg-color-dark dark">
                                <div class="icon-container">
                                    <i class="lynny-pages-1"></i>
                                </div><!-- .icon-container end -->

                                <div class="text-container">
                                    <h3>Demander un devis/h3>
                                        <p>
                                            Obtenez des conseils professionnels .
                                        </p>

                                        <a href="{{ route('get_devis') }}" class="read-more">
                                            Demander un devis
                                        </a><!--.read-more end -->
                                        </a><!-- .read-more end -->
                                </div><!-- .text-container end -->
                            </div><!-- .feature-box end -->
                        </li><!-- .widget end -->

                    </ul><!-- .aside-widgets -->
                </aside><!-- aside.col-md-4 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->
@endsection
