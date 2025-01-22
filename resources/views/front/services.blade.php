@extends('front.fixe')
@section('titre', 'Nos Services')
@section('body')
    <div class="page-title page-title-style-02 bkg-img27">
        <div class="pt-mask-light"></div>

        <!-- .container start -->
        <div class="container">
            <!-- .row start -->
            <div class="row">
                <!-- .col-md-6 start -->
                <div class="col-md-6">
                    <!-- .pt-heading start -->
                    <div class="pt-heading">
                        <h1>Nos services</h1>
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
                                <span class="active">Nos services</span>
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
                <div class="col-md-12">
                    <div class="row">
                        @forelse ($services as $service)
                            <div class="col-sm-6 col-6 p-2">
                                <div class="team-horizontal">
                                    <img src="{{ $service->Cover() }}" alt="{{ $service->titre }}" class="img">

                                    <div class="team-details-container">
                                        <!-- .custom-heading-01 start -->
                                        <div class="custom-heading-01">
                                            <h4>{{ Str::limit($service->titre, 20) }}</h4>
                                        </div><!-- .custom-heading-01 end -->
                                        <p>
                                            {{ e(Str::limit(html_entity_decode(strip_tags($service->description, 150)))) }}
                                        </p>
                                        <a href="{{ route('service', ['id' => $service->id, 'titre' => Str::slug($service->titre)]) }}"
                                            class="read-more">
                                            Voir les détails
                                        </a><!-- .read-more end -->
                                    </div><!-- .team-details-container end -->
                                </div><!-- .team-horizontal end -->
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div><!-- .col-md-8 end -->

                {{--   <aside class="col-md-4 aside-right">

                    <!-- .aside-widgets start -->
                    <ul class="aside-widgets">
                        <li class="widget">
                            <div class="feature-box custom-background bkg-color-dark dark">
                                <div class="icon-container">
                                    <i class="lynny-pages-1"></i>
                                </div><!-- .icon-container end -->

                                <div class="text-container">
                                    <h3>Demander un devis</h3>
                                    <p>
                                        Obtenez des conseils professionnels pour
                                        création et gestion d'une entreprise prospère.
                                    </p>

                                    <a href="{{ route('contact') }}" class="read-more">
                                        Contactez-nous
                                    </a><!-- .read-more end -->
                                </div><!-- .text-container end -->
                            </div><!-- .feature-box end -->
                        </li><!-- .widget end -->
                    </ul><!-- .aside-widgets -->
                </aside><!-- aside.col-md-4 end --> --}}
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

    <style>
        .img {
            border: solid 1px rgba(0, 0, 0, 0.575);
            height: 299px !important;
            width: 263px !important;
        }
    </style>
@endsection
