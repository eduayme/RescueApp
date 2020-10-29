<!-- Add leader modal - OPEN -->
<div id="addLeaderModal" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">            
            <!-- Form register - OPEN -->
            <form id="addLeaderForm" method="POST">
                @csrf
                {{ Form::hidden('addLeaderRoute', route('leaders.store')) }}                
                {{ Form::hidden('search_id', $search_id) }}                
                <!-- Modal header - OPEN -->
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold ml-3">
                    {{ __('actions.add') . ' ' . __('leader.leader') }}
                    </h5>                    
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <!-- Modal header - CLOSE -->

                <!-- Modal body - OPEN -->
                <div class="modal-body text-left">
                    <div class="col-12">
                        <div class="row margin-top-sm">
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('leader.id') }}:
                                </div>
                                {{ Form::text('leaderCode', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('leader.phone') }}:
                                </div>
                                {{ Form::text('phone', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="row margin-top-sm">
                            <div class="col-12">
                                <div class="text-left">
                                    {{ __('leader.name') }}:
                                </div>
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>                            
                        </div>    
                        <div class="row margin-top-sm">
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('leader.start') }}:
                                </div>
                                {{ Form::text('start', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>   <!-- col-12 - CLOSE -->              
                </div> <!-- Modal body - CLOSE -->
                <div id="error_message_container" class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none">
                    <div class="container text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p id="error_message">Error goes here !</p>
                    </div>
                </div>
                <!-- Modal footer - OPEN -->
                <div class="modal-footer">
                    <a class="btn btn-light" data-dismiss="modal">
                        {{ __('actions.cancel') }}
                    </a>
                    <!-- Register button - OPEN -->
                    <button type="button" class="btn btn-primary" id="btn_add_leader">
                        {{ __('actions.add') }}
                    </button>
                    <!-- Register button - CLOSE -->
                </div>
                <!-- Modal footer - CLOSE -->            
            </form>
            <!-- Form register - CLOSE -->
        </div>
        <!-- Modal content - CLOSE -->     
    </div>
    <!-- Modal dialog - CLOSE -->   
</div>
<!-- Add leader modal - CLOSE -->
<script src="{{ asset('js/functions/leaders.js') }}"></script>