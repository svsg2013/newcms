<input type="hidden" name="meta_data[]" />
<input type="hidden" name="extra_data[]" />
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Banners</h3>
    </div>
    <div class="panel-body">
        <ul id="sortable-photos" class="list-photos">
            @foreach($data->meta_data['banners'] ?? [] as $path)
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
                    <input type="hidden" name="meta_data[banners][]" value="{{ $path }}" />
                </li>
            @endforeach
        </ul>
        <div class="text-center" style="margin-top: 1em">
            <button type="button" class="btn btn-default ckfinder-multi" data-append="#sortable-photos" data-name="meta_data[banners][]">
                Add Banner
            </button>
        </div>
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
                <div class="font-bold col-green">Content</div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea id="extra_data_{{ $locale }}_introduction_content" name="extra_data[{{ $locale }}][introduction][content]" class="init-ckeditor form-control">{{ $introduction['content'] ?? '' }}</textarea>
                    </div>
                </div>
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
            $( "#sortable-photos" ).sortable({
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
                var idx = $('.template-slider-item').length + 1;
                var html = $('#template-slider-temp-wrapper').html();
                html = html.replace(new RegExp('__LOCALE__', 'gim'), cLocale);
                html = html.replace(new RegExp('__INDEX__', 'gim'), idx);
                var $html = $(html).insertBefore($(this).parent());
                $html.addClass('template-slider-item');
                $('textarea', $html).each(function() {
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