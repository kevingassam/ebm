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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- .custom-heading03 start -->
                <div class="custom-heading-03">
                    <h3>
                        Formulaire de demande de devis
                    </h3>
                </div><!-- .custom-heading-03 end -->
                {{--
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif


                <form method="POST" action="{{ route('get_devis.post') }}">
                    @csrf
                    <div class="row">


                        <div class="col-sm-12 pb-3-devis">
                            <div class="form-group">
                                <label for="service-dropdown">Sélectionnez un service :</label>
                                <select id="service-dropdown" class="form-control" name="service">
                                    <option value="">-- Choisir un service --</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->titre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Sous-services disponibles :</label>
                                <div id="sous-services-container">
                                    <div class="text-muted small text-danger">
                                        Aucun sous-service disponible pour le service sélectionné.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Sous-services sélectionnés :</label>
                                <div id="sous-services-container-selected">
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 pb-3-devis">
                            <label for="">Nom et prénom</label>
                            <input type="text" class="form-control" value="{{ old('nom') }}" required name="nom"
                                placeholder="Nom*">
                            @error('nom')
                                <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 pb-3-devis">
                            <label for="">Email</label>
                            <input type="email" class="form-control" value="{{ old('email') }}" required name="email"
                                placeholder="Email*">
                            @error('email')
                                <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 pb-3-devis">
                            <label for="">Numéro de téléphone</label>
                            <input type="text" class="form-control" value="{{ old('telephone') }}" required
                                name="telephone" placeholder="Téléphone*">
                            @error('telephone')
                                <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 pb-3-devis">
                            <label for="">Adresse</label>
                            <input type="text" class="form-control" value="{{ old('adresse') }}" placeholder="Adresse ">
                            @error('adresse')
                                <span class="small text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if (!$service)
                            <div class="col-sm-12 pb-3-devis">
                                <label for="">Choisir un service</label>
                                <select name="service_id" @required(true) class="form-control">
                                    <option value=""></option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" @selected(old('service_id') == $service->id)>
                                            {{ $service->titre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        <div class="col-sm-12">
                            <label for="">Décrire votre besoin</label>
                            <textarea rows="8" class="form-control" id="contact-message" required name="message" placeholder="Message*">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="small text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <div class="text-danger small">
                                - Les champs marqués par (*) sont obligatoires. <br>
                                - Le service choisi sera contacter pour vous renseigner sur les détails.
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <br>
                            <button class="btn btn-sm btn-dark" type="submit">
                                <b class="text-white">
                                    Demander le devis
                                    <i class="fa fa-paper-plane"></i>
                                </b>
                            </button>
                        </div>
                </form><!-- .wpcf7.clearfix end -->
            </div><!-- .col-md-8 end -->
        </div><!-- .row end -->
    </div>
    <br><br><br>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const services = @json($services->mapWithKeys(fn($service) => [$service->id => $service->sousServices]));

    $(document).ready(function () {
        const selectedSousServices = new Set(); // Ensemble pour stocker les IDs des sous-services sélectionnés

        // Gestion du changement de service
        $('#service-dropdown').on('change', function () {
            const serviceId = $(this).val();
            const sousServices = services[serviceId] || [];
            const container = $('#sous-services-container');

            container.empty(); // Vide les sous-services précédents

            if (sousServices.length > 0) {
                sousServices.forEach(sousService => {
                    const checkbox = `
                        <div class="form-check">
                            <input class="form-check-input sous-service-checkbox" type="checkbox"
                                value="${sousService.id}" id="sous-service-${sousService.id}" name="sous_services[]">
                            <label class="form-check-label" for="sous-service-${sousService.id}">
                                ${sousService.titre}
                            </label>
                        </div>
                    `;
                    container.append(checkbox);
                });

                // Ajout d'un gestionnaire d'événement pour les nouvelles cases à cocher
                $('.sous-service-checkbox').on('change', function () {
                    const sousServiceId = $(this).val();
                    const sousServiceTitle = $(this).next('label').text();

                    if ($(this).is(':checked')) {
                        // Ajouter un sous-service à la liste sélectionnée
                        if (!selectedSousServices.has(sousServiceId)) {
                            selectedSousServices.add(sousServiceId);
                            addSelectedSousService(sousServiceId, sousServiceTitle);
                        }
                    } else {
                        // Retirer un sous-service de la liste sélectionnée
                        removeSelectedSousService(sousServiceId);
                    }
                });
            } else {
                container.append('<p class="text-muted text-danger">Aucun sous-service disponible.</p>');
            }
        });

        // Fonction pour ajouter un sous-service sélectionné
        function addSelectedSousService(id, title) {
            const containerSelected = $('#sous-services-container-selected');
            const sousServiceElement = `
                <div class="selected-sous-service" data-id="${id}">
                    <span>- ${title}</span>

                </div>
            `;
            containerSelected.append(sousServiceElement);

            // Ajouter un gestionnaire pour le bouton "Supprimer"
            containerSelected.find('.remove-sous-service').last().on('click', function () {
                removeSelectedSousService(id);
            });
        }

        // Fonction pour retirer un sous-service sélectionné
        function removeSelectedSousService(id) {
            selectedSousServices.delete(id); // Retirer de l'ensemble
            $(`#sous-services-container-selected .selected-sous-service[data-id="${id}"]`).remove(); // Retirer du DOM
            $(`#sous-service-${id}`).prop('checked', false); // Décocher la case à cocher associée
        }
    });
</script>

<style>
    .text-danger{
        color: red;
        font-weight: bold;
    }
</style>
@endsection
