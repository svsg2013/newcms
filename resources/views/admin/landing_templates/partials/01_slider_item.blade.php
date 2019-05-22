<div class="panel panel-default template-slider-item">
    <div class="panel-heading">
        <a href="" type="button" class="pull-right btn_delete_this" data-parent=".template-slider-item">
            <span class="glyphicon glyphicon-remove"></span>
        </a>
        <h4 class="panel-title">
            {{ $heading }}
        </h4>
    </div>
    <div class="panel-body">
        <div class="font-bold col-green">Image</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $slider['image'] ?? null,
                'name' => "extra_data[{$locale}][sliders][{$name}][{$idx}][image]",
            ])
            @endcomponent
        </div>
        <div class="font-bold col-green">Title</div>
        <div class="form-group form-float">
            <div class="form-line">
                <textarea id="extra_data_{{ $locale }}_slider_{{ $name }}_{{ $idx }}_title" name="extra_data[{{ $locale }}][sliders][{{ $name }}][{{ $idx }}][title]" class="{{ $init_ckeditor ? 'init-ckeditor' : 'temp-ckeditor' }} form-control">{{ $slider['title'] ?? '' }}</textarea>
            </div>
        </div>
        <div class="font-bold col-green">Content</div>
        <div class="form-group form-float">
            <div class="form-line">
                <textarea id="extra_data_{{ $locale }}_slider_{{ $name }}_{{ $idx }}_content" name="extra_data[{{ $locale }}][sliders][{{ $name }}][{{ $idx }}][content]" class="{{ $init_ckeditor ? 'init-ckeditor' : 'temp-ckeditor' }} form-control">{{ $slider['content'] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>