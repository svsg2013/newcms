<ul class="list-unstyled sortable-spaces">
    @foreach ($tree as $rs)
    @php
        $linkEdit = route("admin.free_space.edit", $rs->id);
        $linkDelete = route("admin.free_space.destroy", $rs->id);
    @endphp
    <li class="ui-sortable-placeholder list-group-item" data-id="{{ $rs->id }}">
        <div class="tree-name">{{ $rs->name }}</div>
        <div class="buttons-control">
            <a class="btn btn-xs btn-info" href="{{ $linkEdit }}">{{ trans("button.edit") }}</a>
            <button class="btn-delete-record btn btn-xs btn-danger" type="button" data-title="{{ trans('admin_message.alert_delete', ['attr' => $rs->name]) }}" data-url="{{ $linkDelete }}">{{ trans("button.delete") }}</button>
        </div>

        @if(!empty($rs->trees) && $rs->trees->count())
            @component('admin.free_space.partials.sortable', [ 'tree' => $rs->trees ])@endcomponent
        @endif
    </li>
    @endforeach
</ul>