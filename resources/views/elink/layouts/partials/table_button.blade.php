@if(!empty($btn_view_datatable) || !empty($link_show))
    <a class="btn btn-success btn-detail" {!! !empty($link_show) ? "href='{$link_show}'" : '' !!}>{!! trans('button.view') !!}</a>
@endif

@if(!empty($link_edit))
    <a class="btn btn-info" href="{!! $link_edit !!}"
       title="{!!  trans("button.edit") !!}">{!! trans("button.edit") !!}</a>
@endif

@if(!empty($link_delete) && !empty($id_delete))
    <a class="btn btn-danger btn-delete-record"
       data-title="{!! trans("admin_message.alert_delete", ["attr"=> $id_delete]) !!}"
       data-url="{!! $link_delete !!}"
       title="{!! trans("button.delete") !!}">{!! trans("button.delete") !!}</a>
@endif