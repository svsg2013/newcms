<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            Block {{ $idx + 1 }}
        </h4>
    </div>
    <div class="panel-body">
        <div class="font-bold col-green">Image</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $introduction['blocks'][$idx]['image'] ?? null,
                'name' => "extra_data[{$locale}][introduction][blocks][{$idx}][image]",
            ])
            @endcomponent
        </div>
        <div class="font-bold col-green">Title</div>
        <div class="form-group form-float">
            <div class="form-line">
                <textarea id="extra_data_{{ $locale }}_introduction_block_{{ $idx }}_title" name="extra_data[{{ $locale }}][introduction][blocks][{{ $idx }}][title]" class="init-ckeditor form-control">{{ $introduction['blocks'][$idx]['title'] ?? '' }}</textarea>
            </div>
        </div>
        <div class="font-bold col-green">Content</div>
        <div class="form-group form-float">
            <div class="form-line">
                <textarea id="extra_data_{{ $locale }}_introduction_block_{{ $idx }}_content" name="extra_data[{{ $locale }}][introduction][blocks][{{ $idx }}][content]" class="init-ckeditor form-control">{{ $introduction['blocks'][$idx]['content'] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>