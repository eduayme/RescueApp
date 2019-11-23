<!-- Table header - OPEN -->
<thead>
    <tr>
        <th scope="col"> {{ __('forms.id_search') }} </th>
        <th scope="col"> {{ __('forms.status') }} </th>
        <th scope="col"> {{ __('forms.begin') }} </th>
        <th scope="col"> {{ __('forms.end') }} </th>
        <th scope="col"> {{ __('forms.region') }} </th>
        <th scope="col"> {{ __('forms.village') }} </th>
        <th scope="col"> {{ __('forms.begin') }} </th>
        <th scope="col"> {{ __('forms.end') }} </th>
    </tr>
</thead>
<!-- Table header - CLOSE -->

<!-- Table content - OPEN -->
<tbody>
@foreach ($items as $search)
    <tr>

        <td>
            <a href="{{ url('searches/' . $search->id) }}">
                {{ $search->id_search }}
            </a>
        </td>

        <td>
            <h5>
                @if ($search->status == 0)
                    <span class="badge badge-danger">
                        {{ __('main.status_open') }}
                    </span>
                @elseif ($search->status == 1)
                    <span class="badge badge-success">
                        {{ __('main.status_closed') }}
                    </span>
                @endif
            </h5>
        </td>

        <td>
            @if ($search->date_start == NULL)
                --
            @else
                @php
                    $date = new Date($search->date_start);
                    echo $date->format('H:i | d M. Y');
                @endphp
            @endif
        </td>

        <td>
            @if ($search->date_finalization == NULL)
                --
            @else
                @php
                    $date = new Date($search->date_finalization);
                    echo $date->format('H:i | d M. Y');
                @endphp
            @endif
        </td>

        <td>
            @if ($search->region == NULL)
                --
            @else
                {{ $search->region }}
            @endif
        </td>

        <td>
            @if ($search->municipality_last_place_seen == NULL)
                --
            @else
                {{ $search->municipality_last_place_seen }}
            @endif
        </td>

        <td>
            @if ($search->date_start != NULL)
                @php
                    $date = new Date($search->date_start);
                    echo $date;
                @endphp
            @endif
        </td>

        <td>
            @if ($search->date_finalization != NULL)
                @php
                    $date = new Date($search->date_finalization);
                    echo $date;
                @endphp
            @endif
        </td>

    </tr>
@endforeach
</tbody>
<!-- Table content - CLOSE -->
