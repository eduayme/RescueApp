<!-- Table header - OPEN -->
<thead>
    <tr>
        <th scope="col"> {{ __('group.id') }} </th>
        <th scope="col"> {{ __('group.status') }} </th>
        <th scope="col"> {{ __('group.vehicle') }} </th>
        <th scope="col"> {{ __('group.broadcast') }} </th>
        <th scope="col"> {{ __('group.gps') }} </th>
        <th scope="col"> {{ __('group.people_involved') }} </th>
        <th scope="col"> {{ __('forms.actions') }} </th>
    </tr>
</thead>
<!-- Table header - CLOSE -->

<!-- Table content - OPEN -->
<tbody>
    @foreach ($items as $group)
        <tr>

            <td> {{ $group->id }} </td>
            <td>
                <h5>
                    @if ($group->is_active == 1)
                        <span class="badge badge-danger">
                            {{ __('group.is_active') }}
                        </span>
                    @else
                        <span class="badge badge-success">
                            {{ __('group.is_closed') }}
                        </span>
                    @endif
                </h5>
            </td>
            <td> {{ $group->vehicle }} </td>
            <td> {{ $group->broadcast }} </td>
            <td> {{ $group->gps }} </td>
            <td> {{ $group->people_involved }} </td>
            <td>
                @include('searches.resources.groups.edit_group', ['group_id' => $group->id])
                @include('searches.resources.groups.delete_group', ['group_id' => $group->id])
            </td>

        </tr>
    @endforeach
</tbody>
