<!-- If search closed - OPEN -->
@if( $research->status == "1" )

<div class="card text-center margin-top-sm">
    <div class="card-body">

        <!-- If practice - OPEN -->
        @if( $research->is_a_practice )

            <h1 class="card-title">
                {{ __('messages.closed_practice') }}
            </h1>

            {{ Form::model($research, array('route' => array('researches.update', $research->id), 'method' => 'PUT')) }}
                {{ Form::hidden('id_research', $research->id_research, array('class' => 'form-control')) }}
                {{ Form::submit( __('actions.reopen_practice'), array('class' => 'btn btn-primary margin-left', 'name' => 'openbutton') ) }}
            {{ Form::close() }}

        <!-- If practice - CLOSE -->

        <!-- If search - OPEN -->
        @else

            <h1 class="card-title">
                {{ __('messages.closed_search') }}
            </h1>

            {{ Form::model($research, array('route' => array('researches.update', $research->id), 'method' => 'PUT')) }}
                {{ Form::hidden('id_research', $research->id_research, array('class' => 'form-control')) }}
                {{ Form::submit( __('actions.reopen_search'),
                array('class' => 'btn btn-primary margin-left', 'name' => 'openbutton') ) }}
            {{ Form::close() }}

        @endif
        <!-- If search - CLOSE -->

        <!-- User closed - OPEN -->
        <div class="margin-top text-center">

            <h5 style="display: inline; margin-right: 15px">
                {{ __('actions.closing') }}:
            </h5>

            <h4 style="display: inline">
                <b> {{ $research->user_finalization->name }} </b>
            </h4>

            <h5 style="display: inline">
                <b> ({{ $research->user_finalization->dni }}),
                    @php
                        $date = new Date($research->date_finalization);
                        echo $date->format('H:i | d F Y');
                    @endphp
                </b>
            </h5>

        </div>
        <!-- User closed - CLOSE -->

    </div>
</div>

@include('researches.finalization.data')

<!-- If search closed - CLOSE -->

@else
<!-- If search opened - OPEN -->

@include('researches.finalization.edit')

<!-- If search opened - CLOSE -->
@endif
