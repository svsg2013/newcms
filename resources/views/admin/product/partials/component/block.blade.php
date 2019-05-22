<div class="module-item">
    <input type="hidden" name="{{ $name }}[type]" value="{{ $type }}">
    <input type="hidden" id="changeId-{{ str_slug($name, '') }}" name="{{ $name }}[is_change]" value="0">

    <button type="button" class="btn bg-red btn-delete btn_delete_this" data-parent=".module-item"
            @if(!empty($block)) data-name="delete_blocks[]" data-value="{{ $block->id }}" @endif>
        <i class="glyphicon glyphicon-remove"></i>
    </button>

    <button class="btn btn-info @if(!empty($block)) collapsed @endif" type="button" data-toggle="collapse" data-target="#yeuhoashin{{ str_slug($name, '') }}"
            aria-expanded="false" aria-controls="yeuhoashin{{ str_slug($name, '') }}"
            data-change="#changeId-{{ str_slug($name, '') }}">
        <i class="glyphicon glyphicon-menu-down"></i>
    </button>
    <h4 class="m-t-0">{{ trans("admin_product_block.attr.{$type}") }}
        @if(!empty($block))
            <small>{{ $block->name }}</small>
        @endif
    </h4>
    <div class="collapse @if(empty($block)) in @endif" id="yeuhoashin{{ str_slug($name, '') }}">
        @if($type === 'TYPE_CONTENT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-float">
                        <div class="font-bold  col-green">{{ trans('admin_product_block.form.position') }}</div>
                        <div class="form-line focused">
                            <input type="number" id="position" class="form-control" name="{{$name}}[position]" value="{{ $block->position ?? 0 }}"
                                   required min="0">
                        </div>
                    </div>
                </div>
            </div>
            @component('admin.translation.nav_tab', [
                    'object_trans' => $block ?? null,
                    'default_tab' => $composer_locale,
                    'tab_id' => 'tab-'.str_slug($name, ''),
                    'is_ajax_request' => !empty($block) ? false : true,
                    'form_fields' => [
                        ['type' => 'text', 'name' => 'name', 'default_name' => $name.'[LOCALE][name]'],
                        ['type' => 'ckeditor', 'name' => 'content', 'default_name' => $name.'[LOCALE][content]']
                    ],
                    'form_plugins' => ['ckeditor'],
                    'tab_seo' => false,
                    'translation_file' => 'admin_product_block'
                ])
            @endcomponent

        @elseif($type === 'TYPE_IMAGE_MAP')
            <div class="row form-horizontal">
                <div class="col-md-4">
                    <div class="font-bold col-green">{{ trans('admin_product_block.select_image_map') }}</div>
                    <select class="form-control" name="{{ $name }}[image_map]">
                        <option value="">---</option>
                        @foreach($image_map as $rs)
                            <option value="{{ $rs->id }}" {{ !empty($block) && $block->image_map_id === $rs->id  ? 'selected' : ''  }}>{{ $rs->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 hidden">
                    <a class="btn bg-cyan  btn-sm waves-effect" href="{{ route('admin.image_map.index') }}"
                       target="_blank">
                        {{ trans('admin_product_block.image_map_manager') }}
                    </a>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-float">
                        <div class="font-bold  col-green">{{ trans('admin_product_block.form.position') }}</div>
                        <div class="form-line focused">
                            <input type="number" id="position" class="form-control" name="{{$name}}[position]" value="{{ $block->position ?? 0 }}"
                                   required min="0">
                        </div>
                    </div>
                </div>
            </div>

            @component('admin.translation.nav_tab', [
                    'object_trans' => $block ?? null,
                    'default_tab' => $composer_locale,
                    'tab_id' => 'tab-'.str_slug($name, ''),
                    'form_fields' => [
                        ['type' => 'text', 'name' => 'name', 'default_name' => $name.'[LOCALE][name]'],
                    ],
                    'translation_file' => 'admin_product_block'
                ])
            @endcomponent

        @elseif($type === 'TYPE_PHOTO')
            <div class="row">
                <div class="col-md-offset-2 col-md-4">
                    <div class="form-group">
                        @component('admin.layouts.components.upload_photo', [
                            'image' => $block->path ?? null,
                            'name' => $name.'[photo]',
                        ])
                        @endcomponent
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-float">
                        <div class="font-bold  col-green">{{ trans('admin_product_block.form.position') }}</div>
                        <div class="form-line focused">
                            <input type="number" id="position" class="form-control" name="{{$name}}[position]" value="{{ $block->position ?? 0 }}"
                                   required min="0">
                        </div>
                    </div>
                </div>
            </div>

            @component('admin.translation.nav_tab', [
                'object_trans' => $block ?? null,
                'default_tab' => $composer_locale,
                'tab_id' => 'tab-'.str_slug($name, ''),
                'form_fields' => [
                    ['type' => 'text', 'name' => 'name', 'default_name' => $name.'[LOCALE][name]'],
                ],
                'translation_file' => 'admin_product_block'
            ])
            @endcomponent

        @elseif($type === 'TYPE_PHOTO_TRANSLATION')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-float">
                        <div class="font-bold  col-green">{{ trans('admin_product_block.form.position') }}</div>
                        <div class="form-line focused">
                            <input type="number" id="position" class="form-control" name="{{$name}}[position]" value="{{ $block->position ?? 0 }}"
                                   required min="0">
                        </div>
                    </div>
                </div>
            </div>

            @component('admin.translation.nav_tab', [
                'object_trans' => $block ?? null,
                'default_tab' => $composer_locale,
                'tab_id' => 'tab-'.str_slug($name, ''),
                'form_fields' => [
                    ['type' => 'text', 'name' => 'name', 'default_name' => $name.'[LOCALE][name]'],
                    ['type' => 'photo_translation', 'name' => 'photo_translation', 'default_name' => $name.'[LOCALE][photo_translation]'],
                ],
                'translation_file' => 'admin_product_block'
            ])
            @endcomponent

        @elseif($type === 'TYPE_MULTI_PHOTOS')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-float">
                        <div class="font-bold  col-green">{{ trans('admin_product_block.form.position') }}</div>
                        <div class="form-line focused">
                            <input type="number" id="position" class="form-control" name="{{$name}}[position]" value="{{ $block->position ?? 0 }}"
                                   required min="0">
                        </div>
                    </div>
                </div>
            </div>

            <ul id="ul-{{ str_slug($name, '') }}" class="list-photos">
                @if(!empty($block))
                    @foreach($block->medias as $media)
                        <li data-id="{{ $media->id }}">
                            <div class="box-image">
                                <img src="{{ $media->path }}">
                                <button type="button" class="btn_delete_this" data-parent="li" data-multi="1"
                                        data-name="delete_photos[]" data-value="{{ $media->id }}">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </button>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
            <div class="text-center">
                <button type="button" class="btn btn-primary ckfinder-multi" data-append="#ul-{{ str_slug($name, '') }}"
                        data-name="{{ $name.'[photos][]' }}">
                    {{ trans('button.add_photos') }}
                </button>
            </div>

            @component('admin.translation.nav_tab', [
                'object_trans' => $block ?? null,
                'default_tab' => $composer_locale,
                'tab_id' => 'tab-'.str_slug($name, ''),
                'form_fields' => [
                    ['type' => 'text', 'name' => 'name', 'default_name' => $name.'[LOCALE][name]'],
                ],
                'translation_file' => 'admin_product_block'
            ])
            @endcomponent
        @endif
    </div>
</div>