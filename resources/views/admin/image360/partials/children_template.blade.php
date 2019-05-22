<div id="image360-template" class="hidden">
    <div class="module-item">
        <button type="button" class="btn btn-danger btn-delete btn_delete_this" data-parent=".module-item" data-name="" data-value="" data-multi="true">
            <i class="material-icons">delete</i>
        </button>

        <div class="row">
            <div class="col-md-6">
                <p>{!! trans("admin_image360.form.avatar") !!}</p>
                <div class="form-group">
                    <div class="wrap-input-file">
                        <label>
                            <i class="material-icons">file_upload</i>
                            <input type="file" class="input-file basic_upload_file" name="image360[YEUHOA][image360_avatar]"
                                   accept=".png,.gif,.jpg,.jpeg"
                                   size="40">
                            <span>{!! trans("admin_image360.form.avatar") !!}</span>
                        </label>
                        <div class="upload-file-info"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <p>{!! trans("admin_image360.form.image") !!}</p>
                <div class="form-group">
                    <div class="wrap-input-file">
                        <label>
                            <i class="material-icons">file_upload</i>
                            <input type="file" class="input-file basic_upload_file" name="image360[YEUHOA][image360_image]"
                                   accept=".png,.gif,.jpg,.jpeg"
                                   size="40">
                            <span>{!! trans("admin_image360.form.image") !!}</span>
                        </label>
                        <div class="upload-file-info"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" name="image360[YEUHOA][hfov]" class="form-control">
                        <label class="form-label">{!! trans("admin_image360.form.hfov") !!}</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" name="image360[YEUHOA][pitch]" class="form-control">
                        <label class="form-label">{!! trans("admin_image360.form.pitch") !!}</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" name="image360[YEUHOA][yaw]" class="form-control">
                        <label class="form-label">{!! trans("admin_image360.form.yaw") !!}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function ($) {
        $('.btn_add_module').click(function (e) {
            var _this = $(this);
            var append = _this.attr('append');
            var random = Math.random().toString(36).slice(2);
            var template = $("#image360-template").html();
            $(append).append(template.replace(/YEUHOA/g, random));
            return false;
        });
    });
</script>