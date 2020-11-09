<!-- Table header - OPEN -->
<thead>
    <tr>
        <th scope="col"> {{ __('involved_people.name') }} </th>
        <th scope="col"> {{ __('involved_people.total') }} </th>
        <th scope="col"> {{ __('involved_people.vehicle') }} </th>
        <th scope="col"> {{ __('involved_people.phone') }} </th>
        <th scope="col"> {{ __('involved_people.people') }} </th>
        <th scope="col"> {{ __('forms.actions') }} </th>
    </tr>
</thead>
<!-- Table header - CLOSE -->

<!-- Table content - OPEN -->
<tbody>
    @foreach ($items as $involved_person)
        <tr>

            <td> {{ $involved_person->name }} </td>
            <td> {{ $involved_person->total_people }} </td>
            <td> {{ $involved_person->vehicle }} </td>
            <td> {{ $involved_person->phone_number }} </td>
            <td> {{ $involved_person->people }} </td>
            <td>
                @include('searches.resources.involved_people.buttons.edit_involved_person', ['involved_person_id' => $involved_person->id])
                @include('searches.resources.involved_people.buttons.delete_involved_person', ['involved_person_id' => $involved_person->id])
            </td>

        </tr>
    @endforeach
</tbody>
