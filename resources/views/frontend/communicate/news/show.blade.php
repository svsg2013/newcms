@extends('frontend.layouts.master')

@section('content')
    <section class="about about--awards">
        <div class="subHeader subHeader--detail-page"> <!-- subHeader -->
            <div class="container">
                <h1>{{ $category->name }}</h1>

                @include('frontend.layouts.partials.breadcrumb')
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-page">
                        <div class="row">
                            <div class="col-md-10 detail-page__content">
                                <div class="text">
                                    <div class="title">
                                            <h3>{{ $news->title }}</h3>
                                    </div>

                                    <div class="subtitle">
                                        <span><i class="arrow_carrot-right"></i>{{ $news->publish_at_format }}</span><span>{{ trans('button.share') }}
                                            <?php $link = Request::url(); ?>
                                            
                                            @include('frontend.layouts.partials.social', ['link' => Request::url(), 'title'=>$news->title ])
                                        </span>
                                        </span>
                                    </div>

                                    {!! $news->content !!}
                                </div>
                                <div class="info">
                                    <p class="title">{{ trans('page.communicate_title_contact')}} </p>
                                    <p><span>{{ trans('page.address') }}: </span>{{ System::content('address', null) }}</p>
                                    <p><span>Hotline: </span>{{ System::content('phone_bottom', null) }}</p>
                                    <p><span>Email: </span>{{ System::content('email', null) }}</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- / container -->
    </section>
    <section class="news-other">
        <div class="container">
            <div class="headings text-center">
                <h2><span>{{ trans('news.other') }}</span></h2>
            </div>
            <div class="news-list">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row news-list-content">
                            @foreach($related as $rs)
                                <div class="news-list-content__wrapper col-lg-3 col-sm-4 col-xs-6">
                                    <div class="news-list__item">
                                        <a class="linkTo" href="{{ route('news.show', ['category_slug' => $category->slug, 'slug' => $rs->slug] ) }}"></a>
                                        <div class="image" style="background-image: url('{{ $rs->image }}')">
                                            <div class="overlay"></div>
                                            <img src="{{ $rs->image }}" alt="{{ $rs->title }}">
                                            <span></span>
                                        </div>
                                        <div class="des">
                                            <p class="date">
                                                <i class="arrow_carrot-right"></i>{{ $rs->publish_at_format }}</p>
                                            <p><a href="{{ route('news.show', ['category_slug' => $category->slug, 'slug' => $rs->slug] ) }}">{{ $rs->title }}</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection