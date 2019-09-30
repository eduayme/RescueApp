<!-- Top buttons - OPEN -->
<div class="row">

    <!-- Align left - OPEN -->
    <div class="col justify-content-start">

        <!-- Add lost person - OPEN -->
        <form action="{{ route('lost-people.create') }}" method="put" style="display: inline">
            @csrf
            <input type="hidden" class="form-control" name="id_search" value={{ $search->id }}>
            <button type="submit" class="btn btn-outline-primary margin-right
            <?php if ($search->status == 1){ ?> disabled" onclick="this.disabled=true <?php   } ?>" >
                {{ __('actions.add_lost_person') }}
            </button>
        </form>
        <!-- Add lost person - CLOSE -->

    </div>
    <!-- Align left - CLOSE -->

    <!-- Align right - OPEN -->
    <div class="col text-right">

        <!-- Edit search button - OPEN -->
        <a href="{{ URL::to('searches/' . $search->id . '/edit') }}"
            role="button" class="btn btn-outline-secondary margin-right
            <?php if ($search->status == 1){ ?> disabled <?php   } ?>"
            data-toggle="tooltip" data-placement="top" title="{{ __('actions.edit') }}">
            <span class="octicon octicon-pencil"></span>
        </a>
        <!-- Edit search button - CLOSE -->

        <!-- Delete search button- OPEN -->
        <span data-toggle="modal" href="#myModal">
            <button class="btn btn-outline-danger margin-left" href="#myModal"
            data-toggle="tooltip" data-placement="top" title="{{ __('actions.delete') }}">
            <span class="octicon octicon-trashcan"></span>
        </button>
    </span>
    <!-- Delete search button- CLOSE -->

    <!-- Delete search modal - OPEN -->
    <form action="{{ route('searches.destroy', $search->id) }}" method="post" style="display: inline">
        @csrf
        @method('DELETE')

        <!-- Modal - OPEN -->
        <div id="myModal" class="modal fade">
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
                    <div class="modal-body text-center">
                        <h4>
                            {{ __('messages.are_you_sure') }}
                        </h4>
                    </div>
                    <!-- Modal body - CLOSE -->

                    <!-- Modal footer - OPEN -->
                    <div class="modal-footer">
                        <a class="btn btn-light" data-dismiss="modal">
                            {{ __('actions.cancel') }}
                        </a>
                        <button type="submit" class="btn btn-danger">
                            {{ __('actions.delete') }}
                        </button>
                    </div>
                    <!-- Modal footer - CLOSE -->

                </div>
                <!-- Modal content - CLOSE -->

            </div>
        </div>
        <!-- Modal - CLOSE -->

    </form>
    <!-- Delete search - CLOSE -->

</div>
<!-- Align right - CLOSE -->

</div>
<!-- Top buttons - CLOSE -->

<!-- Type service title - OPEN -->
<h3 class="margin-top">
    @if( $search->is_a_practice == 0 )
        {{ __('main.search') }}
    @else
        {{ __('main.practice') }}
    @endif
</h3>
<!-- Type service title - CLOSE -->

