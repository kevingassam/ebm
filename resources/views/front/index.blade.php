@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')
    <div class="master-slider-wrapper">
        <!-- #masterslider start -->
        <div id="mastersliderFullWidth02" class="master-slider-full-screen master-slider ms-skin-default mb-0">


            @foreach ($banners as $banner)
                <!-- FIRST SLIDE -->
                <div class="ms-slide">
                    <img src="/front/masterslider/blank.gif" data-src="{{ $banner->Cover() }}" alt="{{ $banner->app_name }}" />
                    <span class="ms-layer pi-caption-small" style="
          left: 0;
          top: 200px;" data-type="text"
                        data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="0">
                        {{ $infos->app_name }}
                    </span>

                    <h2 class="ms-layer pi-caption" style="
        left: 0;
        top: 260px;" data-type="text"
                        data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="500">
                        {{ $banner->titre }}
                    </h2>

                    <h2 class="ms-layer pi-caption" style="
        left: 0;
        top: 340px;" data-type="text"
                        data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="800">

                    </h2>

                    <img class="ms-layer pi-link-arrow" src="/front/masterslider/blank.gif"
                        data-src="/front/img/slider/circle-icon-green.svg" alt=""
                        style="
         left: 0;
         top: 445px;" data-type="image" data-effect="left(short)"
                        data-duration="500" data-hide-effect="fade" data-delay="1100" />

                    <span class="ms-layer pi-link" style="
          left: 55px;
          top: 445px;" data-type="text"
                        data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="1100">
                        {{ $banner->btn_text }}
                    </span>

                    <a href="{{ route('service_list') }}"></a>

                </div><!-- END OF FIRST SLIDE -->
            @endforeach

        </div><!-- #master-slider end -->
    </div><!-- .master-slider-wrapper end -->

    <!-- .page-conent start -->
    <div class="page-content">

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row featured-pages-negative-top">
                <!-- .col-md-12 start -->
                <div class="col-md-12">
                    <!-- Owl Carousel Container start -->
                    <div class="carousel-container">
                        <div id="featured-pages-carousel" class="owl-carousel">

                            @foreach ($services as $service)
                                <!-- .owl-item start -->
                                <div class="owl-item">
                                    <div class="featured-page-box">
                                        <div class="media">
                                            <img src="{{ $service->Cover() }}" alt="{{ $service->titre }}" />
                                        </div>

                                        <div class="body">
                                            <a
                                                href="{{ route('service', ['id' => $service->id, 'titre' => Str::slug($service->titre)]) }}">
                                                <h2>
                                                    {{ Str::limit($service->titre, 30) }}
                                                </h2>
                                                {{ Str::limit(strip_tags($service->description, 80)) }}
                                            </a>
                                        </div><!-- .body end -->
                                    </div><!-- .featured-page-box end -->
                                </div><!-- .owl-item end -->
                            @endforeach
                        </div><!-- .owl-carousel end -->
                    </div><!-- Owl Carousel Container end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->



    <!-- .page-conent start -->
    <div class="page-content custom-background bkg-img05 dark">
        <div class="page-content-mask"></div>

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row">
                <!-- .col-md-12 start -->
                <div class="col-md-12">
                    <!-- .col-md-3 start -->
                    <div class="col-md-3">

                        <!-- .odometer-container start -->
                        <div class="odometer-container">
                            <div class="odometer-inner">
                                <i class="fa fa-arrow-up"></i>
                                <div class="odometer" data-to='{{ DB::table('blogs')->count() }}'></div>
                            </div>
                            <p>
                                Articles de blog
                            </p>
                        </div><!-- .odometer-container end -->
                    </div><!-- .col-md-3 end -->

                    <!-- .col-md-3 start -->
                    <div class="col-md-3">

                        <!-- .odometer-container start -->
                        <div class="odometer-container">
                            <div class="odometer-inner">
                                <i class="fa fa-arrow-up"></i>
                                <div class="odometer" data-to='{{ DB::table('services')->count() }}'></div>
                            </div>
                            <p>
                                Services
                            </p>
                        </div><!-- .odometer-container end -->
                    </div><!-- .col-md-3 end -->

                    <!-- .col-md-3 start -->
                    <div class="col-md-3">

                        <!-- .odometer-container start -->
                        <div class="odometer-container">
                            <div class="odometer-inner">
                                <i class="fa fa-arrow-up"></i>
                                <div class="odometer" data-to='{{ DB::table('projets')->count() }}'></div>
                            </div>
                            <p>
                                Projets
                            </p>
                        </div><!-- .odometer-container end -->
                    </div><!-- .col-md-3 end -->

                    <!-- .col-md-3 start -->
                    <div class="col-md-3">

                        <!-- .odometer-container start -->
                        <div class="odometer-container">
                            <div class="odometer-inner">
                                <i class="fa fa-arrow-up"></i>
                                <div class="odometer" data-to='450'></div>
                            </div>
                            <p>
                                Clients satisfaits
                            </p>
                        </div><!-- .odometer-container end -->
                    </div><!-- .col-md-3 end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->


    <br><br>
    <div class="ts-testimonials-container container">
        <div class="ts-testimonials">
            @foreach ($temoignages as $temoignage)
                <div class="ts-testimonial">
                    <img src="{{ $temoignage->Cover() }}" alt="{{ $temoignage->nom }}" class="ts-avatar">
                    <div class="ts-name">{{ $temoignage->nom }}</div>
                    <div class="ts-position">{{ $temoignage->poste }}</div>
                    <div class="ts-message">"{{ $temoignage->message }}"</div>
                    <div class="ts-stars">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $temoignage->note)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
        <div class="ts-nav-buttons">
            <button class="ts-nav-button" onclick="prevSlide()">Précédent</button>
            <button class="ts-nav-button" onclick="nextSlide()">Suivant</button>
        </div>
    </div>
    <br><br>

    <!-- .page-conent start -->
    <div class="page-content">

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row">
                <!-- .col-md-12 start -->
                <div class="col-md-12">
                    <!-- Owl Carousel Container start -->
                    <div class="carousel-container">
                        <div id="latest-posts-carousel" class="owl-carousel pi-latest-posts-01">

                            @foreach ($articles as $article)
                                <!-- .owl-item start -->
                                <div class="owl-item">
                                    <div class="post-container clearfix">
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
                                                <h3>{{ Str::limit($article->titre, 30) }}</h3>
                                            </a>

                                            <a href="{{ route('article', ['id' => $article->id, 'titre' => Str::slug($article->titre)]) }}"
                                                class="read-more">
                                                Lire l'article
                                            </a><!-- .read-more end -->
                                        </div><!-- .post-body end -->
                                    </div><!-- .post-container end -->
                                </div><!-- .owl-item end -->
                            @endforeach
                        </div><!-- .owl-carousel end -->
                    </div><!-- Owl Carousel Container end -->
                </div><!-- .col-md-12 end -->

            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->


    <!-- .page-conent start -->
    <div class="page-content">

        <!-- .container start -->
        <div class="container-fluid">

            <!-- .row start -->
            <div class="row mb-0">
                <!-- .col-md-12 start -->
                <div class="col-md-12">
                    @if ($infos->map)
                    <iframe src="{{ $infos->map }}" class="map-height-lg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @endif
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

