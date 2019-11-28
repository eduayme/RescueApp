<!-- If search closed - OPEN -->
@if( $search->status == "1" )

<div class="card text-center margin-top-sm">
    <div class="card-body">

        <!-- If practice - OPEN -->
        @if( $search->is_a_practice )

            <h1 class="card-title">
                {{ __('messages.closed_practice') }}
            </h1>

            {{ Form::model($search, array('route' => array('searches.update', $search->id), 'method' => 'PUT')) }}
                {{ Form::hidden('id_search', $search->id_search, array('class' => 'form-control')) }}
                {{ Form::submit( __('actions.reopen_practice'), array('class' => 'btn btn-primary margin-left', 'name' => 'openbutton') ) }}
            {{ Form::close() }}

        <!-- If practice - CLOSE -->

        <!-- If search - OPEN -->
        @else

            <h1 class="card-title">
                {{ __('messages.closed_search') }}
            </h1>

            {{ Form::model($search, array('route' => array('searches.update', $search->id), 'method' => 'PUT')) }}
                {{ Form::hidden('id_search', $search->id_search, array('class' => 'form-control')) }}
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
                <b> {{ $search->user_finalization->name }} </b>
            </h4>

            <h5 style="display: inline">
                <b> ({{ $search->user_finalization->dni }}),
                    @php
                        $date = new Date($search->date_finalization);
                        echo $date->format('H:i | d M. Y');
                    @endphp
                </b>
            </h5>

        </div>
        <!-- User closed - CLOSE -->

    </div>
</div>

@include('searches.finalization.data')

<!-- If search closed - CLOSE -->

@else
<!-- If search opened - OPEN -->

    @if( Auth::user()->profile == 'guest')
        @include('searches.finalization.data')
    @else
        @include('searches.finalization.edit')
    @endif

<!-- If search opened - CLOSE -->
@endif
