<!-- Navbar - OPEN -->
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">

        <!-- Collapsable button - OPEN -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsable button - CLOSE -->

        <!-- Collapsable content - OPEN -->
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">

            <!-- Left Side Of Navbar - OPEN -->
            <ul class="navbar-nav mr-auto">

              <span class="align-middle margin-right">
                {{ __('forms.service')}}:
                <b>
                    <a href="{{ URL::to('recerques/' . $recerca->id) }}"> {{ $recerca->num_actuacio }} </a>
                </b>
              </span>

              @if( $recerca->municipi_upa )
              <span class="align-middle margin-left margin-right">
                {{ __('forms.village')}}: <b> {{ $recerca->municipi_upa }} </b>
              </span>
              @endif

              @if( $recerca->data_inici != NULL )
              <span class="align-middle margin-left margin-right">
                {{ __('forms.begin_day')}}:
                <b>
                  @php
                    $date = new Date($recerca->data_inici);
                    echo $date->format('d F Y');
                  @endphp
                </b>
              </span>
              @endif

              @if( $recerca->data_tancament == NULL && $recerca->data_inici != NULL )
              <span class="align-middle margin-left margin-right">
                {{ __('forms.day') }} :
                <b>
                  <?php
                    $carbon1 = new \Carbon\Carbon( $recerca->data_inici );
                    $carbon2 = new \Carbon\Carbon( now() );
                    $daysDiff=$carbon1->diffInDays($carbon2);

                    print($daysDiff+1);
                  ?>
                </b>
              </span>
              @elseif( $recerca->data_tancament != NULL )
              <span class="align-middle margin-left margin-right">
                {{ __('forms.end_day')}}:
                <b>
                  @php
                    $date = new Date($recerca->data_tancament);
                    echo $date->format('d F Y');
                  @endphp
                </b>
              </span>
              @endif

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

                    <!-- User section - OPEN -->
                    <li class="nav-item dropdown">

                        <!-- User button - OPEN -->
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <!-- User button - CLOSE -->

                        <!-- User dropdown - OPEN -->
                        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">

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
