@extends('layouts.app')

@section('title', __('main.searches'))

@section('content')

  <!-- Alerts - OPEN -->

  <!-- Success - OPEN -->
  @if( session('status') )
    <div class="alert alert-success" role="alert">
      <div class="container text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('status') }}
      </div>
    </div>
  <!-- Success - CLOSE -->

  <!-- Error - OPEN -->
  @elseif( session()->get('error') )
    <div class="alert alert-error alert-dismissible fade show" role="alert">
      <div class="container text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session()->get('error') }}
      </div>
    </div>
  @endif
  <!-- Error - CLOSE -->

  <!-- Alerts - CLOSE -->

  <!-- Content - OPEN -->
  <div class="container margin-top">

    <!-- Tabs nav - OPEN -->
    <nav class="project-tab">

      <!-- Tabs - OPEN -->
      <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

        <!-- Searches tab - OPEN -->
        <a class="nav-item nav-link active" id="nav-searches-tab" data-toggle="tab"
        href="#nav-searches" role="tab" aria-controls="nav-searches" aria-selected="true">
          {{ __('main.searches') }}
        </a>
        <!-- Searches tab - CLOSE -->

        <!-- Practices tab - OPEN -->
        <a class="nav-item nav-link" id="nav-practices-tab" data-toggle="tab"
        href="#nav-practices" role="tab" aria-controls="nav-practices" aria-selected="false">
          {{ __('main.practices') }}
        </a>
        <!-- Practices tab - CLOSE -->

      </div>
      <!-- Tabs - CLOSE -->

    </nav>
    <!-- Tabs nav - CLOSE -->

    <!-- Tabs content - OPEN -->
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

      <!-- Searches tab content - OPEN -->
      <div class="tab-pane fade show active margin-top" id="nav-searches"
      role="tabpanel" aria-labelledby="nav-searches-tab">

        <!-- If NO searches - OPEN -->
        @if( count($recerques) == 0 )
              <div class="card text-center">
                <div class="card-body">

                  <h1 class="card-title">
                    {{ __('messages.no_searches') }}
                  </h1>

                  <a href="{{ route('recerques.create') }}" class="btn btn-primary" role="button">
                    {{ __('actions.add') . ' ' . __('main.search') }}
                  </a>

                </div>
              </div>
        <!-- If NO searches - CLOSE -->

        <!-- If exists searches - OPEN -->
        @else

          <!-- Searches table - OPEN -->
          <table class="table dt-responsive nowrap table-hover text-center"
          id="searches" style="width: 100%">

            <!-- Table header - OPEN -->
            <thead>
                <tr>
                    <th scope="col"> {{ __('forms.num_actuacio') }} </th>
                    <th scope="col"> {{ __('forms.estat') }} </th>
                    <th scope="col"> {{ __('forms.begin') }} </th>
                    <th scope="col"> {{ __('forms.end') }} </th>
                    <th scope="col"> {{ __('forms.village') }} </th>
                    <th scope="col"> {{ __('forms.region') }} </th>
                </tr>
            </thead>
            <!-- Table header - CLOSE -->

            <!-- Table content - OPEN -->
            <tbody>
                @foreach( $recerques as $recerca )
                    <tr>

                        <td>
                            <a href="{{ url('recerques/'.$recerca->id) }}">
                               {{ $recerca->num_actuacio }}
                            </a>
                        </td>

                        <td>
                          @if( $recerca->estat == 'Oberta' )
                              <h5>
                                <span class="badge badge-danger">
                                  {{ $recerca->estat }}
                                </span>
                              </h5>

                          @elseif( $recerca->estat == 'Tancada' )
                              <h5>
                                <span class="badge badge-success">
                                  {{ $recerca->estat }}
                                </span>
                              </h5>

                          @endif
                        </td>

                        <td>
                          {{ date('H:i | d-M-Y', strtotime($recerca->data_creacio)) }}
                        </td>

                        <td>
                          {{ date('H:i | d-M-Y', strtotime($recerca->data_tancament)) }}
                        </td>

                        <td>
                          <!-- {{ $recerca->municipi_upa }} -->
                          Municipi
                        </td>

                        <td>
                          @if( $recerca->regio == '01' )
                            <p> Centre </p>
                          @elseif( $recerca->regio == '02' )
                            <p> Girona </p>
                          @elseif( $recerca->regio == '03' )
                            <p> Lleida </p>
                          @elseif( $recerca->regio == '04' )
                            <p> Metropolitana Nord </p>
                          @elseif( $recerca->regio == '05' )
                            <p> Metropolitana Sud </p>
                          @elseif( $recerca->regio == '06' )
                            <p> Tarragona </p>
                          @elseif( $recerca->regio == '07' )
                            <p> Terres Ebre </p>
                          @else
                            <p> Error! </p>
                          @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
            <!-- Table content - CLOSE -->

          </table>
          <!-- Searches table - CLOSE -->

        @endif
        <!-- If exists searches - CLOSE -->

      </div>
      <!-- Searches tab content - CLOSE -->

      <!-- Practices tab content - OPEN -->
      <div class="tab-pane fade margin-top" id="nav-practices"
      role="tabpanel" aria-labelledby="nav-practices-tab">

        <!-- If NO practices - OPEN -->
        @if( count($practiques) == 0 )
              <div class="card text-center">
                <div class="card-body">

                  <h1 class="card-title">
                    {{ __('messages.no_practices') }}
                  </h1>

                  <a href="{{ route('recerques.create') }}" class="btn btn-primary" role="button">
                    {{ __('actions.add') . ' ' . __('main.practice') }}
                  </a>

                </div>
              </div>
        <!-- If NO practices - CLOSE -->

        <!-- If exists practices - OPEN -->
        @else

          <!-- Practices table - OPEN -->
          <table class="table dt-responsive nowrap table-hover text-center"
          id="practiques" style="width: 100%">

            <!-- Table header - OPEN -->
            <thead>
                <tr>
                    <th scope="col"> {{ __('forms.type_service') }} </th>
                    <th scope="col"> {{ __('forms.num_actuacio') }} </th>
                </tr>
            </thead>
            <!-- Table header - CLOSE -->

            <!-- Table content - OPEN -->
            <tbody>
                @foreach( $practiques as $practica )
                    <tr>

                        <td>
                            <a href="{{ url('recerques/'.$recerca->id) }}">
                               {{ $practica->es_practica }}
                            </a>
                        </td>

                        <td>
                          {{ $practica->num_actuacio }}
                        </td>

                    </tr>
                @endforeach
            </tbody>
            <!-- Table content - CLOSE -->

          </table>
          <!-- Searches table - CLOSE -->

        @endif
        <!-- If exists practices - CLOSE -->

      </div>
      <!-- Practices tab content - CLOSE -->

    </div>
    <!-- Tabs content - CLOSE -->

  </div>
  <!-- Content - CLOSE -->

@endsection

<!-- JQuery 3.3.1 -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

<!-- JS -->
<script>

  $(document).ready(function() {

    $.extend( $.fn.dataTable.defaults, {
      "language": {
        "decimal":        "",
        "emptyTable":     "{{ __('tables.emptyTable') }}",
        "info":           "{{ __('tables.info') }}",
        "infoEmpty":      "{{ __('tables.infoEmpty') }}",
        "infoFiltered":   "{{ __('tables.infoFiltered') }}",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "{{ __('tables.lengthMenu') }}",
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

    $('#searches').DataTable();
    $('#practiques').DataTable();

  });

</script>
