@extends('front.fixe')
@section('titre', $projet->nom)
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
                        <h1>{{ $projet->nom }}</h1>
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
                                <a href="{{ route('projet') }}">Projets</a>
                            </li>

                            <li>
                                <span class="active">
                                    {{ Str::limit($projet->nom, 20) }}
                                </span>
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


                    <!-- .row start -->
                    <div class="row mb-80">
                        <!-- .col-md-12 start -->
                        <div class="col-md-12">
                            <div class="gallery-container">
                                <div class="main-image-container">
                                    <img src="{{ $projet->Cover() }}" alt="{{ $projet->nom }}" id="main-image"
                                        class="main-image">
                                </div>
                                <div class="thumbnail-container">
                                    <div class="thumbnail">
                                        <img src="{{ $projet->Cover() }}" alt="{{ $projet->nom }}" class="thumbnail-image other-tof-img">
                                    </div>
                                    @foreach (json_decode($projet->photos) ?? [] as $tof)
                                        <div class="thumbnail">
                                            <img src="{{ Storage::url($tof) }}" alt="{{ $projet->nom }}"
                                                class="thumbnail-image other-tof-img">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- .custom-heading-01 start -->
                            <div class="custom-heading-01">
                                <span>Ce que nous faisons</span>
                                <h2>{{ $projet->nom }}</h2>
                            </div><!-- .custom-heading-01 end -->

                            <p>
                                {!! $projet->description !!}
                            </p>

                        </div><!-- .col-md-12 end -->
                    </div><!-- .row end -->


                    <!-- .row start -->
                    <div class="row mb-80">
                        <!-- .col-md-12 start -->
                        <div class="col-md-12">
                            <div class="divider"></div>
                        </div><!-- .col-md-12 end -->
                    </div><!-- .row end -->

                    <div class="row mb-80">
                        <!-- .col-md-12 start -->
                        <div class="col-md-12">

                            <!-- .slider-wrapper start -->
                            <div class="slider-wrapper">
                                <div class="nivo-slider nivoSlider">
                                    @foreach ($autres as $key => $item)
                                        <a
                                            href="{{ route('projet_details', ['id' => $item->id, 'titre' => Str::slug($item->nom)]) }}">
                                            <img src="{{ $item->Cover() }}" alt="{{ $item->nom }}"
                                                title="#slider-caption-0{{ $key + 1 }}">
                                        </a>
                                    @endforeach
                                </div><!-- .nivoSlider end -->

                                @foreach ($autres as $key => $item)
                                    <div id="slider-caption-0{{ $key + 1 }}">
                                        <h3>
                                            {{ $item->nom }}
                                        </h3>

                                        <a href="{{ route('projet_details', ['id' => $item->id, 'titre' => Str::slug($item->nom)]) }}"
                                            class="read-more">
                                            Voir le projet
                                        </a><!-- .read-more end -->
                                    </div><!-- .slider-caption-01 end -->
                                @endforeach
                            </div><!-- .slider-wrapper end -->
                        </div><!-- .col-md-12 end -->
                    </div><!-- .row end -->


                </div><!-- .col-md-8 end -->

                <aside class="col-md-4 aside-right">

                    <!-- .aside-widgets start -->
                    <ul class="aside-widgets">
                        <li class="widget widget_nav_menu clearfix">
                            <div class="title">
                                <h3>Autre projets</h3>
                            </div><!-- .title end -->

                            <!-- .menu-quick-links-container start -->
                            <div class="menu-quick-links-container">
                                <ul id="menu-quick-links" class="menu">

                                    @forelse ($autres as $item)
                                        <li class="menu-item">
                                            <a
                                                href="{{ route('projet_details', ['id' => $item->id, 'titre' => Str::slug($item->nom)]) }}">
                                                {{ Str::limit($item->nom) }}
                                            </a>
                                        </li>

                                    @empty
                                    @endforelse

                                </ul><!-- #menu-quick-links end -->
                            </div><!-- .menu-quick-links-container end -->
                        </li><!-- .widget_nav_menu end -->


                    </ul><!-- .aside-widgets -->
                </aside><!-- aside.col-md-4 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->


@endsection



@section('header')
    <!-- Required files for this page -->
    <link rel="stylesheet" href="/front/nivo-slider/themes/default/default.css"><!-- Nivo Slider Default Theme css -->
    <link rel="stylesheet" href="/front/nivo-slider/nivo-slider.css"><!-- Nivo Slider -->

    <!-- CSS Default Files -->
    <link rel="stylesheet" href="/front/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/css/animate.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <link rel="stylesheet" href="/front/css/color-default.css">
    <link rel="stylesheet" href="/front/css/responsive.css">
    <style>
        .gallery-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
        }

        .main-image-container {
            width: 100%;
            margin-bottom: 15px;
        }

        .main-image {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .thumbnail-container {
            display: flex;
            overflow-x: auto;
            padding-bottom: 10px;
        }

        .thumbnail {
            width: 90px;
            height: 50px;
            cursor: pointer;
            border-radius: 4px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
 

        .thumbnail-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

@endsection

@section('scripts')
    <!-- Required js scripts -->
    <script src="/front/js/jquery-core.js"></script><!-- jQuery library  - must be included in all HTML files -->
    <script src="/front/bootstrap/js/bootstrap.min.js"></script><!-- Bootstrap script - must be included in all HTML files -->
    <script src="/front/js/jquery-scripts.js"></script><!-- Additional scripts - must be included in all HTML files -->
    <script src="/front/nivo-slider/jquery.nivo.slider.pack.js"></script><!-- Nivo Slider Script -->
    <script src="/front/js/jquery-retina.js"></script>
    <!-- Script that automatically loads retina images on high res screens - must be included in all HTML files for retina support -->
    <script src="/front/js/volcanno.include.js"></script><!-- Custom jQuery functions - must be includeed in all HTML files -->

    <script>
        /* <![CDATA[ */
        jQuery(document).ready(function($) {
            'use strict';
            // INCLUDE NIVO SLIDER
            VolcannoInclude.nivoSliderInit('nivo-slider-02');

            //CONTACT FORM AJAX
            VolcannoInclude.contactFormAjax('newsletter');
        });
        /* ]]> */


        //change image
        $(document).on('click', '.other-tof-img', function() {
            var img = $(this).attr('src');
            $('#main-image').attr('src', img);
        });
    </script>
@endsection
