{{ Form::hidden('group_count', $search->groups->count()) }}
<!-- If NO group - OPEN --> 
    <div id="no_group"class="card text-center">
        <div class="card-body">

            <img src="/img/add_search.png" width="300">

            <h4 class="card-title margin-bottom text-secondary">
                {{ __('messages.no_groups') }}
            </h4>

            <a href="#addGroupModal" class="btn btn-primary" role="button" data-toggle="modal"
                <?php if (Auth::user()->profile == 'guest') { ?> style="display:none" <?php } ?> >
                {{ __('actions.add') . ' ' . __('group.group') }}
            </a>            
        </div>
    </div>
<!-- If NO group - CLOSE -->

<!-- Content - OPEN -->
<div id="with_group" class="container margin-top padding-bottom">
    <div id="success_message_container" class="alert alert-success alert-dismissible fade show" role="alert" style="display:none">
        <div class="container text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span id="add_success" style="display:none">{{ __('group.group_add_success') }}</span>
            <span id="edit_success" style="display:none">{{ __('group.group_edit_success') }}</span>
            <span id="delete_success" style="display:none">{{ __('group.group_delete_success') }}</span>
        </div>
    </div>
    <div class="row text-center margin-top-bottom">
        <div class="col-sm-2">
            <select class="form-control" id="status-groups-filter">
                <option value=""> {{ __('actions.filter_by_status') }} </option>
                <option value="{{ __('group.status_active_value') }}"> {{ __('group.status_active') }} </option>
                <option value="{{ __('group.status_closed_value') }}"> {{ __('group.status_closed') }} </option>
            </select>
        </div>
        <div class="col-sm-10 text-right">
            <!-- Add group button - OPEN -->
            @if (Auth::user()->profile != 'guest')
            <span data-toggle="modal" href="#addGroupModal">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span class="octicon octicon-plus"></span>
                    {{ __('actions.add') . ' ' . __('group.group') }}
                </button>
            </span>
            @endif            
            <!-- Add group button - CLOSE -->       
        </div>
    </div>   
    
    <div class="row text-center margin-top-bottom">
        <div class="col-sm-12">
            <table class="table dt-responsive nowrap table-hover text-center" id="groups" style="width: 100%">        
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
                <tbody>
                @include('searches.resources.groups.edit_group')
                @include('searches.resources.groups.delete_group')        
                </tbody>                
            </table>
        </div>    
    </div>    
</div>
<!-- Content - CLOSE -->

<!-- Add group modal - OPEN -->
@include('searches.resources.groups.add_group',['search_id' => $search->id])
<!-- Add group modal - CLOSE -->

<!-- JS -->
<script>

    $(document).ready(function() {

        // Groups Data Table
        groupsTable = $( "#groups" ).DataTable({
            "processing": true,
            "serverside": true,
            "ajax": "{!! route('groups.index',['search_id' => $search->id]) !!}",            
            "createdRow": function ( row, data, index ) {
                $(row).attr('id','group-' + data.id);
                $(row).attr('data-group',   data.id + ',' +
                                            data.status + ',' +
                                            data.vehicle + ',' +
                                            data.broadcast + ',' +
                                            data.gps + ',' +
                                            data.people_involved + ',' +
                                            data.vehicle);
            },            
            "columns": [
                    { "data": "id" },
                    { "data": "status" },
                    { "data": "vehicle" },
                    { "data": "broadcast" },
                    { "data": "gps" },
                    { "data": "people_involved"},
                    { "data": "vehicle" },
            ],
            "columnDefs":[
                            {"render": function (data, type, row) {                                
                                if (data == {{ __('group.status_active_value') }}){
                                    return '<span class="badge badge-success">{{ __('group.status_active') }}</span>';
                                }
                                if (data == {{ __('group.status_closed_value') }}){
                                    return '<span class="badge badge-danger">{{ __('group.status_closed') }}</span>';
                                }
                            },"targets": 1},
                            {"orderable": false,
                             "render": function (data, type, row) {                                
                                var edit_button = `@if (Auth::user()->profile != 'guest')
                                                    <span data-toggle="modal" href="#editGroupModal">    
                                                        <button onclick = "setEditValues(`+ row.id +`);" type="button" class="btn btn-sm btn-outline-dark btn-margin"
                                                        data-toggle="tooltip" data-placement="left" title="{{ __('actions.edit') }}">
                                                            <span class="octicon octicon-pencil"></span>                                                        
                                                        </button>
                                                    </span>
                                                    @endif`;
                                var delete_button = `@if (Auth::user()->profile != 'guest')
                                                        <span data-toggle="modal" href="#deleteGroupModal">
                                                        <button onclick = "setDeleteValue(`+ row.id +`);"  type="button" class="btn btn-sm btn-outline-danger btn-margin"
                                                        data-toggle="tooltip" data-placement="left" title="{{ __('actions.delete') }}">
                                                            <span class="octicon octicon-trashcan"></span>
                                                        </button>
                                                    </span>
                                                    @endif`;
                                                            
                                return edit_button + delete_button;
                            },"targets": 6},
                        ],
            "scrollX": true,            
            "pagingType": "full_numbers",
            "responsive": true,            
            "order": [ [ 0, "asc" ]],
            "lengthMenu": [ 5, 10, 15],
            "language": {
                "decimal":        "",
                "emptyTable":     "{{ __('tables.emptyTable') }}",
                "info":           "{{ __('tables.info') }}",
                "infoEmpty":      "{{ __('tables.infoEmpty') }}",
                "infoFiltered":   "{{ __('tables.infoFiltered') }}",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "{{ __('group.lengthMenu') }}",
                "loadingRecords": "{{ __('tables.loadingRecords') }}",
                "processing":     "{{ __('tables.processing') }}",
                "search":         "{{ __('tables.search') }}",
                "zeroRecords":    "{{ __('tables.zeroRecords') }}",
                "paginate": {
                    "first":      "{{ __('tables.first') }}",
                    "last":       "{{ __('tables.last') }}",
                    "next":       "{{ __('tables.next') }}",
                    "previous":   "{{ __('tables.previous') }}",
                },
                "aria": {
                    "sortAscending":  "{{ __('tables.sortAscending') }}",
                    "sortDescending": "{{ __('tables.sortDescending') }}",
                }
            }
        });
    });

    

    // resize tables after tab
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        alert('adjusted');
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

    
</script>
