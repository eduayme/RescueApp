<!-- If search closed - OPEN -->
@if( $recerca->estat == "Tancada" )

    <div class="card text-center margin-top-sm">
      <div class="card-body">

        <!-- If practice - OPEN -->
        @if( $recerca->es_practica )

          <h1 class="card-title">
            {{ __('messages.closed_practice') }}
          </h1>

          {{ Form::model($recerca, array('route' => array('recerques.update', $recerca->id), 'method' => 'PUT')) }}
            {{ Form::hidden('num_actuacio', $recerca->num_actuacio, array('class' => 'form-control')) }}
            {{ Form::submit( __('actions.reopen_practice'),
            array('class' => 'btn btn-primary margin-left', 'name' => 'openbutton') ) }}
          {{ Form::close() }}

        <!-- If practice - CLOSE -->

        <!-- If search - OPEN -->
        @else

          <h1 class="card-title">
            {{ __('messages.closed_search') }}
          </h1>

          {{ Form::model($recerca, array('route' => array('recerques.update', $recerca->id), 'method' => 'PUT')) }}
            {{ Form::hidden('num_actuacio', $recerca->num_actuacio, array('class' => 'form-control')) }}
            {{ Form::submit( __('actions.reopen_search'),
            array('class' => 'btn btn-primary margin-left', 'name' => 'openbutton') ) }}
          {{ Form::close() }}

        @endif
        <!-- If search - CLOSE -->

        <!-- User closed - OPEN -->
        <div class="margin-top text-center">

          <h5 style="display: inline; margin-right: 15px">
            Tancament:
          </h5>

          <h4 style="display: inline">
            <b> {{ $recerca->user_closed->name }} </b>
          </h4>

          <h5 style="display: inline">
            <b> ({{ $recerca->user_closed->dni }}),
              @php
                $date = new Date($recerca->data_tancament);
                echo $date->format('H:i | d F Y');
              @endphp
            </b>
          </h5>

        </div>
        <!-- User closed - CLOSE -->

      </div>
    </div>

    @include('recerques.tancament.data')

<!-- If search closed - CLOSE -->

@else
<!-- If search opened - OPEN -->

  @include('recerques.tancament.edit')

<!-- If search opened - CLOSE -->
@endif
