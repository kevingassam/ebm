@extends('front.fixe')
@section('titre', 'Contactez-nous')
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
                        <h1>Contactez-nous</h1>
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
                                <span class="active">Contactez-nous</span>
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

                <!-- .col-md-4 start -->
                <div class="col-md-4 col-sm-4">
                    <!-- .custom-heading03 start -->
                    <div class="custom-heading-03">
                        <h3>Quartier général</h3>
                    </div><!-- .custom-heading-03 end -->

                    <ul class="fa-ul default">
                        <li>
                            <i class="lynny-home"></i>
                            <p>
                                @if ($infos->adresse1)
                                    {{ $infos->adresse1 }}
                                @endif
                                @if ($infos->adresse2)
                                    <br>
                                    {{ $infos->adresse2 }}
                                @endif
                            </p>
                        </li>
                    </ul><!-- .fa-ul.default end -->
                </div><!-- .col-md-4 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4 col-sm-4">
                    <!-- .custom-heading03 start -->
                    <div class="custom-heading-03">
                        <h3>Coordonnées</h3>
                    </div><!-- .custom-heading-03 end -->

                    <ul class="fa-ul default">
                        <li>
                            <i class="lynny-phone-1"></i>
                            <p>
                                @if ($infos->tel1)
                                    {{ $infos->tel1 }}
                                @endif
                                @if ($infos->tel2)
                                    <br>
                                    {{ $infos->tel2 }}
                                @endif
                            </p>
                        </li>

                        <li>
                            <i class="lynny-mail-duplicate"></i>
                            <p>
                                @if ($infos->email1)
                                    <a href="mailto:{{ $infos->email1 }}">{{ $infos->email1 }}</a>
                                @endif
                                @if ($infos->email2)
                                    <br>
                                    <a href="mailto:{{ $infos->email2 }}">{{ $infos->email2 }}</a>
                                @endif

                            </p>
                        </li>
                    </ul><!-- .fa-ul.default end -->
                </div><!-- .col-md-4 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4 col-sm-4">
                    <!-- .custom-heading03 start -->
                    <div class="custom-heading-03">
                        <h3>Heures de travail</h3>
                    </div><!-- .custom-heading-03 end -->

                    <ul class="fa-ul default">
                        <li>
                            <i class="fa fa-clock-o"></i>
                            <p>
                                Mon - Fri: 08am - 04pm
                            </p>
                        </li>

                        <li>
                            <i class="fa fa-clock-o"></i>
                            <p>
                                SAT - SUN Closed
                            </p>
                        </li>
                    </ul><!-- .fa-ul.default end -->
                </div><!-- .col-md-4 end -->
            </div><!-- .row end -->

            <!-- .row start -->
            <div class="row">
                <!-- .col-md-8 start -->
                <div class="col-md-8">
                    <!-- .custom-heading03 start -->
                    <div class="custom-heading-03">
                        <h3>Contactez-nous</h3>
                    </div><!-- .custom-heading-03 end -->

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif


                    <form class="wpcf7 wpcf7-contact-us clearfix" method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <input type="text" class="wpcf7-text" id="contact-name" value="{{ old('nom') }}" required name="nom" placeholder="Nom*">
                    <input type="email" class="wpcf7-email" id="contact-email" value="{{ old('email') }}" required name="email"
                        placeholder="Email*">
                    <input type="text" class="wpcf7-text" id="contact-phone" value="{{ old('telephone') }}" required name="telephone"
                        placeholder="Téléphone*">
                    <input type="text" class="wpcf7-text" id="contact-subject" value="{{ old('adresse') }}" placeholder="Adresse ">
                    <textarea rows="8" class="wpcf7-textarea" id="contact-message" required name="message" placeholder="Message*">{{ old('message') }}</textarea>
                    <div class="g-recaptcha" data-sitekey="6Ld4VykTAAAAAM_qltIuTg7I0hpcdHjX7j68qpRz"></div>
                        <input type="submit" value="Envoyer le message" class="wpcf7-submit">
                    </form><!-- .wpcf7.clearfix end -->
                </div><!-- .col-md-8 end -->

                <!-- .col-md-4 start -->
                <div class="col-md-4">
                    <!-- .custom-heading03 start -->
                    <div class="custom-heading-03">
                        <h3>Key Contacts</h3>
                    </div><!-- .custom-heading-03 end -->

                    <div class="key-contacts">
                    </div><!-- .key-contact end -->
                </div><!-- .col-md-4 end -->
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
                        <iframe src="{{ $infos->map }}" class="map-height-lg" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @endif
                </div><!-- .col-md-12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-content end -->
@endsection
