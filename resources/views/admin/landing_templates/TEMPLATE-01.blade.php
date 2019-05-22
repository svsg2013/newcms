<input type="hidden" name="meta_data[]" />
<input type="hidden" name="extra_data[]" />
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Banners</h3>
    </div>
    <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">PC</h3>
            </div>
            <div class="panel-body">
                <ul id="banners_pc" class="list-photos">
                    @foreach($data->meta_data['banners']['pc'] ?? [] as $path)
                        <li>
                            <div class="box-image">
                                <img src="{{ $path }}">
                                <button type="button"
                                        class="btn_delete_this"
                                        data-parent="li"
                                        data-multi="1"
                                >
                                    <i class="glyphicon glyphicon-remove"></i>
                                </button>
                            </div>
                            <input type="hidden" name="meta_data[banners][pc][]" value="{{ $path }}" />
                        </li>
                    @endforeach
                </ul>
                <div class="text-center" style="margin-top: 1em">
                    <button type="button" class="btn btn-default ckfinder-multi" data-append="#banners_pc" data-name="meta_data[banners][pc][]">
                        Add Banner
                    </button>
                </div>
            </div>

        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Laptop</h3>
            </div>
            <div class="panel-body">
                <ul id="banners_laptop" class="list-photos">
                    @foreach($data->meta_data['banners']['laptop'] ?? [] as $path)
                        <li>
                            <div class="box-image">
                                <img src="{{ $path }}">
                                <button type="button"
                                        class="btn_delete_this"
                                        data-parent="li"
                                        data-multi="1"
                                >
                                    <i class="glyphicon glyphicon-remove"></i>
                                </button>
                            </div>
                            <input type="hidden" name="meta_data[banners][laptop][]" value="{{ $path }}" />
                        </li>
                    @endforeach
                </ul>
                <div class="text-center" style="margin-top: 1em">
                    <button type="button" class="btn btn-default ckfinder-multi" data-append="#banners_laptop" data-name="meta_data[banners][laptop][]">
                        Add Banner
                    </button>
                </div>
            </div>

        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Tablet</h3>
            </div>
            <div class="panel-body">
                <ul id="banners_tablet" class="list-photos">
                    @foreach($data->meta_data['banners']['tablet'] ?? [] as $path)
                        <li>
                            <div class="box-image">
                                <img src="{{ $path }}">
                                <button type="button"
                                        class="btn_delete_this"
                                        data-parent="li"
                                        data-multi="1"
                                >
                                    <i class="glyphicon glyphicon-remove"></i>
                                </button>
                            </div>
                            <input type="hidden" name="meta_data[banners][tablet][]" value="{{ $path }}" />
                        </li>
                    @endforeach
                </ul>
                <div class="text-center" style="margin-top: 1em">
                    <button type="button" class="btn btn-default ckfinder-multi" data-append="#banners_tablet" data-name="meta_data[banners][tablet][]">
                        Add Banner
                    </button>
                </div>
            </div>

        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Mobile</h3>
            </div>
            <div class="panel-body">
                <ul id="banners_mobile" class="list-photos">
                    @foreach($data->meta_data['banners']['mobile'] ?? [] as $path)
                        <li>
                            <div class="box-image">
                                <img src="{{ $path }}">
                                <button type="button"
                                        class="btn_delete_this"
                                        data-parent="li"
                                        data-multi="1"
                                >
                                    <i class="glyphicon glyphicon-remove"></i>
                                </button>
                            </div>
                            <input type="hidden" name="meta_data[banners][mobile][]" value="{{ $path }}" />
                        </li>
                    @endforeach
                </ul>
                <div class="text-center" style="margin-top: 1em">
                    <button type="button" class="btn btn-default ckfinder-multi" data-append="#banners_mobile" data-name="meta_data[banners][mobile][]">
                        Add Banner
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>
<div id="template-slider-temp-wrapper" style="display: none">
    @include('admin.landing_templates.partials.01_slider_item', [
        'heading' => 'Slider __INDEX__',
        'idx' => '__INDEX__',
        'name' => '__SLIDER_NAME__',
        'locale' => '__LOCALE__',
        'slider' => null,
        'init_ckeditor' => false
    ])
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Sliders</h3>
    </div>
    <div class="panel-body">
        @include('admin.landing_templates.partials.01_slider_list', [
            'heading' => 'PC',
            'name' => 'pc',
        ])
        @include('admin.landing_templates.partials.01_slider_list', [
            'heading' => 'Tablet',
            'name' => 'tablet',
        ])
        @include('admin.landing_templates.partials.01_slider_list', [
            'heading' => 'Mobile',
            'name' => 'mobile',
        ])
    </div>

