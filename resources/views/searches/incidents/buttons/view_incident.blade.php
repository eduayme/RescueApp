<!-- View incident button - OPEN -->
<span data-toggle="modal" href="#viewIncidentModal-{{ $incident->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark btn-margin">
        <span class="octicon octicon-eye"></span>
    </button>
</span>
<!-- View incident button - CLOSE -->
<!-- View incident modal - OPEN -->
<div id="viewIncidentModal-{{ $incident->id }}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Modal header - OPEN -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div>
            <!-- Modal header - CLOSE -->

            <!-- Modal body - OPEN -->
            <div class="modal-body">

                <!-- Content - OPEN -->
                <div class="container padding-bottom">

                    <!-- Incident ID - OPEN -->
                    <h3 class="text-center">
                        {{ __('main.incident') }} {{ $incident->id }}
                    </h3>
                    <!-- Incident ID - CLOSE -->

                    <!-- Basic info incident - OPEN -->
                    <div class="container">
                        <div class="row justify-content-md-center text-center">

                            <!-- Creator incident - OPEN -->
                            <div class="col-md-6 margin-top-bottom">
                                <p>
                                    {{ __('forms.creator') }}:
                                </p>
                                <div class="margin-top-sm-min">
                                    <h5 style="display: inline">
                                        <b>
                                            <a href="{{ route('view_profile', $incident->user_creation->id) }}">{{ $incident->user_creation->name }}</a>,
                                        </b>
                                    </h5>
                                    <h6 style="display: inline">
                                        <b>
                                            @php
                                                $date = new Date($incident->created_at);
                                                echo $date->format('d M. Y | H:i');
                                            @endphp
                                        </b>
                                    </h6>
                                </div>
                            </div>
                            <!-- Creator incident - CLOSE -->

                            @if( Auth::user()->is_admin() )
                                <!-- Modify incident - OPEN -->
                                <div class="col-md-6 margin-top-bottom">
                                    <p>
                                        {{ __('forms.last_modification') }}:
                                    </p>
                                    <div class="margin-top-sm-min">
                                        <h5 style="display: inline">
                                            <b>
                                                <a href="{{ route('view_profile', $incident->user_modification->id) }}">{{ $incident->user_modification->name }}</a>,
                                            </b>
                                        </h5>
                                        <h6 style="display: inline">
                                            <b>
                                                @php
                                                    $date = new Date($incident->updated_at);
                                                    echo $date->format('d M. Y | H:i');
                                                @endphp
                                            </b>
                                        </h6>
                                    </div>
                                </div>
                                <!-- Modify incident - CLOSE -->
                            @endif

                            <div class="col-md-6 margin-top-bottom">
                                <div>
                                    {{ __('forms.date_time') }}:
                                </div>
                                <h5>
                                    @if ($incident->date == NULL)
                                        --
                                    @else
                                        @php
                                            $date = new Date($incident->date);
                                            echo $date->format('d M. Y | H:i');
                                        @endphp
                                    @endif
                                </h5>
                            </div>
                            <div class="col-md-12 margin-top-bottom">
                                <div>
                                    {{ __('forms.description') }}:
                                </div>
                                <h5>
                                    @if ($incident->description == NULL)
                                        --
                                    @else
                                        <p class="line-breaks"> {{ $incident->description }} </p>
                                    @endif
                                </h5>
                            </div>
                            <div class="col-md-12 margin-top-bottom">
                                @if (count($incident->images) > 0)
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12 margin-top-bottom-sm">
                                            {{ __('forms.images') }}:
                                        </div>

                                        <?php foreach ($incident->images as $key => $image): ?>
                                            <div class="col-md-4">
                                                <a href="/uploads/search_{{$incident->search_id}}/incidents/incident_{{$incident->id}}/{{$image->photo}}" class="fresco"
                                                data-fresco-group="modal-{{$incident->id}}">
                                                    <img src="/uploads/search_{{$incident->search_id}}/incidents/incident_{{$incident->id}}/{{$image->photo}}" class="incident_image cursor">
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Basic info incident - CLOSE -->

                </div>
                <!-- Content - CLOSE -->

            </div>
            <!-- Modal body - CLOSE -->

        </div>
    </div>
</div>
<!-- View incident modal - OPEN -->
