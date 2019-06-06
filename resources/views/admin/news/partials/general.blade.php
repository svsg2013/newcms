<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_news.form.image") !!}</div>
        <div class="form-group">
            @component('admin.layouts.components.upload_photo', [
                'image' => $news->image ?? null,
                'name' => 'image',
            ])
            @endcomponent
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_news.form.category") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="news_category_id" id="news_category_id" class="form-control">
                    <option value="">---</option>
                    @foreach($categories as $key => $rs)
                        <option value="{{ $rs->id }}" {{ !empty($news) && $news->news_category_id === $rs->id ? 'selected' : '' }}>{{ $rs->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="font-bold col-green">{!! trans("admin_news.form.publish_at") !!}</div>
        <div class="form-group form-float">
            <div class="form-line">
                <input type="text" class="form-control datepicker" name="publish_at"
                       data-date-format="{!! JS_DATE !!}" id="publish_at"
                       value="{!! !empty($news)  ? $news->publish_at_format : old("publish_at") !!}">
                <div id="publish_at-container" style="position: relative"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="font-bold col-green">{!! trans("admin_news.form.tag") !!}</div>
        <div class="form-group" style="border: 1px solid #f4f4f4;padding:5px;margin: 2px">
            @foreach($tags as $tag)
                <input type="checkbox" id="tags[{{$tag->id}}]" name="tags[{{$tag->id}}]"
                       value="1">
                <label for="tags[{{$tag->id}}]">{{$tag->name}}</label>
            @endforeach
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <input type="checkbox" id="active" name="active"
                   value="1" {!! !empty($news) && $news->active ? "checked" : null !!}>
            <label for="active">{!! trans("admin_news.form.active") !!}</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <input type="checkbox" id="is_top" name="is_top"
                   value="1" {!! !empty($news) && $news->is_top ? "checked" : null !!}>
            <label for="is_top">{!! trans("admin_news.form.is_top") !!}</label>
        </div>
    </div>
</div>