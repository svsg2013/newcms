<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_team.form.avatar") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $team->avatar ?? null,
                'name' => 'avatar',
            ])
            @endcomponent
        </div>
    </div>
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_team.form.avatar_large") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $team->avatar_large ?? null,
                'name' => 'avatar_large',
            ])
            @endcomponent
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_team.form.join_at") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" class="form-control" name="join_at" value="{{ !empty($team) ? $team->join_at : old('join_at',date('Y')) }}" required>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_team.form.order") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="number" class="form-control" name="order" value="{{ !empty($team) ? $team->order : old('order',0) }}" required min="0">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_team.form.link_twitter") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="link_twitter" value="{{ !empty($team) ? $team->link_twitter : old('link_twitter') }}">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_team.form.link_facebook") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="link_facebook" value="{{ !empty($team) ? $team->link_facebook : old('link_facebook') }}">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_team.form.link_google_plus") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="link_google_plus" value="{{ !empty($team) ? $team->link_google_plus : old('link_google_plus') }}">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_team.form.link_linkin") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control" name="link_linkin" value="{{ !empty($team) ? $team->link_linkin : old('link_linkin') }}">
            </div>
        </div>
    </div>
</div>