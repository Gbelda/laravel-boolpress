<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

        <header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('admin.home') }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170 36" class="x-icon x-icon--logo w-75">
                    <path
                        d="M47.57 10l-2.79 10.72L41.99 10h-2.81l.65 2.3-2.45 8.78L34.7 10H32l3.8 14h2.96l2.28-7.49L43.17 24h2.95l4-14h-2.55zm28.39 4.06a9 9 0 0 0-1.86-.23c-3.4 0-5.26 2.27-5.26 5.6 0 3.31 1.86 4.82 4.05 4.82a5.45 5.45 0 0 0 3.2-1.17V24h2.33V10h-2.46v4.06zm0 7.08c-.8.73-1.55 1.13-2.34 1.13-1.36 0-2.23-.9-2.23-3.01 0-2.28 1.08-3.47 2.96-3.47.55 0 1.1.11 1.6.31v5.04zM64.2 15.7h-.09v-1.64h-2.3V24h2.47v-5.92c.77-1.46 1.71-1.94 3.28-1.94h.25V14a6.67 6.67 0 0 0-.67-.04c-1.34 0-2.26.52-2.94 1.75zm83.14-1.89c-3.4 0-5.01 2.2-5.01 5.23 0 3.02 1.6 5.2 5.01 5.2s5.01-2.18 5.01-5.2c0-3.03-1.63-5.23-5.02-5.23h.01zm0 8.44c-1.6 0-2.46-1.04-2.46-3.21 0-2.18.85-3.22 2.46-3.22 1.6 0 2.44 1.04 2.44 3.22 0 2.17-.84 3.21-2.45 3.21h.01zm19.12-8.44c-1.06 0-2.28.58-3.38 1.32l-.3.19c-.51-1.11-1.56-1.5-2.71-1.5-1.06 0-2.27.54-3.38 1.27v-1.03h-2.34V24h2.48v-7.13a5.3 5.3 0 0 1 2.61-.98c.81 0 1.32.44 1.32 1.84V24h2.46v-7.1c.92-.6 1.9-1 2.6-1 .82 0 1.32.43 1.32 1.84V24h2.46v-6.86c0-1.92-1.14-3.32-3.15-3.32zm-111.64 0c-3.4 0-5 2.2-5 5.23 0 3.02 1.6 5.2 5 5.2s5.02-2.18 5.02-5.2c0-3.03-1.64-5.23-5.03-5.23h.01zm0 8.44c-1.6 0-2.46-1.04-2.46-3.21 0-2.18.86-3.22 2.47-3.22 1.6 0 2.44 1.04 2.44 3.22 0 2.17-.85 3.21-2.46 3.21h.01zm40.31-6.56h-.08v-1.63h-2.31V24h2.46v-5.92c.77-1.46 1.71-1.94 3.28-1.94h.25V14a6.67 6.67 0 0 0-.67-.04c-1.33 0-2.25.52-2.94 1.75h.01zM86.05 10h-4.58v14h2.64v-4.87h1.93c2.99 0 5.16-1.61 5.16-4.62 0-3-2.17-4.51-5.16-4.51zm.02 7.08h-1.96v-5.01h1.95c1.6 0 2.38.88 2.38 2.44 0 1.57-.73 2.57-2.38 2.57h.01zm36.02-.23c0-.75.82-1.04 1.7-1.04.93.01 1.86.16 2.75.43V14.2a10.14 10.14 0 0 0-2.95-.38c-2.38 0-4.05 1.13-4.05 2.97 0 3.57 4.92 2.65 4.92 4.39 0 .85-.77 1.08-1.9 1.08-.8 0-2.07-.3-2.99-.63v2.03a8.29 8.29 0 0 0 2.9.59c2.32 0 4.53-.69 4.53-3.17.03-3.45-4.9-2.56-4.9-4.23zm-17.5-3.03c-3.18 0-4.83 2.47-4.83 5.16 0 3.7 1.94 5.27 5.1 5.27a11.81 11.81 0 0 0 3.65-.57v-2.05c-1.03.38-1.97.61-2.97.61-1.84 0-3.07-.5-3.13-2.67h6.36c.06-.49.09-.98.08-1.46 0-2.1-1.11-4.29-4.27-4.29zm-2.16 4.12c.15-1.38.9-2.26 2.13-2.26 1.32 0 1.72 1.05 1.72 2.26h-3.85zm10.7-1.09c0-.75.81-1.04 1.69-1.04.93.01 1.86.16 2.75.43V14.2a10.14 10.14 0 0 0-2.94-.38c-2.38 0-4.06 1.13-4.06 2.97 0 3.57 4.93 2.65 4.93 4.39 0 .85-.78 1.08-1.9 1.08-.8 0-2.07-.3-3-.63v2.03a8.28 8.28 0 0 0 2.9.59c2.32 0 4.54-.69 4.54-3.17.02-3.45-4.91-2.56-4.91-4.23zm21.97 2.1c0-2.33 1.27-3.12 2.78-3.12.94.03 1.88.22 2.76.57v-2.1a8.11 8.11 0 0 0-2.8-.48c-3.28 0-5.31 2-5.31 5.25 0 3.07 1.46 5.18 5.16 5.18 1.17 0 2.08-.23 3.08-.57v-2.04c-1.13.43-2 .6-2.77.6-1.63 0-2.9-.75-2.9-3.3zM128.66 24h2.47v-2.55h-2.47V24zM1.72 16c0 4.47 2.6 8.32 6.36 10.15L2.7 11.41A11.24 11.24 0 0 0 1.72 16zM13 27.28c1.31 0 2.57-.23 3.75-.64l-.08-.15-3.47-9.5-3.38 9.83c1 .3 2.07.46 3.18.46zm1.55-16.57l4.08 12.13 1.13-3.76c.48-1.56.85-2.68.85-3.65 0-1.4-.5-2.36-.92-3.1-.58-.94-1.11-1.73-1.11-2.65 0-1.04.78-2 1.9-2h.14A11.24 11.24 0 0 0 13 4.72 11.27 11.27 0 0 0 3.58 9.8l.72.02c1.18 0 3-.15 3-.15.62-.03.69.86.08.93 0 0-.61.08-1.3.11l4.12 12.22 2.47-7.4-1.76-4.82a20.13 20.13 0 0 1-1.18-.1c-.61-.04-.54-.97.07-.94 0 0 1.86.15 2.97.15 1.18 0 3-.15 3-.15.61-.03.69.86.08.93 0 0-.61.07-1.3.11zm4.12 15.04A11.28 11.28 0 0 0 24.28 16c0-1.96-.5-3.8-1.38-5.41a10.65 10.65 0 0 1-.78 5.2l-3.45 9.96zM13 29a13 13 0 1 1 0-26 13 13 0 0 1 0 26z"
                        fill="inherit" fill-rule="nonzero"></path>
                </svg>
            </a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control w-100 border mx-1" type="search" placeholder="Search" aria-label="Search">

            @auth
                <div class="col">
                    <div class="name text-dark text-center">Hi {{ Auth::user()->name }}</div>
                    <div class="logout text-white text-center">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                                                                                                                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endauth
        </header>

        <div class="container-fluid pt-5">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-5">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.home' ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('admin.home') }}">
                                    <i class="fas fa-tachometer-alt fa-lg fa-fw"></i>
                                    Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Str::of(Route::currentRouteName())->contains('products') ? 'active' : '' }}"
                                    href="{{ route('admin.products.index') }}">
                                    Products
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.articles.index') }}">
                                    Articles
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Resources
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Plans & Pricing
                                </a>
                            </li>

                        </ul>

                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
