<div id="module-items" class="module-items">
    @if(!empty($image360) && $image360->children->count())
        @foreach($image360->children as $children)
            <div class="module-item">
                <button type="button" class="btn btn-danger btn-delete btn_delete_this" data-parent=".module-item" data-name="delete_image360[]" data-value="{{ $children->id }}" data-multi="true">
                    <i class="material-icons">delete</i>
                </button>

                <div class="row">
                    <div class="col-md-3">
                        <p>{!! trans("admin_image360.form.avatar") !!}</p>
                        <div class="form-group">
                            <img src="{{ assetStorage($children->avatar) }}" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" value="{{ $children->hfov }}" disabled class="form-control">
                                <label class="form-label">{!! trans("admin_image360.form.hfov") !!}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" value="{{ $children->pitch }}" disabled class="form-control">
                                <label class="form-label">{!! trans("admin_image360.form.pitch") !!}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" value="{{ $children->yaw }}" disabled class="form-control">
                                <label class="form-label">{!! trans("admin_image360.form.yaw") !!}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="clearfix"></div>
<div class="text-right">
    <button type="button" class="btn btn-info btn_add_module" append="#module-items">
        <i class="material-icons">exposure_plus_1</i>
    </button>
</div>
<div class="clearfix"></div>