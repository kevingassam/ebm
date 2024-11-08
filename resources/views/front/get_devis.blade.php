@extends('front.fixe')
@section('titre', "Demande d'un service")
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
                        <h1>Demande d'un devi</h1>
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
                                <a href="{{ route('projet') }}">Demande d'un devi</a>
                            </li>

                            <li>
                                <span class="active">
                                    Demande d'un devi
                                </span>
                            </li>
                        </ul><!-- .breadcrumb end -->
                    </div><!-- .breadcrumb-container end -->
                </div><!-- .col-md-6 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .page-title-style-01 end -->
    <div class="container">
        <div class="row">
            <!-- .col-md-8 start -->
            <div class="col-md-2 mx-auto"></div>
            <div class="col-md-8 mx-auto">
                <!-- .custom-heading03 start -->
                <div class="custom-heading-03">
                    <h3>
                        Formulaire de demande de service
                    </h3>
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


                <form class="wpcf7 wpcf7-contact-us clearfix" method="POST" action="{{ route('get_devis.post') }}">
                    @csrf
                    <input type="text" class="wpcf7-text" id="contact-name" value="{{ old('nom') }}" required name="nom" placeholder="Nom*">
                    <input type="email" class="wpcf7-email" id="contact-email" value="{{ old('email') }}" required name="email"
                        placeholder="Email*">
                    <input type="text" class="wpcf7-text" id="contact-phone" value="{{ old('telephone') }}" required name="telephone"
                        placeholder="Téléphone*">
                    <input type="text" class="wpcf7-text" id="contact-subject" value="{{ old('adresse') }}" placeholder="Adresse ">
                    <textarea rows="8" class="wpcf7-textarea" id="contact-message" required name="message" placeholder="Message*">{{ old('message') }}</textarea>
                    <div class="g-recaptcha" data-sitekey="6Ld4VykTAAAAAM_qltIuTg7I0hpcdHjX7j68qpRz"></div>
                    <input type="submit" value="Envoyer la demande" class="wpcf7-submit">
                </form><!-- .wpcf7.clearfix end -->
            </div><!-- .col-md-8 end -->
            <div class="col-md-2 mx-auto"></div>
        </div><!-- .row end -->
    </div>
    <br><br><br>



@endsection
