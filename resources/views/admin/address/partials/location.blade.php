<div class="row">
    <div class="col-xs-12 col-sm-6">
        <div class="font-bold col-green">Address</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control noEnterSubmit" placeholder="" id="address" name="address" value="{!! !empty($address) ? $address->address : old("address") !!}">
            </div>
        </div>

        <div class="form-group form-float">
            <div class="form-line focused">
                <input type="text" readonly placeholder="lat" class="form-control" id="lat" name="lat" value="{!! !empty($address) ? $address->lat : old("lat") !!}">
            </div>
        </div>

        <div class="form-group form-float">
            <div class="form-line focused">
                <input type="text" readonly placeholder="lng" class="form-control" id="lng" name="lng" value="{!! !empty($address) ? $address->lng : old("lng") !!}">
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <div id="google_map"
             style="min-height: 400px; background: linear-gradient(45deg,#FFE9D0,#FD7153);"></div>
    </div>
</div>
