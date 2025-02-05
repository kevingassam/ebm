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
                        <h1>Demande d'un devis</h1>
                    </div><!-- .pt-heading end -->
                </div><!-- .col-md-6 end -->

                <!-- .col-md-6 start -->
                <div class="col-md-6">
                    <!-- breadcrumbs start -->
                    <div class="breadcrumb-container clearfix">
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{ route('home') }}">Accueil</a>
                            </li>

                            <li>
                                <a href="{{ route('projet') }}">Demande d'un devis</a>
                            </li>

                            <li>
                                <span class="active">
                                    Demande d'un devis
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
                            <label for="">Sélectionnez un service</label>
                            <div class="dm-dropdown dm-dropdown-toggle">
                                <button type="button" class="button">Services*</button>
                                <div class="dm-dropdown-content">
                                    @foreach ($services as $key => $service)
                                        <div class="dm-dropdown-item">
                                            <input type="checkbox" class="parent-checkbox"
                                                data-group="group{{ $key }}" id="parent-{{ $key }}">
                                            <label for="parent-{{ $key }}">{{ $service->titre }}</label>
                                            @if ($service->SousServices)
                                                <div class="dm-dropdown-subitem">
                                                    @foreach ($service->SousServices as $item)
                                                        <div style="margin-bottom: 5px;">
                                                            <input type="checkbox" name="sous_services[]"
                                                                data-name="{{ $item->titre }}"
                                                                id="child-checkbox{{ $item->id }}"
                                                                class="child-checkbox group{{ $key }}"
                                                                value="{{ $item->id }}">
                                                            <label for="child-checkbox{{ $item->id }}">
                                                                {{ $item->titre }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="selected-sous-services" class="selected-sous-services">
                                <!-- Les badges des sous-services sélectionnés apparaîtront ici -->
                            </div>

                            @error('sous_services')
                                <span class="small text-danger">{{ $message }}</span>
                            @enderror
                            <input type="hidden" name="selected_services" id="selectedServices">
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
                            <button class="btn btn-sm " style="background-color: #030d26;" type="submit">
                                <b style="color: white ;">
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


    <script>
        function updateSelectedServices() {
            const selectedServicesContainer = document.getElementById('selected-sous-services');
            const selectedCheckboxes = Array.from(document.querySelectorAll('.child-checkbox:checked'));

            const hiddenInput = document.getElementById('selectedServices');
            hiddenInput.value = selectedCheckboxes.map((checkbox) => checkbox.value).join(',');

            selectedServicesContainer.innerHTML = '';

            selectedCheckboxes.forEach((checkbox) => {
                const badge = document.createElement('span');
                badge.className = 'badge';
                badge.textContent = checkbox.dataset.name;

                selectedServicesContainer.appendChild(badge);
            });
        }

        document.querySelectorAll('.parent-checkbox').forEach((parent) => {
            parent.addEventListener('change', function() {
                const group = this.dataset.group;
                const children = document.querySelectorAll(`.child-checkbox.${group}`);
                children.forEach((child) => (child.checked = this.checked));
                updateSelectedServices();
            });
        });

        document.querySelectorAll('.child-checkbox').forEach((child) => {
            child.addEventListener('change', function() {
                const group = this.classList[1];
                const parent = document.querySelector(`.parent-checkbox[data-group="${group}"]`);
                const children = document.querySelectorAll(`.child-checkbox.${group}`);
                parent.checked = Array.from(children).every((child) => child.checked);
                updateSelectedServices();
            });
        });

        updateSelectedServices();
    </script>


    <style>
        .text-danger {
            color: red;
            font-weight: bold;
        }

        .dm-dropdown {
            position: relative;
            display: inline-block;
            width: 100% !important;
            border: solid 1px rgba(121, 119, 119, 0.541);
            padding: 6px;
            border-radius: 5px !important;
        }

        .dm-dropdown .button {
            background-color: transparent;
            color: #333333be;
            padding: 0;
            border: none;
            cursor: pointer;
            text-align: left;
            outline: none;
            font-size: 14px;
            width: 100%;
            border-radius: 5px !important;
        }

        .dm-dropdown-content {
            display: none;
            position: absolute;
            background-color: #ffffff;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.062);
            border: solid 1px rgba(0, 0, 0, 0.089);
            border-radius: 10px;
            padding: 10px;
            z-index: 1;
            width: 98%;
            max-height: 300px;
            overflow-y: scroll;
        }

        .dm-dropdown:hover .dm-dropdown-content {
            display: block;
        }

        .dm-dropdown-item {
            margin-bottom: 5px;
        }

        .dm-dropdown-subitem {
            margin-left: 20px;

        }


        .dm-dropdown-content input[type="checkbox"] {
            display: none;
            /* Cache l'input natif */
        }

        .dm-dropdown-content label {
            position: relative;
            display: flex;
            align-items: center;
            cursor: pointer;
            font-size: 14px;
            line-height: 1.4;
        }

        /* Conteneur de la checkbox */
        .dm-dropdown-content label::before {
            content: "";
            display: inline-block;
            width: 18px;
            height: 18px;
            border: 2px solid #030d26;
            /* Couleur principale */
            border-radius: 4px;
            margin-right: 10px;
            background-color: #fff;
            transition: all 0.3s ease-in-out;
        }

        /* Indicateur de coche */
        .dm-dropdown-content label::after {
            content: "";
            position: absolute;
            top: 3px;
            left: 6px;
            /* Alignement au centre */
            width: 6px;
            height: 10px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg) scale(0);
            transform-origin: center;
            transition: transform 0.2s ease-in-out;
        }

        /* Lorsqu'une checkbox est cochée */
        .dm-dropdown-content input[type="checkbox"]:checked+label::before {
            background-color: #030d26;
            /* Couleur du fond cochée */
            border-color: #030d26;
        }

        .dm-dropdown-content input[type="checkbox"]:checked+label::after {
            transform: rotate(45deg) scale(1);
        }

        /* Styles supplémentaires */
        .dm-dropdown-subitem label {
            font-size: 13px;
            margin-left: 5px;
        }

        .selected-sous-services .badge {
            display: inline-block;
            background-color: #030d26;
            color: #fff;
            padding: 5px 10px;
            border-radius: 12px;
            margin-right: 5px;
            font-size: 12px;
        }
    </style>

@endsection
