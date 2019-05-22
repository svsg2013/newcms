<ul class="list-unstyled">
    @if($root)
        <li class="root-tree">
            <input type="radio" class="with-gap radio-col-green" level="-1" id="free_space-0" name="free_space_id"
                   @if (in_array(0, $list_id)) checked @endphp @endif value="0"/>
            <label for="free_space-0">{{  trans("admin_free_space.attr.root") }}</label>
        </li>
    @endif

    @foreach($tree as $rs)
        <li>
            @if($type === 'checkbox')
                <input type="{{ $type }}" class="chk-col-green" level="{{ $rs->level }}" id="free_space-{{ $rs->id }}"
                       name="free_space_id[]"
                       @if(in_array($rs->id, $list_id)) checked @endif
                       @if(in_array($rs->id, $disable_id)) disabled @endif value="{{ $rs->id }}"/>
            @else
                <input type="{{ $type }}" class="chk-col-green" level="{{ $rs->level }}" id="free_space-{{ $rs->id }}"
                       name="free_space_id"
                       @if(in_array($rs->id, $list_id)) checked @endif
                       @if(in_array($rs->id, $disable_id)) disabled @endif value="{{ $rs->id }}"/>
            @endif

            <label for="free_space-{{ $rs->id }}">{{ $rs->name }}</label>

            @if(!empty($rs->trees) && $rs->trees->count())
                @component('admin.free_space.partials.tree', [
                    'tree' => $rs->trees,
                     'type' => $type,
                     'list_id' => $list_id,
                     'disable_id' => $disable_id,
                     'root' => false
                ])@endcomponent
            @endif
        </li>
    @endforeach
</ul>