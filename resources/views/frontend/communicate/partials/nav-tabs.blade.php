<ul class="nav nav-tabs" role="tablist">
    @foreach( $news_categories as $key => $category)
        <li class="{{ Request::url() === route('news.category', $category['slug']) ? 'active' :'' }} ">
            <a href="{{ route('news.category', $category->slug) }}" title="{{ $category->name }}">{{ $category->name }}</a>
        </li>
    @endforeach
    <li class="{{ Request::url() === route('news_lhc.index') ? 'active' :'' }} ">
        <a href="{{ route('news_lhc.index') }}" title="{{ trans('menu.news_lhc')}}">
            {{ trans('menu.news_lhc')}}
        </a>
    </li>
    <li class="{{ Request::url() === route('library_photo.index') ? 'active' :'' }} ">
    	<a href="{{ route('library_photo.index') }}" title="{{ trans('menu.library_photo')}}">
    		{{ trans('menu.library_photo')}}
    	</a>
    </li>

    <li class="{{ Request::url() === route('video_clip.index') ? 'active' :'' }} ">
    	<a href="{{ route('video_clip.index') }}" title="{{ trans('menu.video_clip')}}">
    		{{ trans('menu.video_clip')}}
    	</a>
    </li>
</ul>