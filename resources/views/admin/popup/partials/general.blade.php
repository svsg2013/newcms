{{--  <div class="row">
    <div class="col-sm-4">
        <div class="form-group form-float">
            <div class="font-bold col-green">Code</div>
            <div class="form-line focused">
                <input type="text" id="code" class="form-control" name="code" value="{{ $popup->code ?? '' }}">
            </div>
        </div>
    </div>
</div>  --}}

<div class="row">
    <div class="col-sm-4">
        <div class="form-group form-float">
            <div class="font-bold col-green">Start</div>
            <div class="form-line focused">
                <input type="text" id="start" class="form-control datetimepicker" name="start" value="{{ $popup->start ?? '' }}">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group form-float">
            <div class="font-bold col-green">End</div>
            <div class="form-line focused">
                <input type="text" id="end" class="form-control datetimepicker" name="end" value="{{ $popup->end ?? '' }}">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <input type="checkbox" id="active" name="active"
                   value="1" {!! !empty($popup) && $popup->active ? "checked" : null !!}>
            <label for="active">Active</label>
        </div>
    </div>
</div>