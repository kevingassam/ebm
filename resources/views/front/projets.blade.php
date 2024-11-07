@extends('front.fixe')
@section('titre',"Nos Projets")
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
                    <h1>Nos projets</h1>
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
                            <span class="active">Nos projets</span>
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
            <!-- .col-md-12 start -->
            <div class="col-md-12">
                <!-- .custom-heading-02 start -->
                <div class="custom-heading-02">
                    <h2>Secteurs industriels</h2>
                    <span>Pour qui nous le faisons</span>
                </div><!-- .custom-heading-02 end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->

        <!-- .row start -->
        <div class="row">
            <ul class="industry-sectors-grid clearfix">

                @forelse ($projets as $projet)
                <li class="col-md-4 col-sm-4">
                    <div class="feature-box service-box-05">
                        <div class="media">
                            <a href="{{ route('projet_details',['id'=>$projet->id , 'titre'=>Str::slug($projet->nom)]) }}">
                                <img src="{{ $projet->Cover() }}" alt="{{ $projet->nom }}"/>
                            </a>
                        </div><!-- .media end -->

                        <div class="icon-container bkg-color-red">
                            <img src="/front/img/svg/svg-icon-chemical.svg" alt="{{ $projet->nom }}"/>
                        </div><!-- .icon-container end -->

                        <div class="text-container">
                            <a href="{{ route('projet_details',['id'=>$projet->id , 'titre'=>Str::slug($projet->nom)]) }}">
                                <h3>
                                    {{ Str::limit($projet->nom, 30)}}
                                </h3>
                            </a>
                        </div><!-- .text-container end -->
                    </div><!-- .feature-box.service-box-05 end -->
                </li>

                @empty

                @endforelse

            </ul><!-- .industry-sectors-grid end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->
@endsection
