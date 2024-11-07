@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')
    <div class="master-slider-wrapper">
        <!-- #masterslider start -->
        <div id="mastersliderFullWidth02" class="master-slider-full-screen master-slider ms-skin-default mb-0">

            <!-- FIRST SLIDE -->
            <div class="ms-slide">
                <img src="/front/masterslider/blank.gif"
                    data-src="/front/img/slider/consultingpress-management-consulting-unlock-your-business-potential.jpg"
                    alt="ConsultignPress Unlock Your Business Potential" />
                <span class="ms-layer pi-caption-small"
                    style="
                      left: 0;
                      top: 200px;" data-type="text"
                    data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="0">
                    management consulting
                </span>

                <h2 class="ms-layer pi-caption" style="
                    left: 0;
                    top: 260px;"
                    data-type="text" data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="500">
                    Unlock Your
                </h2>

                <h2 class="ms-layer pi-caption" style="
                    left: 0;
                    top: 340px;"
                    data-type="text" data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="800">
                    Business Potential
                </h2>

                <img class="ms-layer pi-link-arrow" src="/front/masterslider/blank.gif"
                    data-src="/front/img/slider/circle-icon-green.svg" alt=""
                    style="
                     left: 0;
                     top: 445px;" data-type="image"
                    data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="1100" />

                <span class="ms-layer pi-link" style="
                      left: 55px;
                      top: 445px;"
                    data-type="text" data-effect="left(short)" data-duration="500" data-hide-effect="fade"
                    data-delay="1100">
                    Learn more
                </span>

                <a href="/front/management-services-image-grid.html"></a>

            </div><!-- END OF FIRST SLIDE -->

            <!-- SECOND SLIDE -->
            <div class="ms-slide">
                <img src="/front/masterslider/blank.gif"
                    data-src="/front/img/slider/consultingpress-management-consulting-shape-your-business-future.jpg"
                    alt="ConsultingPress Management Consulting" />
                <span class="ms-layer pi-caption-small"
                    style="
                      left: 0;
                      top: 200px;" data-type="text"
                    data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="0">
                    management consulting
                </span>

                <h2 class="ms-layer pi-caption" style="
                    left: 0;
                    top: 260px;"
                    data-type="text" data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="500">
                    Shape Your
                </h2>

                <h2 class="ms-layer pi-caption" style="
                    left: 0;
                    top: 340px;"
                    data-type="text" data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="800">
                    Business Future
                </h2>

                <img class="ms-layer pi-link-arrow" src="/front/masterslider/blank.gif"
                    data-src="/front/img/slider/circle-icon-green.svg" alt=""
                    style="
                     left: 0;
                     top: 445px;" data-type="image"
                    data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="1100" />

                <span class="ms-layer pi-link" style="
                      left: 55px;
                      top: 445px;"
                    data-type="text" data-effect="left(short)" data-duration="500" data-hide-effect="fade"
                    data-delay="1100">
                    Learn more
                </span>

                <a href="/front/management-services-image-grid.html"></a>

            </div><!-- END OF SECOND SLIDE -->

            <!-- THIRD SLIDE -->
            <div class="ms-slide">
                <img src="/front/masterslider/blank.gif"
                    data-src="/front/img/slider/consultingpress-management-consulting-improve-your-business-performance.jpg"
                    alt="ConsultignPress Management Consulting Improve Your Business Performance" />
                <span class="ms-layer pi-caption-small"
                    style="
                      left: 0;
                      top: 200px;" data-type="text"
                    data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="0">
                    management consulting
                </span>

                <h2 class="ms-layer pi-caption" style="
                    left: 0;
                    top: 260px;"
                    data-type="text" data-effect="left(short)" data-duration="500" data-hide-effect="fade"
                    data-delay="500">
                    Improve Your
                </h2>

                <h2 class="ms-layer pi-caption" style="
                    left: 0;
                    top: 340px;"
                    data-type="text" data-effect="left(short)" data-duration="500" data-hide-effect="fade"
                    data-delay="800">
                    Business Performance
                </h2>

                <img class="ms-layer pi-link-arrow" src="/front/masterslider/blank.gif"
                    data-src="/front/img/slider/circle-icon-green.svg" alt=""
                    style="
                     left: 0;
                     top: 445px;" data-type="image"
                    data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="1100" />

                <span class="ms-layer pi-link"
                    style="
                      left: 55px;
                      top: 445px;" data-type="text"
                    data-effect="left(short)" data-duration="500" data-hide-effect="fade" data-delay="1100">
                    Learn more
                </span>

                <a href="/front/management-services-image-grid.html"></a>

            </div><!-- END OF THIRD SLIDE -->

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
                                            <a href="{{ route('service', ['id' => $service->id, 'titre' => Str::slug($service->titre)]) }}">
                                                <h2>
                                                    {{ Str::limit($service->titre ,30) }}
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
    <div class="page-content">

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row">
                <!-- .col-md-12 start -->
                <div class="col-md-12">
                    <!-- .custom-heading-02 start -->
                    <div class="custom-heading-02">
                        <h2>Our Core Expertise</h2>
                        <span>explore what we do</span>
                    </div><!-- .custom-heading-02 end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->

            <!-- .row start -->
            <div class="row mb-30">
                <!-- .col-md-4 start -->
                <div class="col-md-4">
                    <!-- .service-feature-box-03 start -->
                    <div class="service-box service-box-03">
                        <div class="icon-container">
                            <i class="lynny-radar"></i>
                        </div><!-- .icon-container end -->

                        <div class="text-container">
                            <a href="/front/management-services-single.html">
                                <h3>Strategy & Growth</h3>
                            </a>
                            <p>
                                Defining your business goals and steps to achieve them.
                            </p>
                        </div><!-- .text-container end -->
                    </div><!-- .service-feature-box-03 end -->
                </div><!-- .col-md-4 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4">
                    <!-- .service-feature-box-03 start -->
                    <div class="service-box service-box-03">
                        <div class="icon-container">
                            <i class="lynny-globe-2_1"></i>
                        </div><!-- .icon-container end -->

                        <div class="text-container">
                            <a href="/front/management-services-global-expansion.html">
                                <h3>Global Expansion</h3>
                            </a>

                            <p>
                                Helping you grow and defend against the global challenges.
                            </p>
                        </div><!-- .text-container end -->
                    </div><!-- .service-feature-box-03 end -->
                </div><!-- .col-md-4 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4">
                    <!-- .service-feature-box-03 start -->
                    <div class="service-box service-box-03">
                        <div class="icon-container">
                            <i class="lynny-pages-1"></i>
                        </div><!-- .icon-container end -->

                        <div class="text-container">

                            <a href="/front/management-services-audit.html">
                                <h3>Audit & Assurance</h3>
                            </a>

                            <p>
                                Helping to enhance the value of your business.
                            </p>
                        </div><!-- .text-container end -->
                    </div><!-- .service-feature-box-03 end -->
                </div><!-- .col-md-4 end -->
            </div><!-- .row end -->

            <!-- .row start -->
            <div class="row">
                <!-- .col-md-4 start -->
                <div class="col-md-4">
                    <!-- .service-feature-box-03 start -->
                    <div class="service-box service-box-03">
                        <div class="icon-container">
                            <i class="lynny-user-group-2"></i>
                        </div><!-- .icon-container end -->

                        <div class="text-container">

                            <a href="/front/management-services-customer-strategy.html">
                                <h3>Customer Strategy</h3>
                            </a>

                            <p>
                                Achieve clear understanding of your customers needs.
                            </p>
                        </div><!-- .text-container end -->
                    </div><!-- .service-feature-box-03 end -->
                </div><!-- .col-md-4 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4">
                    <!-- .service-feature-box-03 start -->
                    <div class="service-box service-box-03">
                        <div class="icon-container">
                            <i class="lynny-building-2"></i>
                        </div><!-- .icon-container end -->

                        <div class="text-container">
                            <a href="/front/management-services-tax-consulting.html">
                                <h3>Tax Consulting</h3>
                            </a>

                            <p>
                                Understanding global taxes laws and practices.
                            </p>
                        </div><!-- .text-container end -->
                    </div><!-- .service-feature-box-03 end -->
                </div><!-- .col-md-4 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4">
                    <!-- .service-feature-box-03 start -->
                    <div class="service-box service-box-03">
                        <div class="icon-container">
                            <i class="lynny-globes"></i>
                        </div><!-- .icon-container end -->

                        <div class="text-container">
                            <a href="/front/management-services-subcategory.html">
                                <h3>Mergers & Acquisitions</h3>
                            </a>

                            <p>
                                We will help you expand your business.
                            </p>
                        </div><!-- .text-container end -->
                    </div><!-- .service-feature-box-03 end -->
                </div><!-- .col-md-4 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

    <!-- .page-conent start -->
    <div class="page-content custom-background bkg-color-light-grey padding-small mb-120">

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row">
                <!-- .col-md-12 start -->
                <div class="col-md-12">
                    <!-- note start -->
                    <div class="call-to-action clearfix">
                        <div class="text">
                            <h4>We’ll identify your needs and enhance your business growth.</h4>
                        </div>

                        <a href="/front/management-contact-compact.html" class="btn icon-animated">
                            <span>
                                <i class="lynny-page-1"></i>
                                request a quick quote
                            </span>
                        </a>
                    </div><!-- .call-to-action end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

    <!-- .page-conent start -->
    <div class="page-content">

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row">
                <!-- .col-md-6 start -->
                <div class="col-md-6">
                    <!-- .custom-heading-01 start -->
                    <div class="custom-heading-01">
                        <span>who we do it for</span>
                        <h2>Industry sectors coverage</h2>
                    </div><!-- .custom-heading-01 end -->

                    <p>
                        We have deep understanding and experience in
                        implementing sustainable strategies in following
                        industry sectors:
                    </p>

                    <ul class="fa-ul ul-circled">
                        <li>
                            <div class="icon-container">
                                <img src="/front/img/svg/svg-icon-airplane.svg" alt="Aerospace & Defense" />
                            </div><!-- .icon-container end -->

                            <div class="li-content">
                                <p>
                                    Aerospace & Defense
                                </p>
                            </div><!-- .li-content end -->
                        </li>

                        <li>
                            <div class="icon-container">
                                <img src="/front/img/svg/svg-icon-chemical.svg" alt="Energy & Chemicals" />
                            </div><!-- .icon-container end -->

                            <div class="li-content">
                                <p>
                                    Energy & Chemicals
                                </p>
                            </div><!-- .li-content end -->
                        </li>

                        <li>
                            <div class="icon-container">
                                <img src="/front/img/svg/svg-icon-cargo.svg" alt="Transport & Logistics" />
                            </div><!-- .icon-container end -->

                            <div class="li-content">
                                <p>
                                    Transport & Logistics
                                </p>
                            </div><!-- .li-content end -->
                        </li>

                        <li>
                            <div class="icon-container">
                                <img src="/front/img/svg/svg-icon-support.svg" alt="Communications " />
                            </div><!-- .icon-container end -->

                            <div class="li-content">
                                <p>
                                    Communications
                                </p>
                            </div><!-- .li-content end -->
                        </li>

                        <li>
                            <div class="icon-container">
                                <img src="/front/img/svg/svg-icon-stocks.svg" alt="Banking and Finance" />
                            </div><!-- .icon-container end -->

                            <div class="li-content">
                                <p>
                                    Banking and Finance
                                </p>
                            </div><!-- .li-content end -->
                        </li>

                        <li>
                            <div class="icon-container">
                                <img src="/front/img/svg/svg-icon-desktop.svg" alt="Education & Non-profit" />
                            </div><!-- .icon-container end -->

                            <div class="li-content">
                                <p>
                                    Education & Non-profit
                                </p>
                            </div><!-- .li-content end -->
                        </li>
                    </ul>

                    <a href="/front/management-industry-sectors-02.html" class="read-more">
                        View all industry sectors
                    </a><!-- .read-more end -->
                </div><!-- .col-md-6 end -->

                <!-- .col-md-6 start -->
                <div class="col-md-6">
                    <div class="triggerAnimation animated" data-animate="fadeInRight">
                        <img src="/front/img/pics/consultingpress-management-consulting-industry-sectors.jpg"
                            alt="ConsultingPress Management Copnsulting Industry Sectors" />
                    </div>
                </div><!-- .col-md-6 end -->
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
                                <div class="odometer" data-to='14'></div>
                            </div>
                            <p>
                                Industry Sectors covered
                            </p>
                        </div><!-- .odometer-container end -->
                    </div><!-- .col-md-3 end -->

                    <!-- .col-md-3 start -->
                    <div class="col-md-3">

                        <!-- .odometer-container start -->
                        <div class="odometer-container">
                            <div class="odometer-inner">
                                <i class="fa fa-arrow-up"></i>
                                <div class="odometer" data-to='350'></div>
                            </div>
                            <p>
                                Projects Implemented
                            </p>
                        </div><!-- .odometer-container end -->
                    </div><!-- .col-md-3 end -->

                    <!-- .col-md-3 start -->
                    <div class="col-md-3">

                        <!-- .odometer-container start -->
                        <div class="odometer-container">
                            <div class="odometer-inner">
                                <i class="fa fa-arrow-up"></i>
                                <div class="odometer" data-to='85'></div>
                            </div>
                            <p>
                                Partners Worldwide
                            </p>
                        </div><!-- .odometer-container end -->
                    </div><!-- .col-md-3 end -->

                    <!-- .col-md-3 start -->
                    <div class="col-md-3">

                        <!-- .odometer-container start -->
                        <div class="odometer-container">
                            <div class="odometer-inner">
                                <i class="fa fa-arrow-up"></i>
                                <div class="odometer" data-to='1250'></div>
                            </div>
                            <p>
                                Satisfied Clients
                            </p>
                        </div><!-- .odometer-container end -->
                    </div><!-- .col-md-3 end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->


    <!-- .page-conent start -->
    <div class="page-content custom-background bkg-color-light-grey padding-small mb-120">

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row">
                <!-- .col-md-12 start -->
                <div class="col-md-12">
                    <!-- note start -->
                    <div class="call-to-action clearfix">
                        <div class="text">
                            <h4>Always searching for fresh talents. Send us your resume via email.</h4>
                        </div>

                        <a href="/front/management-contact-compact.html" class="btn icon-animated">
                            <span>
                                <i class="lynny-page-1"></i>
                                connect with us
                            </span>
                        </a>
                    </div><!-- .call-to-action end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

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
    <div class="page-content custom-background bkg-color-light-grey padding-small">

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row">
                <!-- .col-md-6 start -->
                <div class="col-md-6">
                    <h2>Subscribe for our latest news & insights</h2>
                </div><!-- .col-md-6 end -->

                <!-- .col-md-6 start -->
                <div class="col-md-6">
                    <!-- .widget.widget_newsletterwidget start -->
                    <div class="widget widget_newsletterwidget">

                        <!-- .newsletter.newsletter-widget start -->
                        <div class="newsletter newsletter-widget">
                            <form>
                                <input class="email" type="email" placeholder="Subscribe to our newsletter...">
                                <input type="submit" class="submit" value="subscribe">
                            </form>
                        </div><!-- .newsletter.newsletter-widget end -->
                    </div><!-- .widget.widget_newsletterwidget end -->
                </div><!-- .col-md-6 end -->
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
                    <div id="map" class="map-height-lg"></div>
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->

    <!-- .page-conent start -->
    <div class="page-content custom-background bkg-color-dark padding-small">

        <!-- .container start -->
        <div class="container">

            <!-- .row start -->
            <div class="row">

                <!-- .col-md-12 start -->
                <div class="col-md-12">

                    <!-- Owl Carousel Container start -->
                    <div class="carousel-container">
                        <div id="client-carousel" class="owl-carousel">
                            @foreach ($partenaires as $partenaire)
                                <!-- .owl-item start -->
                            <div class="owl-item">
                                <img src="{{ $partenaire->Cover() }}" alt="{{ $partenaire->nom }}" />
                            </div><!-- .owl-item end -->
                            @endforeach

                        </div><!-- .owl-carousel end -->
                    </div><!-- Owl Carousel Container end -->
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->
@endsection
