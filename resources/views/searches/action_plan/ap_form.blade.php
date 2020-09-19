<p class="task">{{$task}}</p>

<form class="hidden form_invest_{{$ap->version}} form_invest" data-searchid="{{$ap->search_id}}" data-ap="{{$ap->version}}" data-taskid="{{$taskid}}">
    @csrf
    <input class="input{{$taskid}} invest margin-top-bottom_sm" >

    <button type="submit" class="btn btn-sm btn-default" style="margin-top: 5px">
        <span class="octicon octicon-check"></span>
    </button>
</form>
