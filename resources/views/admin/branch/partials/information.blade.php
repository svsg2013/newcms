<div class="row">
    <div class="col-md-4">
        <p>{!! trans("admin_branch.form.image") !!}</p>
        <div class="form-group">
            @include('admin.photo.form', [
                'object_image' => [
                    'append' => 'branch-image',
                    'image' => !empty($branch) ?  assetStorage($branch->image) : null,
                    'image_value' => !empty($branch) ?  $branch->image : null,
                    'name' => 'branch_image',
                    'delete' => 'delete_image'
                ]
            ])
        </div>
    </div>

    <div class="col-md-4">
        <p>{!! trans("admin_branch.form.icon") !!}</p>
        <div class="form-group">
            @include('admin.photo.form', [
                'object_image' => [
                    'append' => 'branch-icon',
                    'image' => !empty($branch) ?  assetStorage($branch->icon) : null,
                    'image_value' => !empty($branch) ?  $branch->icon : null,
                    'name' => 'branch_icon',
                    'delete' => 'delete_icon'
                ]
            ])
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <p>{!! trans("admin_branch.form.city") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select class="form-control" name="city_id" id="city_id" style="width: 100%">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {!! !empty($branch) && $branch->city_id == $city->id ? "selected" : null !!} >{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <p>{!! trans("admin_branch.form.type") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select class="form-control" name="type" id="type">
                    <option value="">---</option>
                    @foreach($types as $key => $value)
                        <option value="{{ $key }}" {!! !empty($branch) && $branch->type == $key  ? "selected" : null !!} >{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <p>{!! trans("admin_branch.form.parent") !!}</p>
        <div class="form-group form-float">
            <div class="form-line">
                <select class="form-control" name="parent_id" id="parent_id" style="width: 100%"></select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="phone"
                       value="{!! !empty($branch) ? $branch->phone : old("phone") !!}">
                <label class="form-label">{!! trans("admin_branch.form.phone") !!}</label>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="fax"
                       value="{!! !empty($branch) ? $branch->fax : old("fax") !!}">
                <label class="form-label">{!! trans("admin_branch.form.fax") !!}</label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="email"
                       value="{!! !empty($branch) ? $branch->email : old("email") !!}">
                <label class="form-label">{!! trans("admin_branch.form.email") !!}</label>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @include("admin.translation.form", [
        "object_trans" => !empty($branch) ? $branch : null,
        "form_fields" => [
            ["type" => "text", "name" => "name"],
            ["type" => "text", "name" => "open_time"],
        ],
        "translation_file" => "admin_branch"
    ])
</div>