<!-- Info search - OPEN -->
<div class="row margin-top-sm">

    <!-- First column - OPEN -->
    <div class="col-sm-2">

        <!-- ID search - OPEN -->
        <p>
            {{ __('forms.id_search') }}:
        </p>
        <h5 class="margin-top-sm-min">
            <b> {{ $search->id_search }} </b>
        </h5>
        <!-- ID search - CLOSE -->

        <!-- State search - OPEN -->
        <p class="margin-top-sm">
            {{ __('forms.status') }}:
        </p>
        <h4 class="margin-top-sm-min">
            @if ($search->status == 0)
                <span class="badge badge-danger">
                    {{ __('main.status_open') }}
                </span>
            @elseif ($search->status == 1)
                <span class="badge badge-success">
                    {{ __('main.status_close') }}
                </span>
            @endif
        </h4>
        <!-- State search - CLOSE -->

    </div>
    <!-- First column - OPEN -->

    <!-- Second column - OPEN -->
    <div class="col-sm-5">

        <!-- Creator search - OPEN -->
        <p>
            {{ __('forms.creator') }}:
        </p>
        <div class="margin-top-sm-min">
            <h5 style="display: inline">
                <b>
                    {{ $search->user_creation->name }}
                </b>
            </h5>
            <h6 style="display: inline">
                <b> ({{ $search->user_creation->dni }}),
                    @php
                        $date = new Date($search->date_start);
                        echo $date->format('H:i | d F Y');
                    @endphp
                </b>
            </h6>
        </div>
        <!-- Creator search - CLOSE -->

        <!-- Date begin search - OPEN -->
        <p class="margin-top-sm">
            {{ __('forms.begin') }}:
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->date_start == NULL )
                    --
                @else
                    @php
                        $date = new Date($search->date_start);
                        echo $date->format('H:i | d F Y');
                    @endphp
                @endif
            </b>
        </h5>
        <!-- Date begin search - CLOSE -->

    </div>
    <!-- Second column - OPEN -->

    <!-- Third column - OPEN -->
    <div class="col-sm-5">

        <!-- Last modificator search - OPEN -->
        <p>
            {{ __('forms.last_modification') }}:
        </p>
        <div class="margin-top-sm-min">
            <h5 style="display: inline">
                <b>
                    {{ $search->user_last_modification->name }}
                </b>
            </h5>
            <h6 style="display: inline">
                <b>
                    ({{ $search->user_last_modification->dni }}),
                    @php
                        $date = new Date($search->date_last_modification);
                        echo $date->format('H:i | d F Y');
                    @endphp
                </b>
            </h6>
        </div>
        <!-- Last modificator search - OPEN -->

        <!-- Date begin search - OPEN -->
        <p class="margin-top-sm">
            {{ __('forms.end') }}:
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->date_finalization == NULL )
                    --
                @else
                    @php
                        $date = new Date($search->date_finalization);
                        echo $date->format('H:i | d F Y');
                    @endphp
                @endif
            </b>
        </h5>
        <!-- Date begin search - CLOSE -->

    </div>
    <!-- Third column - OPEN -->

</div>
<!-- Info search - CLOSE -->

<!-- Description container - OPEN -->
<div class="container container-fluid border border-secondary rounded margin_top_bottom margin-top box text-center">
    <div class="row">

        <!-- Description title - OPEN -->
        <div class="col-md-3 abs-center border-right border-secondary pad">
            <h3> <b> {{ __('forms.incident') }} </b> </h3>
        </div>
        <!-- Description title - CLOSE -->

        <!-- Description content - OPEN -->
        <div class="col-md-9 abs-center block pad">

            <div class="row">

                <div class="col-md-12 margin-top-sm-sm">

                    <!-- Incident - OPEN -->
                    @if( $search->description_incident )
                        <p> {{ $search->description_incident }} </p>
                    @endif
                    <!-- Incident - CLOSE -->

                </div>

                <div class="col-md-4 margin-top-sm-sm">

                    <!-- Village UPA - OPEN -->
                    @if( $search->municipality_last_place_seen )
                        <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.village_last_place_seen') }}">
                            <span class="octicon octicon-location"></span>
                            {{ $search->municipality_last_place_seen }}
                        </p>
                    @endif
                    <!-- Village UPA - CLOSE -->

                </div>

                <div class="col-md-8 margin-top-sm-sm">

                    <!-- Incident zone - OPEN -->
                    @if( $search->zone_incident )
                        <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.incident_zone') }}">
                            <span class="octicon octicon-stop"></span>
                            {{ $search->zone_incident }}
                        </p>
                    @endif
                    <!-- Incident zone - CLOSE -->

                </div>

                <div class="col-md-4 margin-top-sm-sm">

                    <!-- Date UPA - OPEN -->
                    @if( $search->date_last_place_seen )
                        <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.date_last_place_seen') }}">
                            <span class="octicon octicon-clock"></span>
                            @php
                                $date = new Date($search->date_last_place_seen);
                                echo $date->format('H:i | d F Y');
                            @endphp
                        </p>
                    @endif
                    <!-- Date UPA - CLOSE -->

                </div>

                <div class="col-md-8 margin-top-sm-sm">

                    <!-- Possible route - OPEN -->
                    @if( $search->potential_route )
                        <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.possible_route') }}">
                            <span class="octicon octicon-info"></span>
                            {{ $search->potential_route }}
                        </p>
                    @endif
                    <!-- Possible route - CLOSE -->

                </div>

            </div>

        </div>
        <!-- Description content - CLOSE -->

    </div>