</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Introduction</h3>
    </div>
    <div class="panel-body">
        @include('admin.translation.tab', [
            'tab_id' => 'template_introduction'
        ])
        <div class="tab-content p-t-20">
            @foreach($composer_locales as $locale => $properties)
                @php
                    $extra_data = (array)($data->{"extra_data:{$locale}"} ?? []);
                    $introduction = $extra_data['introduction'] ?? [];
                @endphp
                <div role="tabpanel" class="tab-pane fade {{ $locale === $composer_locale ? 'active in' : null }}" id="template_introduction_{{ $locale }}">
                    <div class="font-bold col-green">Heading</div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea id="extra_data_{{ $locale }}_introduction_heading" name="extra_data[{{ $locale }}][introduction][heading]" class="init-ckeditor form-control">{{ $introduction['heading'] ?? '' }}</textarea>
                        </div>
                    </div>
                    @include('admin.landing_templates.partials.01_block_item', [
                        'idx' => 0,
                        'locale' => $locale,
                    ])
                    @include('admin.landing_templates.partials.01_block_item', [
                        'idx' => 1,
                        'locale' => $locale,
                    ])
                    @include('admin.landing_templates.partials.01_block_item', [
                        'idx' => 2,
                        'locale' => $locale,
                    ])
                </div>
            @endforeach
        </div>
    </div>

</div>
@push('add_script')
    <script src="/assets/plugins/jquery-ui-sortable/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/plugins/ckeditor/ckeditor.js?v=1.0"></script>
    <script>
        jQuery(function($) {
            $( "#banners_pc" ).sortable({
                placeholder: 'sortable-placeholder',
                forcePlaceholderSize: true,
            }).disableSelection();

            $( "#banners_laptop" ).sortable({
                placeholder: 'sortable-placeholder',
                forcePlaceholderSize: true,
            }).disableSelection();

            $( "#banners_tablet" ).sortable({
                placeholder: 'sortable-placeholder',
                forcePlaceholderSize: true,
            }).disableSelection();

            $( "#banners_mobile" ).sortable({
                placeholder: 'sortable-placeholder',
                forcePlaceholderSize: true,
            }).disableSelection();

            $('.init-ckeditor').each(function() {
                if (this.id) {
                    installCkeditor(this.id);
                }
            });

            $('.btn-template-add-slider').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var cLocale = $(this).attr('data-locale');
                var $parent = $(this).closest('.template-slider-list');
                var idx = $parent.find('.template-slider-item').length + 1;
                var name = $parent.attr('data-name');
                var html = $('#template-slider-temp-wrapper').html();
                html = html.replace(new RegExp('__LOCALE__', 'gim'), cLocale);
                html = html.replace(new RegExp('__INDEX__', 'gim'), idx);
                html = html.replace(new RegExp('__SLIDER_NAME__', 'gim'), name);
                var $html = $(html).insertBefore($(this).parent());
                $html.addClass('template-slider-item');
                $('.temp-ckeditor', $html).each(function() {
                    if (this.id) {
                        installCkeditor(this.id);
                    }
                });
            });
        });
    </script>
@endpush

@push('add_style')
    <link rel="stylesheet" href="/assets/plugins/jquery-ui-sortable/jquery-ui.min.css">
@endpush

