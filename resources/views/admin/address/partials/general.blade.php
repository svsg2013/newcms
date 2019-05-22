<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_address.form.category") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="address_category_id" id="address_category_id" class="form-control">
                    <option value="">---</option>
                    @foreach($categories as $key => $rs)
                        <option value="{{ $rs->id }}" {{ !empty($address) && $address->address_category_id === $rs->id ? 'selected' : '' }}>{{ $rs->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="font-bold col-green">City</div>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="city_id" id="city_id" class="form-control">
                    <option value="">---</option>
                    @foreach($city as $key)
                        <option value="{{ $key->id }}" {{ !empty($address) && $address->city_id == $key->id ? 'selected' : '' }}>{{ $key->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input type="checkbox" id="active" name="active"
                   value="1" {!! !empty($address) && $address->active ? "checked" : null !!}>
            <label for="active">{!! trans("admin_address.form.active") !!}</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group form-float">
            <div class="font-bold col-green">Postal</div>
            <div class="form-line focused">
                <input type="text" id="postal" class="form-control" name="postal" value="{{ $address->postal ?? '' }}">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group form-float">
            <div class="font-bold col-green">Phone</div>
            <div class="form-line focused">
                <input type="text" id="phone" class="form-control" name="phone" value="{{ $address->phone ?? '' }}">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group form-float">
            <div class="font-bold col-green">Fax</div>
            <div class="form-line focused">
                <input type="text" id="fax" class="form-control" name="fax" value="{{ $address->fax ?? '' }}">
            </div>
        </div>
    </div>
</div>

@include('admin.address.partials.location')