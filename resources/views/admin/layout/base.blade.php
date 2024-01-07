<!doctype html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @isset($section)
            {{ $section }}
        @else
            Admin
        @endisset | {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    @vite(['resources/css/app.css'])

    @yield('css')
</head>
<body>

<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <div class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white">
        <a class="text-white" href="/admin">Admin</a> | <a href="/" class="text-white" target="_blank">Web</a>
    </div>
    <div class="d-none d-lg-block text-white me-3">
        <span>{{ Auth::user()->name }}</span>
        <span class="fs-6">(<a href="{{ route('admin.get.logout') }}">odhlásit</a>)</span>
    </div>
    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
        </li>
    </ul>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                 aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="sidebarMenuLabel">
                        <span>{{ Auth::user()->name }}</span>
                        <span class="fs-6">(<a href="{{ route('admin.get.logout') }}">odhlásit</a>)</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                            aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                    <ul class="nav flex-column">
                        @can('admin')
                            <span class="px-3">Admin</span>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page"
                                   href="{{ route('admin.get.services.list') }}">
                                    <i class="bi bi-file-earmark-text"></i>
                                    Služby
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page"
                                   href="{{ route('admin.get.admins.list') }}">
                                    <i class="bi bi-person-fill"></i>
                                    Uživatelé
                                </a>
                            </li>
                        @endcan
                        @can('barber')
                            <span class="px-3">Barber</span>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page"
                                   href="{{ route('admin.get.calendar') }}">
                                    <i class="bi bi-calendar-check"></i>
                                    Můj kalendář
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </div>

        <main class="pt-2 col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @isset($section)
                <h2>{{ $section }}</h2>
            @endisset
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <i class="bi bi-info-square me-2"></i>
                    <span>{{ Session::get('message') }}</span>
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    <i class="bi bi-exclamation-square me-2"></i>
                    <span>{{ Session::get('error') }}</span>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>


@yield('js')
</body>
</html>

