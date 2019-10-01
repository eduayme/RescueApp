<!-- Navbar - OPEN -->
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">

    <div class="container">

        <!-- Navbar logo - OPEN -->
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Aplicatiu de Recerques') }}
        </a>
        <!-- Navbar logo - CLOSE -->

        <!-- Collapsable button - OPEN -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsable button - CLOSE -->

        <!-- Collapsable content - OPEN -->
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">

            <!-- Left Side Of Navbar - OPEN -->
            <ul class="navbar-nav mr-auto margin-left margin-right">

                <!-- Authentication - OPEN -->
                @auth
                    <!-- Add search button - OPEN -->
                    <a href="{{ route('searches.create') }}" class="btn btn-outline-primary margin-left margin-right" role="button">
                        <span class="octicon octicon-plus"></span>
                        {{ __('actions.add') . ' ' . __('main.search') }}
                    </a>
                    <!-- Add search button - CLOSE -->
                @endauth
                <!-- Authentication - CLOSE -->

            </ul>
            <!-- Left Side Of Navbar - CLOSE -->

            <!-- Right Side Of Navbar - OPEN -->
            <ul class="navbar-nav ml-auto">

                <!-- Not authentication - OPEN -->
                @guest

                <!-- Login button - OPEN -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <span class="octicon octicon-sign-in"></span>
                        {{ __('main.login') }}
                    </a>
                </li>
                <!-- Login button - CLOSE -->

                <!-- Register button - OPEN -->
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <span class="octicon octicon-person"></span>
                            {{ __('main.register') }}
                        </a>
                    </li>
                @endif
                <!-- Register button - CLOSE -->

                <!-- Not authentication - CLOSE -->

                @else
                <!-- Authentication - OPEN -->

                <!-- Language - OPEN -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ strtoupper(App::getLocale()) }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/locale-ca">Catalan</a>
                        <a class="dropdown-item" href="/locale-es">Spanish</a>
                        <a class="dropdown-item" href="/locale-en">English</a>
                    </div>
                </li>
                <!-- Language - CLOSE -->

                <!-- User section - OPEN -->
                <li class="nav-item dropdown">

                    <!-- User button - OPEN -->
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                        <!-- User avatar - OPEN -->
                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="avatar">
                        <!-- User avatar - CLOSE -->

                        <!-- User name - OPEN -->
                        {{ Auth::user()->name }} <span class="caret"></span>
                        <!-- User name - CLOSE -->

                    </a>
                    <!-- User button - CLOSE -->

                    <!-- User dropdown - OPEN -->
                    <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">

                        <!-- Profile button - OPEN -->
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <span class="octicon octicon-person"></span>
                            {{ __('main.profile') }}
                        </a>
                        <!-- Profile button - CLOSE -->

                        <!-- Divider - OPEN -->
                        <div class="dropdown-divider"></div>
                        <!-- Divider - CLOSE -->

                        <!-- Close session button - OPEN -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="octicon octicon-sign-out"></span>
                            {{ __('main.logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <!-- Close session button - CLOSE -->

                    </div>
                    <!-- User dropdown - CLOSE -->

                </li>
                <!-- User section - OPEN -->

                <!-- Home section - OPEN -->
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="btn btn-outline-secondary btn-lg margin-left" role="button"
                    data-toggle="tooltip" data-placement="bottom" title="{{ __('main.home') }}">
                        <span class="octicon octicon-home"></span>
                    </a>
                </li>
                <!-- Home section - OPEN -->

                @endguest
                <!-- Authentication - CLOSE -->

            </ul>
            <!-- Right Side Of Navbar - CLOSE -->

        </div>
        <!-- Collapsable content - CLOSE -->

    </div>

</nav>
<!-- Navbar - CLOSE -->

<!-- JQuery 3.3.1 -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

<!-- JS -->
<script>

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

</script>
