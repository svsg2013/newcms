<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h2 class="card-inside-title">English</h2>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control noEnterSubmit" placeholder="" name="en[address]" value="{!! !empty($branch) && $branch->hasTranslation("en") ? $branch->translate("en")->address : old("en.address") !!}">
                <label class="form-label">{!! trans("admin_branch.form.address") !!}</label>
            </div>
        </div>

        <h2 class="card-inside-title">Vietnamese</h2>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control noEnterSubmit" placeholder="" id="address" name="vi[address]" value="{!! !empty($branch) && $branch->hasTranslation("vi") ? $branch->translate("vi")->address : old("vi.address") !!}">
                <label class="form-label">{!! trans("admin_branch.form.address") !!}</label>
            </div>
        </div>

        <div class="form-group form-float">
            <div class="form-line focused">
                <input type="text" readonly placeholder="{!! trans("admin_branch.form.latitude") !!}" class="form-control" id="branch_lat" name="lat" value="{!! !empty($branch) ? $branch->lat : old("vi.lat") !!}">
            </div>
        </div>

        <div class="form-group form-float">
            <div class="form-line focused">
                <input type="text" readonly placeholder="{!! trans("admin_branch.form.longitude") !!}" class="form-control" id="branch_lng" name="lng" value="{!! !empty($branch) ? $branch->lng : old("vi.lng") !!}">
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div id="google_map"
             style="min-height: 400px; background: linear-gradient(45deg,#FFE9D0,#FD7153);"></div>
    </div>
</div>