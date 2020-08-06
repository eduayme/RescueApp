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

        <td class="align-middle">
            @if ($incident->date == NULL)
                --
            @else
                @php
                    $date = new Date($incident->date);
                    echo $date->format('M. d | H:i');
                @endphp
            @endif
        </td>

        <td class="align-middle">
            <a href="{{ route('view_profile', $incident->user_creation->id) }}">
                {{ $incident->user_creation->name }}
            </a>
        </td>

        <td class="align-middle">
            @if ($incident->description == NULL)
                --
            @else
                <p class="ellipsis">
                    {{ $incident->description }}
                </p>
            @endif
        </td>

        <td class="align-middle">
            @if (count($incident->images) > 0)
                <p> {{count($incident->images)}} </p>
            @else
                --
            @endif
        </td>

        <td class="align-middle">
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
            @endif
        </td>

    </tr>
@endforeach
</tbody>
<!-- Table content - CLOSE -->
