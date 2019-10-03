@extends('layouts.app_secondary')

@section('title', $search->id_search)

@section('content')

  <!-- Alerts - OPEN -->

  <!-- Success - OPEN -->
  @if( session()->get('success') )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <div class="container text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session()->get('success') }}
      </div>
    </div>
  <!-- Success - CLOSE -->

  <!-- Error - OPEN -->
  @elseif( session()->get('error') )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <div class="container text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session()->get('error') }}
      </div>
    </div>
  @endif
  <!-- Error - CLOSE -->

  <!-- Alerts - CLOSE -->

  <!-- Language for dates - OPEN -->
  @php
    \Date::setLocale(Session::get('locale'));
  @endphp
  <!-- Language for dates - CLOSE -->

  <!-- Content - OPEN -->
  <div class="container margin-top">

    <!-- Tabs nav - OPEN -->
    <nav class="project-tab">

      <!-- Tabs - OPEN -->
      <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

        <!-- Data tab - OPEN -->
        <a class="nav-item nav-link active" id="nav-data-tab" data-toggle="tab"
        href="#nav-data" role="tab" aria-controls="nav-data" aria-selected="true">
          {{ __('main.data') }}
        </a>
        <!-- Data tab - CLOSE -->

        <!-- Closing tab - OPEN -->
        <a class="nav-item nav-link" id="nav-closing-tab" data-toggle="tab"
        href="#nav-closing" role="tab" aria-controls="nav-closing" aria-selected="false">
          {{ __('main.finish') }}
        </a>
        <!-- Closing tab - CLOSE -->

      </div>
      <!-- Tabs - CLOSE -->

    </nav>
    <!-- Tabs nav - CLOSE -->

    <!-- Tabs content - OPEN -->
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

      <!-- Data tab content - OPEN -->
      <div class="tab-pane fade show active margin-top-sm" id="nav-data"
      role="tabpanel" aria-labelledby="nav-data-tab">

        @include('searches.data')

      </div>
      <!-- Data tab content - CLOSE -->

      <!-- Closing tab content - OPEN -->
      <div class="tab-pane fade margin-top-sm" id="nav-closing"
      role="tabpanel" aria-labelledby="nav-closing-tab">

        @include('searches.finalization.view')

      </div>
      <!-- Closing tab content - CLOSE -->

    </div>
    <!-- Tabs content - OPEN -->

  </div>
  <!-- Content - CLOSE -->

@endsection

<!-- JQuery 3.3.1 -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

<!-- JS -->
<script>

    $(document).ready(function() {
      // tabs
      var hash = window.location.hash;
      hash && $('nav a[href="' + hash + '"]').tab('show');

      $('.nav-tabs a').click(function (e) {
        $(this).tab('show');
        var scrollmem = $('body').scrollTop();
        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
      });

    });

</script>
