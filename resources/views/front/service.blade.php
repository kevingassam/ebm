@extends('front.fixe')
@section('titre', $service->titre)
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
                        <h1>{{ $service->titre }}</h1>
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
                                <a href="{{ route('service_list') }}">Services</a>
                            </li>

                            <li>
                                <span class="active">{{ Str::limit($service->titre, 30) }}</span>
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
                        <div class="col-md-12 clearfix">
                            <div class="image-reveal triggerAnimation animated" data-animate="fadeInUp">
                                <img src="{{ $service->Cover() }}" style="width: 100% !important;"
                                    alt="{{ $service->titre }}" />
                                <div class="image-reveal-mask triggerAnimation" data-animate="imageReveal"></div>
                            </div><!-- .imageReveal end -->
                        </div><!-- .col-md-12 end -->
                    </div><!-- .row end -->

                    <!-- .row start -->
                    <div class="row mb-80">
                        <!-- .col-md-12 start -->
                        <div class="col-md-12">
                            <!-- .custom-heading-01 start -->
                            <div class="custom-heading-01">
                                <span>{{ $service->type }}</span>
                                <h2>{{ $service->titre }}</h2>
                            </div><!-- .custom-heading-01 end -->

                            <p>
                                {!! $service->description !!}
                            </p>
                        </div><!-- .col-md-12 end -->
                    </div><!-- .row end -->

                </div><!-- .col-md-8 end -->

                <aside class="col-md-4 aside-right">

                    <!-- .aside-widgets start -->
                    <ul class="aside-widgets">
                        <li class="widget widget_nav_menu clearfix">
                            <div class="title">
                                <h3>Les sous-services</h3>
                            </div><!-- .title end -->

                            <!-- .menu-quick-links-container start -->
                            <div class="menu-quick-links-container">
                                <ul id="menu-quick-links" class="menu">
                                    @foreach ($service->SousServices as $sous)
                                        <li class="menu-item">
                                            <a href="{{ route('get_service') }}">
                                                {{ Str::limit($sous->titre ,30) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul><!-- #menu-quick-links end -->
                            </div><!-- .menu-quick-links-container end -->
                        </li><!-- .widget_nav_menu end -->


                        <li class="widget widget_nav_menu clearfix">
                            <div class="title">
                                <h3>Autres services</h3>
                            </div><!-- .title end -->

                            <!-- .menu-quick-links-container start -->
                            <div class="menu-quick-links-container">
                                <ul id="menu-quick-links" class="menu">
                                    @foreach ($autres as $autre_service)
                                        <li class="menu-item">
                                            <a href="{{ route('service', ['id' => $autre_service->id, 'titre' => Str::slug($autre_service->titre)]) }}">
                                                {{ Str::limit($autre_service->titre ,30) }}
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
                                    <h3>Demander un devis</h3>
                                    <p>
                                        Obtenez des conseils professionnels pour
                                        création et gestion d'une entreprise prospère.
                                    </p>

                                    <a href="{{ route('get_devis') }}?service_id={{ $service->id }}" class="read-more">
                                        Obtenir mon devis
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
