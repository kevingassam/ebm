<!doctype html>
<html lang="fr" data-bs-theme="semi-dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('titre') - {{ $infos->app_name }}</title>

    <!--plugins-->
    <link href="/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <link href="/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet">

    <!-- loader-->
    <link href="/admin/css/pace.min.css" rel="stylesheet">
    <script src="/admin/js/pace.min.js"></script>
    <!--Styles-->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/admin/css/icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="/admin/css/main.css" rel="stylesheet">
    <link href="/admin/css/dark-theme.css" rel="stylesheet">
    <link href="/admin/css/semi-dark-theme.css" rel="stylesheet">
    <link href="/admin/css/minimal-theme.css" rel="stylesheet">
    <link href="/admin/css/shadow-theme.css" rel="stylesheet">


    <link rel="shortcut icon" href="{{ $infos->GetIcon() }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @livewireStyles
    @yield('header')

</head>

<body>

    <!--start header-->
    <header class="top-header">
        <nav class="navbar navbar-expand justify-content-between">
            <div class="btn-toggle-menu">
                <span class="material-symbols-outlined">menu</span>
            </div>
            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <input class="form-control form-control-sm rounded-5 px-5" disabled type="search" placeholder="Search">
                <span
                    class="material-symbols-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
            </div>
            <ul class="navbar-nav top-right-menu gap-2">
                <li class="nav-item d-lg-none d-block" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <a class="nav-link" href="javascript:;"><span class="material-symbols-outlined">
                            search
                        </span></a>
                </li>
                <li class="nav-item dark-mode">
                    <a class="nav-link dark-mode-icon" href="javascript:;"><span
                            class="material-symbols-outlined">dark_mode</span></a>
                </li>
            </ul>
        </nav>
    </header>
    <!--end header-->


    <!--start sidebar-->
    <aside class="sidebar-wrapper">
        <div class="sidebar-header">
            <div class="logo-icon">
                <img src="{{ $infos->GetIcon() }}" class="logo-img" alt="{{ $infos->app_name }}">
            </div>
            <div class="logo-name flex-grow-1">
                <h5 class="mb-0">{{ $infos->app_name }}</h5>
            </div>
            <div class="sidebar-close ">
                <span class="material-symbols-outlined">close</span>
            </div>
        </div>
        <div class="sidebar-nav" data-simplebar="true">

            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">home</span>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('partenaires.index') }}">
                        <div class="parent-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="menu-title">Partenaires</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <span class="material-symbols-outlined">apps</span>
                        </div>
                        <div class="menu-title">Projets</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('projets.index') }}"><span
                                    class="material-symbols-outlined">arrow_right</span>
                                Liste
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('projets.create') }}">
                                <span class="material-symbols-outlined">arrow_right</span>
                                Ajouter
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('demandes.index') }}">
                                <span class="material-symbols-outlined">arrow_right</span>
                                Demandes
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-label">Autres</li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><span class="material-symbols-outlined">apps</span>
                        </div>
                        <div class="menu-title">Blogs</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('blogs.index') }}">
                                <span class="material-symbols-outlined">arrow_right</span>
                                Liste
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blogs.create') }}">
                                <span class="material-symbols-outlined">arrow_right</span>
                                Ajouter
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('contacts.index') }}">
                        <div class="parent-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="menu-title">Contacts</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bi bi-gear"></i>
                        </div>
                        <div class="menu-title">Configuration</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('configurations.index') }}">
                                <span class="material-symbols-outlined">arrow_right</span>
                                Informations
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('temoignages.index') }}">
                                <span class="material-symbols-outlined">arrow_right</span>
                                Témoignanges
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('banners') }}">
                                <span class="material-symbols-outlined">arrow_right</span>
                                Bannières page
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about-config') }}">
                                <span class="material-symbols-outlined">arrow_right</span>
                                Page à-propos
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end navigation-->


        </div>
        <div class="sidebar-bottom dropdown dropup-center dropup">
            <div class="dropdown-toggle d-flex align-items-center px-3 gap-3 w-100 h-100" data-bs-toggle="dropdown">
                <div class="user-img">
                    <img src="/admin/images/avatars/01.png" alt="">
                </div>
                <div class="user-info">
                    <h5 class="mb-0 user-name">{{ Auth::user()->nom }}</h5>
                    <p class="mb-0 user-designation">Administrateur</p>
                </div>
            </div>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('configurations.index') }}"><span
                            class="material-symbols-outlined me-2">
                            tune
                        </span><span>Configuration</span></a>
                </li>
                <li><a class="dropdown-item" href="{{ route('dashboard') }}"><span
                            class="material-symbols-outlined me-2">
                            dashboard
                        </span><span>Dashboard</span></a>
                </li>
                <li>
                    <div class="dropdown-divider mb-0"></div>
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"><span
                            class="material-symbols-outlined me-2">
                            logout
                        </span><span>Déconnexion</span></a>
                </li>
            </ul>
        </div>
    </aside>
    <!--end sidebar-->


    @yield('body')




    <!--start overlay-->
    <div class="overlay btn-toggle-menu"></div>
    <!--end overlay-->

    <!-- Search Modal -->
    <div class="modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header gap-2">
                    <div class="position-relative popup-search w-100">
                        <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search"
                            placeholder="Search">
                        <span
                            class="material-symbols-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                    </div>
                    <button type="button" class="btn-close d-xl-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="search-list">
                        <p class="mb-1">Html Templates</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action active align-items-center d-flex gap-2"><i
                                    class="bi bi-filetype-html fs-5"></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-award fs-5"></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-box2-heart fs-5"></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-camera-video fs-5"></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Web Designe Company</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-chat-right-text fs-5"></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-cloud-arrow-down fs-5"></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-columns-gap fs-5"></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-collection-play fs-5"></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Software Development</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-cup-hot fs-5"></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-droplet fs-5"></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-exclamation-triangle fs-5"></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-eye fs-5"></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Online Shoping Portals</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-facebook fs-5"></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-flower2 fs-5"></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-geo-alt fs-5"></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-github fs-5"></i>eCommerce Html Templates</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    @livewireScripts


    <script src="/admin/js/jquery.min.js"></script>
    <script src="/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="/admin/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/admin/plugins/simplebar/js/simplebar.min.js"></script>

    <!--BS Scripts-->
    <script src="/admin/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/js/main.js"></script>


    @yield('scripts')
</body>

</html>
