
<div class="mail-variables" style="margin-bottom: 5px">
    <i class="fa fa-info-circle"></i> <span>You can use any of these predefined variables in your template</span>
    @foreach($mailVariables as $v)
        <span class="badge bg-secondary" title="{{ $v->variable_value }}">{{$v->variable_key}}</span>
    @endforeach
</div>