@endsection


@section('scripts')
    <script>
        let currentSlide = 0;
        const testimonials = document.querySelector('.ts-testimonials');
        const totalSlides = document.querySelectorAll('.ts-testimonial').length;

        function updateSlide() {
            const translateX = -currentSlide * 100;
            testimonials.style.transform = `translateX(${translateX}%)`;
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlide();
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlide();
        }
    </script>
@endsection
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Section Témoignages */
        .ts-testimonials-container {
            margin: 0 auto;
            overflow: hidden;
            position: relative;
        }

        .ts-testimonials {
            display: flex;
            transition: transform 0.5s ease;
        }

        .ts-testimonial {
            flex: 1 0 100%;
            max-width: 100%;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background: #f9f9f9;
            margin: 0 10px;
            text-align: center;
        }

        /* Avatar et Infos */
        .ts-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 15px;
        }

        .ts-name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .ts-position {
            color: #777;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        /* Message */
        .ts-message {
            font-style: italic;
            margin-bottom: 10px;
        }

        /* Étoiles */
        .ts-stars {
            color: #FFD700;
        }

        /* Boutons de navigation */
        .ts-nav-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .ts-nav-button {
            background: #6ec25b;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Responsive */
        @media (min-width: 768px) {
            .ts-testimonial {
                flex: 1 0 33.33%;
                max-width: 33.33%;
            }
        }
    </style>
@endsection
@section('seo')
    {{-- Composant SEO - seo.blade.php --}}
    <meta name="description" content="{{ $description ?? 'Description par défaut de votre site' }}">
    <meta name="keywords" content="{{ $keywords ?? 'mots-clés, par défaut, pour, SEO' }}">
    <meta name="author" content="{{ $author ?? 'Nom de l\'auteur du site' }}">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Open Graph pour Facebook et autres réseaux --}}
    <meta property="og:title" content="{{ $infos->app_name  }}">
    <meta property="og:description" content="{{ $description ?? 'Description par défaut' }}">
    <meta property="og:image" content="{{ $image ?? asset('default-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="{{ $type ?? 'website' }}">

    {{-- Balises Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $infos->app_name }}">
    <meta name="twitter:description" content="{{ $description ?? 'Description par défaut' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('default-image.jpg') }}">

    {{-- Canonical link --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

@endsection
