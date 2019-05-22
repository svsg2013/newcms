@if($slider_news->count())
<div class="homeNews homeNews--1">
    <div class="newsSlide newsSlide--news-page">
        <div class="newsPageSlide__inner">
            @foreach($slider_news as $news)
                <article class="newsSlide__item newsSlide__item--news-page">
                    <figure class="clearfix">
                        <div class="image" >
                            <a href="{{ route('news.show', ['category_slug' => $news->category->slug, 'slug' => $news->slug] ) }}" style="background-image: url('{{ getThumbnail($news->image, 480, 270) }}');">
                            <img src="{{ $news->image }}" alt="{{ $news->title }}"></a>
                        </div>
                        <div class="text">
                            <span class="date">{{ $news->category->name }}<i class="arrow_carrot-right"></i>{{ $news->publish_at_format }}</span>
                            <h3><a href="{{ route('news.show', ['category_slug' => $news->category->slug, 'slug' => $news->slug] ) }}">{{ $news->title }}</a></h3>
                            <p>{{  cutString($news->description, 200) }}</p>
                            <a href="{{ route('news.show', ['category_slug' => $news->category->slug, 'slug' => $news->slug] ) }}">{{ trans('button.view_more') }}<i class="arrow_carrot-2right"></i></a>
                        </div> 
                    </figure>
                </article>
            @endforeach
        </div>
    </div>
</div>
@endif
