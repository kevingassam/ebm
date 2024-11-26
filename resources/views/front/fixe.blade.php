@php
    $top10RandomServices = DB::table('services')->select('id', 'titre')->inRandomOrder()->limit(10)->get();
@endphp

<!DOCTYPE html>
<html lang="fr">

<head>
    <title> @yield('titre') - {{ $infos->app_name }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ $infos->GetIcon() }}" />
      <link rel="canonical" href="{{ url()->current() }}">
      <link rel="icon" href="{{ $infos->GetIcon() }}" type="image/x-icon">
      <meta name="robots" content="index, follow">

    <!-- Fonts and icon fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600&amp;subset=latin,latin-ext" type="text/css">
    <link rel="stylesheet" href="/front/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/front/fonts/lynny/style.min.css">

    <!-- CSS Home Page Required FIles -->
    <link rel="stylesheet" href="/front/masterslider/style/masterslider.min.css"><!-- Master slider main style -->
    <link rel="stylesheet" href="/front/masterslider/skins/default/style.min.css"><!-- Master slider default skin -->
    <link rel='stylesheet' href='/front/owl-carousel/owl.carousel.min.css' /><!-- Owl carousel -->
    <link rel="stylesheet" href="/front/css/odometer.min.css" /><!-- Number counter -->

    <!-- CSS Default Files -->
    <link rel="stylesheet" href="/front/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/css/animate.css">
    <link rel="stylesheet" href="/front/css/style.css">
    <link rel="stylesheet" href="/front/css/color-default.css">
    <link rel="stylesheet" href="/front/css/responsive.css">
    <link rel="stylesheet" href="/front/css/add-style.css?v={{ time() }}">

    @yield('header')

    @yield('seo')


</head>

