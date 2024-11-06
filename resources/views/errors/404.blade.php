@extends('front.fixe')
@section('titre', "Page introuvable")
@section('body')

<section class="error-area-1 position-relative">
    <div class="container">
        <div class="error-img">
            <img src="/front/img/normal/error_1_1.png" alt="404 image">
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="error-content">
                    <h2 class="error-title">404</h2>
                    <h3 class="error-subtitle">Cette page semble avoir traversé un portail temporel</h3>
                    <p class="error-text">
                        Nous nous excusons pour toute perturbation du continuum espace-temps. N'hésitez pas à revenir sur notre page d'accueil
                    </p>
                    <a href="{{ route('home') }}" class="th-btn style-border2 th-btn-icon">
                        Retourner à la maison
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
