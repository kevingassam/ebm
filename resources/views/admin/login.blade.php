<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - {{ $infos->app_name }} </title>

    <!--plugins-->
    <link href="/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <link href="/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet">
    <!--Styles-->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/admin/css/icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="/admin/css/main.css" rel="stylesheet">
    <link href="/admin/css/dark-theme.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ $infos->GetIcon() }}" type="image/x-icon">

</head>

<body>


    <!--authentication-->

    <div class="section-authentication-cover">
        <div class="">
            <div class="row g-0">

                <div
                    class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex bg-primary">

                    <div class="card rounded-0 mb-0 border-0 bg-transparent">
                        <div class="card-body">
                        </div>
                    </div>

                </div>

                <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
                    <div class="card rounded-0 m-3 mb-0 border-0">
                        <div class="card-body p-sm-5">
                            <img src="{{ $infos->GetLogo() }}" class="mb-4" height="40" alt="{{ $infos->app_name }}">
                            <h4 class="fw-bold">{{ $infos->app_name }}</h4>
                            <p class="mb-0">Entrez vos identifiants pour vous connecter à votre compte</p>

                            <div class="form-body mt-4">
                                <form class="row g-3" action="{{ route('login.post') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputEmailAddress" class="form-label">Adresse Email</label>
                                        <input type="email" class="form-control  border-3" id="inputEmailAddress" required
                                            name="email" value="{{ old('email') }}" placeholder="jhon@example.com">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Mot de passe</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control border-end-0  border-3" required
                                                name="password" id="inputChoosePassword"
                                                placeholder="Enter Password">
                                            <a href="javascript:;" class="input-group-text bg-transparent  border-3"><i
                                                    class="bi bi-eye-slash-fill"></i></a>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch  border-3">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-end">
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn  border-3 btn-danger">
                                                Connexion
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-start">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!--end row-->
        </div>
    </div>

    <!--authentication-->




    <!--plugins-->
    <script src="/admin/js/jquery.min.js"></script>
    <style>
        .bg-primary{
            background:url('/img/modern-tokyo-street-background.webp')no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
    </script>

</body>

</html>