</div>
<!-- Description container - CLOSE -->

<!-- Lost people container - OPEN -->
<div class="container border border-secondary rounded margin_top_bottom margin-top-sm box text-center">
    <div class="row">

        <!-- Description title - OPEN -->
        <div class="col-md-3 abs-center border-right border-secondary pad">
            <h3>
                <b>
                    {{ __('forms.lost_people') }}
                    @if( $search->number_lost_people )
                        ({{ $search->number_lost_people }})
                    @endif
                </b>
            </h3>
        </div>
        <!-- Description title - CLOSE -->

        <!-- Description content - OPEN -->
        <div class="col-md-9 abs-center pad margin-auto">

            <div class="row">

                @foreach( $search->lost_people->sortBy('found') as $lost_person )

                    <div class="col-md-6 margin-top-sm margin-bottom-sm">

                        <a class="margin-right-sm" href="{{ URL::to('lost-people/' . $lost_person->id) }}">

                            <!-- User photo - OPEN -->
                            <div class="row justify-content-md-center image-upload justify-content-center">
                                <img src="/uploads/lost_people_photos/{{ $lost_person->photo }}" class="photo-sm d-block rounded">
                            </div>
                            <!-- User photo - CLOSE -->

                            <h5 style="display: inline">
                                <b> {{ $lost_person->name }} </b>
                            </h5>
                        </a>

                        @if( $lost_person->found == 0 )
                            <h5 style="display: inline"><span class="badge badge-danger">
                                {{ __('main.lost') }}
                            </span></h5>
                        @elseif( $lost_person->found == 1 )
                            <h5 style="display: inline"><span class="badge badge-success">
                                {{ __('main.found') }}
                            </span></h5>
                        @endif

                    </div>

                @endforeach
            </div>

        </div>
        <!-- Description content - CLOSE -->

    </div>
</div>
<!-- Lost people container - CLOSE -->

<!-- State container - OPEN -->
@if( $search->physical_condition_lost_people )
<div class="container border border-secondary rounded margin_top_bottom margin-top-sm box text-center">
    <div class="row">

        <!-- Description title - OPEN -->
        <div class="col-md-3 abs-center border-right border-secondary pad">
            <h3> <b> {{ __('forms.status') }} </b> </h3>
        </div>
        <!-- Description title - CLOSE -->

        <!-- Description content - OPEN -->
        <div class="col-md-9 abs-center pad margin-auto">
            {{ $search->physical_condition_lost_people }}
        </div>
        <!-- Description content - CLOSE -->

    </div>
</div>
@endif
<!-- State container - CLOSE -->

