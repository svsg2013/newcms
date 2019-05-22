<div class="row">
    <div class="col-md-6">
        <p>{!! trans("admin_image360.form.avatar") !!}</p>
        <div class="form-group">
            @include('admin.photo.form', [
                'object_image' => [
                    'append' => 'image360-avatar',
                    'image' => !empty($image360->avatar) ?  assetStorage($image360->avatar) : null,
                    'image_value' => !empty($image360->avatar) ?  $image360->avatar : null,
                    'name' => 'image360_avatar',
                    'delete' => 'delete_avatar'
                ]
            ])
        </div>
    </div>

    <div class="col-md-6">
        <p>{!! trans("admin_image360.form.image") !!}</p>

        <div class="form-group">
            @include('admin.photo.form', [
               'object_image' => [
                   'append' => 'image360-image',
                   'image' => !empty($image360->image) ?  assetStorage($image360->image) : null,
                   'image_value' => !empty($image360->image) ?  $image360->image : null,
                   'name' => 'image360_image',
                   'delete' => 'delete_image'
               ]
           ])
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" name="hfov" class="form-control" value="{{ !empty($image360) ? $image360->hfov : old('hfov') }}">
                <label class="form-label">{!! trans("admin_image360.form.hfov") !!}</label>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" name="pitch" class="form-control" value="{{ !empty($image360) ? $image360->pitch : old('yaw') }}">
                <label class="form-label">{!! trans("admin_image360.form.pitch") !!}</label>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" name="yaw" class="form-control" value="{{ !empty($image360) ? $image360->yaw : old('yaw') }}">
                <label class="form-label">{!! trans("admin_image360.form.yaw") !!}</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @include("admin.translation.form", [
        "object_trans" => !empty($image360) ? $image360 : null,
        "form_fields" => [
            ["type" => "text", "name" => "name"]
        ],
        "translation_file" => "admin_image360"
    ])
</div>