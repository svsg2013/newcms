<div class="clearfix"></div>
<hr>
<div class="row">

    <div class="col-sm-9">
        @if(!empty($link_preview))
            <a target="_blank" href="{!! $link_preview !!}" class="btn btn-info waves-effect">{!! trans("button.preview") !!}</a>
        @endif
        <button type="submit" class="btn btn-primary waves-effect btn_submit">{!! trans("button.save") !!}</button>
        <a href="" class="btn btn-default waves-effect">{!! trans("button.reset") !!}</a>
    </div>
    <div class="col-sm-3 text-right">
        <a href="{!! $cancel !!}" class="btn btn-danger waves-effect">{!! trans("button.cancel") !!}</a>
    </div>
</div>