<!-- Equipment and experience container - OPEN -->
@if( $search->knowledge_of_the_zone !== NULL || $search->experience_with_activity !== NULL ||
$search->bring_water !== NULL || $search->bring_food !== NULL ||
$search->bring_medication !== NULL || $search->bring_flashlight !== NULL ||
$search->bring_cold_clothes !== NULL || $search->porta_impermeable !== NULL )
    <div class="container border border-secondary rounded margin_top_bottom margin-top-sm box text-center">
        <div class="row">

            <!-- Description title - OPEN -->
            <div class="col-md-3 abs-center border-right border-secondary pad">
                <h3> <b> {{ __('forms.equipment_and_experience') }} </b> </h3>
            </div>
            <!-- Description title - CLOSE -->

            <!-- Description content - OPEN -->
            <div class="col-md-9 pad margin-auto">

                <div class="row">

                    <!-- Knows the zone - OPEN -->
                    @if( $search->knowledge_of_the_zone !== NULL )
                        <div class="col-md-3 margin-top-sm-sm">
                            @if( $search->knowledge_of_the_zone == 1 )
                                <p> {{ __('forms.knows_the_zone') }} </p>
                            @else
                                <p> {{ __('forms.not_knows_the_zone') }} </p>
                            @endif
                        </div>
                    @endif
                    <!-- Knows the zone - CLOSE -->

                    <!-- Experience with the activity - OPEN -->
                    @if( $search->experience_with_activity !== NULL )
                        <div class="col-md-3 margin-top-sm-sm">
                            @if( $search->experience_with_activity == 1 )
                                <p> {{ __('forms.experience_with_activity') }} </p>
                            @else
                                <p> {{ __('forms.not_experience_with_activity') }} </p>
                            @endif
                        </div>
                    @endif
                    <!-- Experience with the activity - CLOSE -->

                    <!-- Brings water - OPEN -->
                    @if( $search->bring_water !== NULL )
                        <div class="col-md-3 margin-top-sm-sm">
                            @if( $search->bring_water == 1 )
                                <p> {{ __('forms.bring_water') }} </p>
                            @else
                                <p> {{ __('forms.not_bring_water') }} </p>
                            @endif
                        </div>
                    @endif
                    <!-- Brings water - CLOSE -->

                    <!-- Brings food - OPEN -->
                    @if( $search->bring_food !== NULL )
                        <div class="col-md-3 margin-top-sm-sm">
                            @if( $search->bring_food == 1 )
                                <p> {{ __('forms.bring_food') }} </p>
                            @else
                                <p> {{ __('forms.not_bring_food') }} </p>
                            @endif
                        </div>
                    @endif
                    <!-- Brings food - CLOSE -->

                    <!-- Brings medication - OPEN -->
                    @if( $search->bring_medication !== NULL )
                        <div class="col-md-3 margin-top-sm-sm">
                            @if( $search->bring_medication == 1 )
                                <p> {{ __('forms.bring_medication') }} </p>
                            @else
                                <p> {{ __('forms.not_bring_medication') }} </p>
                            @endif
                        </div>
                    @endif
                    <!-- Brings medication - CLOSE -->

                    <!-- Brings light - OPEN -->
                    @if( $search->bring_flashlight !== NULL )
                        <div class="col-md-3 margin-top-sm-sm">
                            @if( $search->bring_flashlight == 1 )
                                <p> {{ __('forms.bring_light') }} </p>
                            @else
                                <p> {{ __('forms.not_bring_light') }} </p>
                            @endif
                        </div>
                    @endif
                    <!-- Brings light - CLOSE -->

                    <!-- Brings cold clothes - OPEN -->
                    @if( $search->bring_cold_clothes !== NULL )
                        <div class="col-md-3 margin-top-sm-sm">
                            @if( $search->bring_cold_clothes == 1 )
                                <p> {{ __('forms.bring_cold_clothes') }} </p>
                            @else
                                <p> {{ __('forms.not_bring_cold_clothes') }} </p>
                            @endif
                        </div>
                    @endif
                    <!-- Brings cold clothes - CLOSE -->

                    <!-- Brings waterproof clothes - OPEN -->
                    @if( $search->bring_waterproof_clothes !== NULL )
                        <div class="col-md-3 margin-top-sm-sm">
                            @if( $search->bring_waterproof_clothes == 1 )
                                <p> {{ __('forms.bring_waterproof_clothes') }} </p>
                            @else
                                <p> {{ __('forms.not_bring_waterproof_clothes') }} </p>
                            @endif
                        </div>
                    @endif
                    <!-- Brings waterproof clothes - CLOSE -->

                </div>

            </div>
            <!-- Description content - CLOSE -->

        </div>
    </div>
@endif
<!-- Equipment and experience container - CLOSE -->