<body>

    @if (config('app.env') == "production")
        <!-- LOADER START -->
        <div id="loader">
            <div id="loading-status"></div><!-- .loading-status end -->
        </div>
    @endif
    <!-- Header wrapper start -->
    <div class="header-wrapper header-style-02 header-negative-bottom clearfix">

        <!-- #header start -->
        <header id="header" class="">

            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row">

                    <!-- .col-md-12 start -->
                    <div class="col-md-12">

                        <!-- .top-bar-wrapper start -->
                        <div class="top-bar-wrapper clearfix">

                            <!-- .row start -->
                            <div class="row">

                                <!-- .col-md-3 start -->
                                <div class="col-md-3">
                                    <!-- .logo start -->
                                    <div id="logo">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ $infos->GetLogo() }}" style="max-height: 70px !important;"
                                                alt="ConsultingPress Management Consulting Template" />
                                        </a>
                                    </div><!-- .logo -->
                                </div><!-- .col-md-3 end -->

                                <!-- .col-md-9 start -->
                                <div class="col-md-9">
                                    <div class="header-info-widgets hidden-xs hidden-sm">
                                        <ul class="clearfix">
                                            <li>
                                                <div class="icon-container">
                                                    <i class="lynny-phone-1"></i>
                                                </div>

                                                <div class="text-container">
                                                    <span>Appellez-nous</span>
                                                    <p>
                                                        {{ $infos->tel1 ?? '' }}
                                                    </p>
                                                </div><!-- .text-container end -->
                                            </li>

                                            <li>
                                                <div class="icon-container">
                                                    <i class="lynny-mail-duplicate"></i>
                                                </div>

                                                <div class="text-container">
                                                    <span>Entrer en contact</span>
                                                    <a href="mailto:{{ $infos->email1 ?? '' }}">
                                                        {{ $infos->email1 ?? '' }}
                                                    </a>
                                                </div><!-- .text-container end -->
                                            </li>

                                            <li>
                                                <div class="icon-container">
                                                    <i class="lynny-globe-2_1"></i>
                                                </div>

                                                <div class="text-container">
                                                    <span>Localisation</span>
                                                    <p>
                                                        <a href="{{ route('contact') }}">
                                                            {{ Str::limit($infos->adresse1 , 20) ?? '' }}
                                                        </a>
                                                    </p>
                                                </div><!-- .text-container end -->
                                            </li>
                                        </ul>
                                    </div><!-- .header-info-widgets end -->
                                </div><!-- .col-md-9 end -->
                            </div><!-- .row end -->
                        </div><!-- .top-bar-wrapper end -->
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->

            <!-- .header-inner start -->
            <div class="header-inner">

                <!-- .container start -->
                <div class="container">

                    <!-- .row start -->
                    <div class="row">
                        <!-- .col-md-12 start -->
                        <div class="col-md-12">
                            <!-- .main-nav start -->
                            <div class="main-navigation">
                                <!-- .navbar.navbar-default start -->
                                <nav class="navbar navbar-default nav-left pi-mega">

                                    <!-- .navbar-header start -->
                                    <div class="navbar-header">

                                        <!-- Responsive navigation buttons -->
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                            data-target="#main-nav" aria-expanded="false">
                                            <span class="sr-only">Basculer la navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div><!-- .navbar-header end -->

                                    <!-- MAIN NAVIGATION -->
                                    <div id="main-nav" class="collapse navbar-collapse">

                                        <!-- navigation links start -->
                                        <ul class="nav navbar-nav">
                                            <li class="current-menu-item">
                                                <a href="{{ route('home') }}">Accueil</a>
                                            </li>
                                            <li class="current-menu-item">
                                                <a href="{{ route('about') }}">À propos de nous</a>
                                            </li>

                                            <li class="menu-item-has-children dropdown">
                                                <a href="#" data-toggle="dropdown" class="dropdown-toggle"
                                                    role="button">
                                                    Services
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('service_list') }}">Tous les services</a></li>
                                                    @foreach ($top10RandomServices as $service)
                                                        <li>
                                                            <a
                                                                href="{{ route('service', ['id' => $service->id, 'titre' => Str::slug($service->titre)]) }}">
                                                                {{ Str::limit($service->titre, 20) }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                            <li class="current-menu-item">
                                                <a href="{{ route('projet') }}">Projets</a>
                                            </li>
                                            <li class="current-menu-item">
                                                <a href="{{ route('blog') }}">Actualités</a>
                                            </li>
                                            <li class="current-menu-item">
                                                <a href="{{ route('contact') }}">Contact</a>
                                            </li>
                                            <li class="current-menu-item">
                                                <a href="{{ route('get_devis') }}">Demande de devis</a>
                                            </li>
                                        </ul><!-- .nav.navbar-nav end -->
                                    </div><!-- navbar end -->

                                    <div class="nav-additional-links">
                                        <!-- #search start -->
                                        <div id="search">
                                            <form method="GET" action="{{ route('blog') }}">
                                                <input class="search-submit" type="submit" required>
                                                <input id="m_search" name="s" type="text"
                                                    placeholder="Recherche...">
                                            </form>
                                        </div><!-- #search end -->

                                    </div><!-- .nav-additional-links -->
                                </nav><!-- .navbar.navbar-default end -->
                            </div> <!-- .main-nav end -->
                        </div><!-- .col-md-12 end -->
                    </div><!-- .row end -->
                </div><!-- .container end -->
            </div><!-- .header-inner end -->
        </header><!-- #header end -->
    </div><!-- .header-wrapper end -->



    @yield('body')




    <!-- #footer-wrapper start -->
    <div id="footer-wrapper">

        <!-- #footer start -->
        <footer id="footer">
            <div class="container">

                <!-- .row start -->
                <div class="row">

                    <!-- .footer-widget-container start -->
                    <ul class="footer-widget-container col-md-3 col-sm-6">

                        <!-- .widget.widget-text start -->
                        <li class="widget widget-text text-center">
                            <a href="{{ route('home') }}">
                                <img src="{{ $infos->GetLogo() }}" style="max-height: 100px !important;"
                                    alt="ConsultingPress Management Consulting Template" />
                            </a>
                            <p>
                                {{ $infos->text_footer ?? '' }}
                            </p>
                        </li><!-- .widget.widget-text end -->
                    </ul><!-- .footer-widget-container end -->

                    <!-- .footer-widget-container start -->
                    <ul class="footer-widget-container col-md-3 col-sm-6">

                        <!-- .widget.widget-pages start -->
                        <li class="widget widget-pages">
                            <div class="title">
                                <h3>Raccourcis</h3>
                            </div><!-- .title end -->

                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Accueik</a>
                                </li>

                                <li>
                                    <a href="{{ route('about') }}">À propos de nous</a>
                                </li>

                                <li>
                                    <a href="{{ route('service_list') }}">Services</a>
                                </li>

                                <li>
                                    <a href="{{ route('projet') }}">Projets</a>
                                </li>

                                <li>
                                    <a href="{{ route('blog') }}">Actualités</a>
                                </li>

                                <li>
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>

                        </li><!-- .widget.widget-pages end -->
                    </ul><!-- .footer-widget-container end -->

                    <!-- .footer-widget-container start -->
                    <ul class="footer-widget-container col-md-3 col-sm-6">
                        <li class="widget widget-text">
                            <div class="title">
                                <h3>Dernières nouvelles</h3>
                            </div>

                            <!-- Latest posts element start -->
                            <ul class="pi-latest-posts-02">
                                @foreach ($last2Blog as $article)
                                    <li class="post-container">
                                        <div class="post-media">
                                            <a
                                                href="{{ route('article', ['id' => $article->id, 'titre' => Str::slug($article->titre)]) }}">
                                                <img src="{{ $article->Cover() }}" alt="{{ $article->titre }}" />
                                            </a>
                                        </div><!-- .post-media end -->

                                        <div class="post-body">
                                            <span class="date">
                                                {{ $article->created_at->format('d-m-Y') }}
                                            </span>
                                            <a
                                                href="{{ route('article', ['id' => $article->id, 'titre' => Str::slug($article->titre)]) }}">
                                                <h4>
                                                    {{ Str::limit($article->titre, 30) }}
                                                </h4>
                                            </a>
                                        </div><!-- .post-body end -->
                                    </li>
                                @endforeach
                            </ul><!-- .pi-latest-posts-02 end -->
                        </li>
                    </ul><!-- .footer-widget-container end -->

                    <!-- .footer-widget-container start -->
                    <ul class="footer-widget-container col-md-3 col-sm-6">
                        <li class="widget contact-info">
                            <div class="title">
                                <h3>Contact</h3>
                            </div>

                            <ul class="contact-info-list clearfix">
                                <li>
                                    <i class="lynny-home"></i>
                                    {{ $infos->adresse1 }}
                                </li>

                                <li>
                                    <i class="lynny-phone-1"></i>
                                    {{ $infos->tel1 }} <br>
                                    {{ $infos->tel2 }}
                                </li>

                                <li>
                                    <i class="lynny-mail-duplicate"></i>
                                    <a href="/front/mailto:{{ $infos->email1 ?? '' }}">{{ $infos->email1 ?? '' }}</a>
                                </li>
                            </ul><!-- .contact-info-list end -->
                        </li><!-- .widget.contact-info end -->
                    </ul><!-- .footer-widget-container end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </footer><!-- #footer end -->

        <!-- #copyright-container start -->
        <div id="copyright-container" class="copyright-container">
            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <!-- .col-md-6 start -->
                    <div class="col-md-4 col-sm-4">
                        <p>
                            Copyright © {{ date('Y') }}.
                        </p>
                    </div><!-- .col-md-6 end -->

                    <div class="col-md-4 col-sm-4">
                        <p>
                            <a href="{{ route('mentions')}}">
                                Mentions légales
                            </a>
                            -
                            <a href="{{ route('politique') }}">
                                Politique de confidentialité
                            </a>
                        </p>
                    </div><!-- .col-md-6 end -->

                    <!-- .col-md-6 start -->
                    <div class="col-md-4 col-sm-4 copyright-right">
                        <p>
                            Conception et développement par
                            <a href="https://e-build.tn" target="__blank">
                                <b style="color: red !important;">E-build</b></a>
                        </p>
                    </div><!-- .col-md-6 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- #copyright-container end -->

        <a href="/front/#" class="scroll-up">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div><!-- #footer-wrapper end -->

    <!-- Required js scripts -->
    <script src="/front/js/jquery-core.js"></script><!-- jQuery library  - must be included in all HTML files -->
    <script src="/front/bootstrap/js/bootstrap.min.js"></script><!-- Bootstrap script - must be included in all HTML files -->
    <script src="/front/js/jquery-scripts.js"></script><!-- Additional scripts - must be included in all HTML files -->
    <script src="/front/masterslider/masterslider.min.js"></script><!-- Master slider main js -->
    <script src="/front/owl-carousel/owl.carousel.min.js"></script><!-- Carousels script -->
    <script src="/front/js/odometer.min.js"></script><!-- Number counter -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> <!-- google maps -->
    <script src="/front/js/jquery.ui.map.full.min.js"></script><!-- google maps -->
    <script src="/front/js/volcanno.map.js"></script><!-- Google Maps Script -->
    <script src="/front/js/jquery-retina.js"></script>
    <!-- Script that automatically loads retina images on high res screens - must be included in all HTML files for retina support -->
    <script src="/front/js/volcanno.include.js"></script><!-- Custom jQuery functions - must be includeed in all HTML files -->

    <script>
        /* <![CDATA[ */
        jQuery(document).ready(function($) {
            'use strict';
            // MASTER SLIDER START
            VolcannoInclude.masterSliderInit("mastersliderFullWidth02");

            // INCLUDE OWL CAROUSEL FEATURED PAGES
            VolcannoInclude.owlCarouselInit('featured-pages-carousel');

            // INCLUDE OWL CAROUSEL CLIENT CAROUSEL
            VolcannoInclude.owlCarouselInit('client-carousel');

            // FEATURED PAGES NEGATIVE TOP POSITIONING
            VolcannoInclude.fpNegativeTop();

            //NUMBER COUNTER ANIMATION
            VolcannoInclude.odometerContainerInit();

            //CONTACT FORM AJAX
            VolcannoInclude.contactFormAjax('newsletter');
        });

        jQuery(window).on("load", function() {
            'use strict';
            // IMAGE PARALLAX ANIMATION
            if (!VolcannoInclude.isTouchDevice() || !VolcannoInclude.isIOSDevice()) {
                // POSITIONING NOTE NEGATIVE TOP
                VolcannoInclude.fpNegativeTop();
            }
        });
        /* ]]> */
    </script>


    @yield('scripts')
</body>

</html>
