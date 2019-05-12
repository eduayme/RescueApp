<!-- Navbar - OPEN -->
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">

        <!-- Navbar logo - OPEN -->
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Aplicatiu de Recerques') }}
        </a>
        <!-- Navbar logo - CLOSE -->

        <!-- Collapsable button - OPEN -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsable button - CLOSE -->

        <!-- Collapsable content - OPEN -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar - OPEN -->
            <ul class="navbar-nav mr-auto margin-left">

              @auth
              <!-- Add search button - OPEN -->
              <a href="{{ route('index') }}" class="btn btn-outline-primary margin-left margin-right" role="button">
                {{ __('actions.add') . ' ' . __('main.search') }}
              </a>
              <!-- Add search button - CLOSE -->
              @endauth

              <!-- Languages - OPEN -->
              <li class="nav-item dropdown margin-left">

                <div class="dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ __('main.language') }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('change_lang', ['lang' => 'ca']) }}"> {{ __('main.catalan') }} </a>
                        <a class="dropdown-item" href="{{ route('change_lang', ['lang' => 'es']) }}"> {{ __('main.spanish') }} </a>
                    </div>

                </div>

              </li>
              <!-- Languages - CLOSE -->

            </ul>
            <!-- Left Side Of Navbar - CLOSE -->

            <!-- Right Side Of Navbar - OPEN -->
            <ul class="navbar-nav ml-auto">

                <!-- Not authentication - OPEN -->
                @guest

                    <!-- Login button - OPEN -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                          {{ __('main.login') }}
                        </a>
                    </li>
                    <!-- Login button - CLOSE -->

                    <!-- Register button - OPEN -->
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                              {{ __('main.register') }}
                            </a>
                        </li>
                    @endif
                    <!-- Register button - CLOSE -->

                <!-- Not authentication - CLOSE -->

                @else
                <!-- Authentication - OPEN -->

                    <li class="nav-item dropdown">

                        <!-- User button - OPEN -->
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <!-- User button - CLOSE -->

                        <!-- User dropdown - OPEN -->
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <!-- Close session button - OPEN -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{__('main.logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <!-- Close session button - CLOSE -->

                        </div>
                        <!-- User dropdown - CLOSE -->

                    </li>
                @endguest
                <!-- Authentication - CLOSE -->

            </ul>
            <!-- Right Side Of Navbar - CLOSE -->

        </div>
        <!-- Collapsable content - CLOSE -->

    </div>
</nav>
<!-- Navbar - CLOSE -->