<!-- Contact person container - OPEN -->
@if( $search->name_persona_contacte || $search->phone_number_contact_person || $search->affinity_contact_person )
    <div class="container border border-secondary rounded margin_top_bottom margin-top-sm box text-center">
        <div class="row">

            <!-- Description title - OPEN -->
            <div class="col-md-3 abs-center border-right border-secondary pad">
                <h3> <b> {{ __('forms.contact_person') }} </b> </h3>
            </div>
            <!-- Description title - CLOSE -->

            <!-- Description content - OPEN -->
            <div class="col-md-9 pad margin-auto">

                <div class="row">

                    <!-- Name - OPEN -->
                    @if( $search->name_persona_contacte )
                        <div class="col-md-4 margin-top-sm-sm">
                            <p data-toggle="tooltip" data-placement="top" title="{{ __('register.name') }}">
                                {{ $search->name_persona_contacte }}
                            </p>
                        </div>
                    @endif
                    <!-- Name - CLOSE -->

                    <!-- Phone number - OPEN -->
                    @if( $search->phone_number_contact_person )
                        <div class="col-md-4 margin-top-sm-sm">
                            <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.phone') }}">
                                <span class="octicon octicon-device-mobile"></span>
                                {{ $search->phone_number_contact_person }}
                            </p>
                        </div>
                    @endif
                    <!-- Phone number - CLOSE -->

                    <!-- Affinity - OPEN -->
                    @if( $search->affinity_contact_person )
                        <div class="col-md-4 margin-top-sm-sm">
                            <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.affinity') }}">
                                <span class="octicon octicon-organization"></span>
                                {{ $search->affinity_contact_person }}
                            </p>
                        </div>
                    @endif
                    <!-- Affinity - CLOSE -->

                </div>

            </div>
            <!-- Description content - CLOSE -->

        </div>
    </div>
@endif
<!-- Contact person container - CLOSE -->

<!-- Alertant person container - OPEN -->
@if( $search->is_lost_person || $search->is_contact_person || $search->name_alertant ||
$search->age_person_alerts || $search->phone_number_alertant || $search->address_person_alerts )
    <div class="container border border-secondary rounded margin_top_bottom margin-top-sm box text-center">
        <div class="row">

            <!-- Description title - OPEN -->
            <div class="col-md-3 abs-center border-right border-secondary pad">
                <h3> <b> {{ __('forms.alertant') }} </b> </h3>
            </div>
            <!-- Description title - CLOSE -->

            <!-- Description content - OPEN -->
            <div class="col-md-9 pad margin-auto">

                <div class="row">

                    <!-- Name - OPEN -->
                    @if( $search->name_alertant )
                        <div class="col-md-4 margin-top-sm-sm">
                            <p data-toggle="tooltip" data-placement="top" title="{{ __('register.name') }}">
                                {{ $search->name_alertant }}
                            </p>
                        </div>
                    @endif
                    <!-- Name - CLOSE -->

                    <!-- Is the lost person - OPEN -->
                    @if( $search->is_lost_person !== NULL )
                        <div class="col-md-3 margin-top-sm-sm">
                            @if( $search->is_lost_person == 1 )
                                <p> {{ __('forms.is_the_lost_person') }} </p>
                            @else
                                <p> {{ __('forms.not_is_the_lost_person') }} </p>
                            @endif
                        </div>
                    @endif
                    <!-- Is the lost person - CLOSE -->

                    <!-- Is the contact person - OPEN -->
                    @if( $search->is_contact_person !== NULL )
                        <div class="col-md-3 margin-top-sm-sm">
                            @if( $search->is_contact_person == 1 )
                                <p> {{ __('forms.is_the_contact_person') }} </p>
                            @else
                                <p> {{ __('forms.not_is_the_contact_person') }} </p>
                            @endif
                        </div>
                    @endif
                    <!-- Is the contact person - CLOSE -->

                    <!-- Age - OPEN -->
                    @if( $search->age_person_alerts )
                        <div class="col-md-4 margin-top-sm-sm">
                            <p data-toggle="tooltip" data-placement="top" title="{{ __('register.age') }}">
                                {{ $search->age_person_alerts }}
                            </p>
                        </div>
                    @endif
                    <!-- Age - CLOSE -->

                    <!-- Phone number - OPEN -->
                    @if( $search->phone_number_alertant )
                        <div class="col-md-4 margin-top-sm-sm">
                            <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.phone') }}">
                                <span class="octicon octicon-device-mobile"></span>
                                {{ $search->phone_number_alertant }}
                            </p>
                        </div>
                    @endif
                    <!-- Phone number - CLOSE -->

                    <!-- Address - OPEN -->
                    @if( $search->address )
                        <div class="col-md-4 margin-top-sm-sm">
                            <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.address') }}">
                                {{ $search->address }}
                            </p>
                        </div>
                    @endif
                    <!-- Address - CLOSE -->

                </div>

            </div>
            <!-- Description content - CLOSE -->

        </div>
    </div>
@endif
<!-- Alertant person container - CLOSE -->
