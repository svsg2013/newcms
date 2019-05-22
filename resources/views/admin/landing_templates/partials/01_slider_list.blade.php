<div class="panel panel-success template-slider-list" data-name="{{ $name }}">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $heading }}</h3>
    </div>
    <div class="panel-body">
        @include('admin.translation.tab', [
            'tab_id' => "template_slider_{$name}"
        ])
        <div class="tab-content p-t-20">
            @foreach($composer_locales as $locale => $properties)
                @php
                    $extra_data = (array)($data->{"extra_data:{$locale}"} ?? []);
                    $sliders = $extra_data['sliders'][$name] ?? [];
                @endphp
                <div role="tabpanel" class="tab-pane fade {{ $locale === $composer_locale ? 'active in' : null }}" id="template_slider_{{ $name }}_{{ $locale }}">
                    @foreach(array_values($sliders) as $idx => $slider)
                        @include('admin.landing_templates.partials.01_slider_item', [
                            'heading' => 'Slider '. ($idx + 1),
                            'idx' => $idx,
                            'name' => $name,
                            'locale' => $locale,
                            'slider' => $slider,
                            'init_ckeditor' => true
                        ])
                    @endforeach
                </div>
            @endforeach
            <div class="text-center" style="margin-top: 1em">
                <button type="button" class="btn btn-default btn-template-add-slider" data-locale="{{ $locale }}" >
                    Add Slider
                </button>
            </div>
        </div>
    </div>

</div>