<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_partner.form.photo") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $partner->photo ?? null,
                'name' => 'photo',
            ])
            @endcomponent
        </div>
    </div>

    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_partner.form.logo") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $partner->logo ?? null,
                'name' => 'logo',
            ])
            @endcomponent
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_partner.form.country") !!}</div>
        <div class="form-group form-float">
            <select name="country_id" id="country" class="form-control">
                @foreach($country as $country )
                    <option value="{{ $country->id }}" {!! !empty($partner) && $partner->country_id == $country->id ? "selected" : null !!} >{{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_partner.form.business") !!}</div>
        <div class="form-group form-float">
            <select name="business_id" id="business" class="form-control">
                <!-- @foreach($business as $business )
                    <option value="{{ $business->id }}" {!! !empty($partner) && $partner->business_id == $business->id ? "selected" : null !!} >{{ $business->name }}
                    </option>
                @endforeach -->

                @foreach(config('constants.partner') as $key => $business )
                    <option value="$key" {!! !empty($partner) && $partner->business_id == $key ? "selected" : null !!} >{{ $business }}
                    </option>
                @endforeach

            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_partner.form.position") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" class="form-control" name="position" value="{{ !empty($partner) ? $partner->position : '0' }}" required min="0">
            </div>
        </div>
    </div>
</div>