<div id="block-modules" class="module-items">
    @isset($product)
        @foreach($product->blocks as $rs)
            @php $name  = "old_blocks[{$rs->id}]"; @endphp

            @component('admin.product.partials.component.block', [
                'block' => $rs,
                'name' => $name,
                'type' => $rs->type,
                'image_map' => $image_map
            ])
            @endcomponent

            @continue(1==1)
            <div class="module-item">
                <input type="hidden" id="changeId-{{ str_slug($name, '') }}" name="{{ $name }}[is_change]" value="0">
                <button type="button" class="btn bg-red btn-delete btn_delete_this" data-name="delete_blocks[]"
                        data-value="{{ $rs->id }}" data-parent=".module-item">
                    <i class="glyphicon glyphicon-remove"></i>
                </button>
                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#yeuhoashin{{ $rs->id }}" aria-expanded="false" aria-controls="yeuhoashin{{ $rs->id }}" data-change="#changeId-{{ str_slug($name, '') }}">
                    <i class="glyphicon glyphicon-menu-down"></i>
                </button>

                @switch($rs->type)

                @case('TYPE_IMAGE_MAP')
                <h4 class="m-t-0">{{ trans('admin_product_block.image_map') }} <small>{{ $rs->name }}</small></h4>
                <div class="collapse" id="yeuhoashin{{ $rs->id }}">
                    <div class="row form-horizontal">
                        <label class="col-sm-2 control-label col-green">{{ trans('admin_product_block.select_image_map') }}</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="{{ $name.'[image_map]' }}" >
                                <option value="">---</option>
                                @foreach($image_map as $map)
                                    <option value="{{ $map->id }}" @if($map->id === $rs->image_map_id)  selected @endif>{{ $map->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn bg-cyan  btn-sm waves-effect" href="{{ route('admin.image_map.index') }}" target="_blank">
                                {{ trans('admin_product_block.image_map_manager') }}
                            </a>
                        </div>
                    </div>

                    @component('admin.translation.nav_tab', [
                            'object_trans' => $rs,
                            'default_tab' => $composer_locale,
                            'tab_id' => time()+'_'+$rs->id,
                            'form_fields' => [
                                ['type' => 'text', 'name' => 'name', 'default_name' => $name.'[LOCALE][name]'],
                            ],
                            'translation_file' => 'admin_product_block'
                        ])
                    @endcomponent
                </div>
                @break
                @case('TYPE_CONTENT')
                <h4 class="m-t-0">{{ trans('admin_product_block.content') }} <small>{{ $rs->name }}</small></h4>

                <div class="collapse" id="yeuhoashin{{ $rs->id }}">
                    @component('admin.translation.nav_tab', [
                               'object_trans' => $rs,
                               'default_tab' => $composer_locale,
                               'tab_id' => time()+'_'+$rs->id,
                               'is_ajax_request' => false,
                               'form_fields' => [
                                   ['type' => 'text', 'name' => 'name', 'default_name' =>  $name.'[LOCALE][name]'],
                                   ['type' => 'ckeditor', 'name' => 'content', 'default_name' =>  $name.'[LOCALE][content]'],
                               ],
                               'form_plugins' => ['ckeditor'],
                               'tab_seo' => false,
                               'translation_file' => 'admin_product_block'
                           ])
                    @endcomponent
                </div>

                @break
                @case('TYPE_PHOTO')
                <h4 class="m-t-0">{{ trans('admin_product_block.photo') }} <small>{{ $rs->name }}</small></h4>
                <div class="collapse" id="yeuhoashin{{ $rs->id }}">
                    <div class="row">
                        <div class="col-sm-offset-3 col-md-6">
                            <div class="form-group">
                                @component('admin.layouts.components.upload_photo', [
                                    'image' => $rs->path,
                                    'name' => $name.'[photo]',
                                ])
                                @endcomponent
                            </div>
                        </div>
                    </div>

                    @component('admin.translation.nav_tab', [
                        'object_trans' => $rs,
                        'default_tab' => $composer_locale,
                        'tab_id' => time()+'_'+$rs->id,
                        'form_fields' => [
                            ['type' => 'text', 'name' => 'name', 'default_name' => $name.'[LOCALE][name]'],
                        ],
                        'translation_file' => 'admin_product_block'
                    ])
                    @endcomponent
                </div>
                @break
                @case('TYPE_MULTI_PHOTOS')
                <h4 class="m-t-0">{{ trans('admin_product_block.photos') }} <small>{{ $rs->name }}</small></h4>
                <div class="collapse" id="yeuhoashin{{ $rs->id }}">
                    <ul id="{{ str_slug($name, '') }}" class="list-photos">
                        @foreach($rs->medias as $media)
                            <li data-id="{{ $media->id }}">
                                <div class="box-image">
                                    <img src="{{ $media->path }}">
                                    <button type="button" class="btn_delete_this" data-parent="li" data-multi="1" data-name="delete_photos[]" data-value="{{ $media->id }}">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary ckfinder-multi" data-append="#{{ str_slug($name, '') }}" data-name="{{ $name.'[photos][]' }}">
                            {{ trans('button.add_photos') }}
                        </button>
                    </div>

                    @component('admin.translation.nav_tab', [
                        'object_trans' => $rs,
                        'default_tab' => $composer_locale,
                        'tab_id' => time()+'_'+$rs->id,
                        'form_fields' => [
                            ['type' => 'text', 'name' => 'name', 'default_name' => $name.'[LOCALE][name]'],
                        ],
                        'translation_file' => 'admin_product_block'
                    ])
                    @endcomponent
                </div>
                @break
                @endswitch

            </div>
        @endforeach
    @endisset
</div>

<div class="m-t-20 p-t-15" style="background-color: #eeeeee;">
    <div class="row form-horizontal">
        <label class="col-sm-3 control-label col-green">
            {{ trans('admin_product.select_type') }}
        </label>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="form-line">
                    <select id="block_type" class="form-control">
                        <option value="">---</option>
                        @foreach($block_types as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <button type="button" class="btn btn-lg btn-success waves-effect" id="btn_add_block"
                    data-error="{{ trans('admin_product.select_type_required') }}">
                {{ trans('button.add_block') }}
            </button>
        </div>
    </div>
</div>