<p>{{$task}}</p>
<form class="form_invest_{{$ap->version}} form_invest" data-searchid="{{$ap->search_id}}"  data-ap="{{$ap->version}}"  data-taskid="{{$taskid}}" style="display:none;">
    @csrf
    <input class="input{{$taskid}} invest" >

    <button  type="submit"  class="btn btn-default"><span class="octicon octicon-check"></span></button>
</form>
