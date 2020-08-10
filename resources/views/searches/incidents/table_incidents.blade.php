<!-- Own style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.2/css/lightgallery.css" />

<!-- Table header - OPEN -->
<thead>
    <tr>
        <th scope="col"> {{ __('forms.date_time') }} </th>
        <th scope="col"> {{ __('forms.creator') }} </th>
        <th scope="col"> {{ __('forms.description') }} </th>
        <th scope="col"> {{ __('forms.images') }} </th>
        <th scope="col"> {{ __('actions.actions') }} </th>
    </tr>
</thead>
<!-- Table header - CLOSE -->

<!-- Table content - OPEN -->
<tbody>
@foreach ($incidents as $incident)
    <tr>

        <td class="align-middle" style="width:15%">
            @if ($incident->date == NULL)
                --
            @else
                @php
                    $date = new Date($incident->date);
                    echo $date->format('M. d | H:i');
                @endphp
            @endif
        </td>

        <td class="align-middle" style="width:15%">
            <a href="{{ route('view_profile', $incident->user_creation->id) }}">
                {{ $incident->user_creation->name }}
            </a>
        </td>

        <td class="align-middle" style="width:40%">
            @if ($incident->description == NULL)
                --
            @else
                <p class="ellipsis">
                    {{ $incident->description }}
                </p>
            @endif
        </td>

        <td class="align-middle" style="width:20%">
            @if (count($incident->images) > 0)
                <?php foreach ($incident->images as $key => $image): ?>
                    <a <?php if($key!=0) :?>style="display:none"<?php endif; ?>
                    href="/uploads/search_{{$incident->search_id}}/incidents/incident_{{$incident->id}}/{{$image->photo}}" class="fresco"
                    data-fresco-group="{{$incident->id}}">
                        <img src="/uploads/search_{{$incident->search_id}}/incidents/incident_{{$incident->id}}/{{$image->photo}}" class="incident_image cursor">
                    </a>
                <?php endforeach; ?>
            @else
                --
            @endif
        </td>

        <td class="align-middle" style="width:10%">
            <a href="">
                <button type="button" class="btn btn-sm btn-outline-dark btn-margin">
                    <span class="octicon octicon-eye"></span>
                    {{ __('actions.view') }}
                </button>
            </a>

            @if( Auth::user()->is_admin() or (Auth::user()->id == $incident->user_creation->id ) )
                <a href="">
                    <button type="button" class="btn btn-sm btn-outline-dark btn-margin">
                        <span class="octicon octicon-pencil"></span>
                        {{ __('actions.edit') }}
                    </button>
                </a>
                <a href="">
                    <button type="button" class="btn btn-sm btn-outline-danger btn-margin">
                        <span class="octicon octicon-trashcan"></span>
                        {{ __('actions.delete') }}
                    </button>
                </a>
            @endif
        </td>

    </tr>
@endforeach
</tbody>
<!-- Table content - CLOSE -->

<script src="{{ asset('js/fresco.min.js') }}"></script>
<link href="{{ asset('css/fresco.css') }}" rel="stylesheet" type="text/css" />

<!-- JS -->
<script>

    $(document).ready(function() {

    });

</script>
