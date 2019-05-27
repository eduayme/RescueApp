<!-- If search closed - OPEN -->
@if( $recerca->estat == "Tancada" )

    <div class="card text-center margin-top-sm">
      <div class="card-body">

        <!-- If practice - OPEN -->
        @if( $recerca->es_practica )

          <h1 class="card-title">
            {{ __('messages.closed_practice') }}
          </h1>

          <a href="{{ route('recerques.reopen', $recerca->id) }}" class="btn btn-primary" role="button">
            {{ __('actions.reopen_practice') }}
          </a>

        <!-- If practice - CLOSE -->

        <!-- If search - OPEN -->
        @else

          <h1 class="card-title">
            {{ __('messages.closed_search') }}
          </h1>

          <a href="{{ route('recerques.reopen', $recerca->id) }}" class="btn btn-primary" role="button">
            {{ __('actions.reopen_search') }}
          </a>

        @endif
        <!-- If search - CLOSE -->

      </div>
    </div>

    @include('recerques.tancament.data')

<!-- If search closed - CLOSE -->

@else
<!-- If search opened - OPEN -->

  @include('recerques.tancament.edit')

<!-- If search opened - CLOSE -->
@endif
