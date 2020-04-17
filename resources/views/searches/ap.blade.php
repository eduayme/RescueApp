<!-- Top buttons - OPEN -->
<div class="row">

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">
    @if (count($action_plans) > 0)
        <!-- Tabs nav - OPEN -->
        <nav class="project-tab">

            <!-- Tabs - OPEN -->
            <div class="nav nav-tabs nav-fill" id="nav-tab-version" role="tablist">
                @foreach ($action_plans as $actionp)
                    <!-- Data tab -OPEN -->
                    <a class="nav-item nav-link @if ($loop->first) active @endif" id="nav-{{$actionp->version}}-tab" data-toggle="tab"
                       href="#nav-{{$actionp->version}}" role="tab" aria-controls="nav-{{$actionp->version}}" aria-selected="true">
                        {{ __('main.version') }} {{ $actionp->version }}
                    </a>
                    <!-- Data tab - CLOSE -->
                @endforeach

            </div>
            <!-- Tabs - CLOSE -->

        </nav>
        <!-- Tabs nav - CLOSE -->

        <!-- Tabs content - OPEN -->
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent-version">
            @foreach ($action_plans as $ap)
                <!-- Data tab content - OPEN -->
                <div class="tab-pane fade show  @if ($loop->first) active @endif margin-top-sm" id="nav-{{$ap->version}}"
                     role="tabpanel" aria-labelledby="nav-{{$ap->version}}-tab">
                    @include('searches.ap_view')
                </div>
                @endforeach
        </div>
        <!-- Tabs content - OPEN -->


    @else
        <div class="col text-right">

            <!-- Add lost person - OPEN -->
            <form action="{{ route('actionplan.create') }}/{{ $search->id }}" method="post" style="display: inline">
                @csrf
                <button type="submit" class="btn btn-outline-primary margin-left margin_top_bottom btn-sm"
                        <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                    <span class="octicon octicon-plus"></span>
                    {{ __('actions.add_version') }}
                </button>
            </form>
        </div>
        <div class="col justify-content-start">
            <h3 class="margin_top_bottom"> {{ __('main.no_action') }}</h3>
        </div>

    @endif

    </div>
    <!-- Content - CLOSE -->
</div>

<!-- JS -->
<script>

    $(document).ready(function() {
        $(".edit").click(function(){
            const version = $(this).data("ap");
            const text = $(" .description" + version).text();
            $(".description" + version).hide();
            $("textarea.input" + version).text(text.trim());
            $(".form" + version).show();
            $(".form_invest_" + version).show();
            $(".form" + version).data("ap", version);
            $(".form_embed_" + version).show();
            $(".form_embed_" + version).find(".embed").val($(".mapembed.version"+version).html().trim());
            $(".mapembed").hide();
            $(".invest.version_" + version + " p").each(function(index){
                let rindex = index+1;
               $(".form_invest_" + version + " input.input" + rindex).val($(this).text());
            });
            $(".invest p").hide();

        });

        $(".descform").submit(function(e) {
            e.preventDefault();
            const version = $(this).data("ap");
            save_all(version, this);
        });

        $(".embedform").submit(function(e){
            e.preventDefault();
            const version = $(this).data("ap");
            save_all(version, this);
        });

        $(".invest form").submit(function(e){
            e.preventDefault();
            const version = $(this).data("ap");
            save_all(version, this);
        });

        function save_all(version, that){
            const text1 = $(".form_invest_" + version).find(".input1").val();
            const text2 = $(".form_invest_" + version).find(".input2").val();
            const text3 = $(".form_invest_" + version).find(".input3").val();
            const text4 = $(".form_invest_" + version).find(".input4").val();
            const text5 = $(".form_invest_" + version).find(".input5").val();
            const text6 = $(".form_invest_" + version).find(".input6").val();
            const mapembed = $(".form_embed_"+version).find("input.embed").val();
            const text =  $("textarea.input" + version).val();
            const taskid = $(that).data("taskid");
            $(".description" + version).text(text);
            const id = $(that).data("searchid");
            const token = $(that).children("input[name='_token']").val();
            $(".invest form").hide();
            const task = "task"+taskid;
            $(".form_invest_" + version + " input.invest").each(function(index){
                $(".invest.version_" + version +  " p:eq("+index +")").text($(this).val());
            });
            $(".mapembed").html(mapembed);
            common_submit(version);
            $.post("{{route('actionplan.update')}}", {
                "version": version,
                "id": id,
                "description":text,
                "task1": text1,
                "task2": text2,
                "task3": text3,
                "task4": text4,
                "task5": text5,
                "task6": text6,
                "mapembed":mapembed,
                "_token": token
            });
        }

        function common_submit(version)
        {
            $(".description" + version).show();
            $(".form_embed_" + version).hide();
            $(".mapembed").show();
            $(".descform").hide();
            $(".invest form").hide();
            $(".invest p").show();
        }
    });

</script>
