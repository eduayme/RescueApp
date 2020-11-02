<!-- Table header - OPEN -->
<thead>
    <tr>
        <th scope="col"> {{ __('leader.id') }} </th>
        <th scope="col"> {{ __('leader.name') }} </th>
        <th scope="col"> {{ __('leader.phone') }} </th>
        <th scope="col"> {{ __('leader.start') }} </th>
        <th scope="col"> {{ __('leader.end') }} </th>
        <th scope="col"> {{ __('forms.actions') }} </th>
    </tr>
</thead>
<!-- Table header - CLOSE -->

<!-- Table content - OPEN -->
<tbody>
    @foreach ($items as $leader)
        <tr>

            <td> {{ $leader->id }} </td>
            <td> {{ $leader->name }} </td>
            <td> {{ $leader->phone }} </td>
            <td>
                @if ($leader->start == NULL)
                    --
                @else
                    @php
                        $date = new Date($leader->start);
                        echo $date->format('d M. Y | H:i');
                    @endphp
                @endif
            </td>
            <td>
                @if ($leader->end == NULL)
                    --
                @else
                    @php
                        $date = new Date($leader->end);
                        echo $date->format('d M. Y | H:i');
                    @endphp
                @endif
            </td>
            <td>
                @include('searches.resources.leaders.buttons.edit_leader', ['leader_id' => $leader->id])
                @include('searches.resources.leaders.buttons.delete_leader', ['leader_id' => $leader->id])
            </td>

        </tr>
    @endforeach
</tbody>
