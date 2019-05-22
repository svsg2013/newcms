@extends('frontend.layouts.master')

@section('content')
    @php $banner = Slider::$banner; @endphp
    <section class="subHeader subHeader--news-page" style="background-image: url('{{ !empty($banner) ? $banner['image'] : 'http://fakeimg.pl/1600x600/0c8641/000?text=COMMUNICATION' }}')">
        <div class="container">
            <h1>{{ trans('menu.media') }}</h1>

            @include('frontend.layouts.partials.breadcrumb')
        </div>

        @include('frontend.communicate.partials.slider')
    </section>

    <section class="about about--awards">
        <div class="container">

            @include('frontend.communicate.partials.nav-tabs')

            <div class="news-list-lhc">
                <div class="row">
                    <div class="col-md-12">
                        <div class="news-list-lhc__content news-list-lhc__content--detail">
                            @forelse($catalogues as $catalogue)
                                <div class="news-list-lhc__content__item">
                                    <a class="linkTo linkTo--lhc" href="{{ route('news_lhc.show', $catalogue->slug) }}" title="{{ $catalogue->name }}"></a>
                                    <div class="image" style="background-image: url('{{ $catalogue->image }}')" >
                                        <a href="{{ route('news_lhc.show', $catalogue->slug) }}"><img src="{{ $catalogue->name }}" alt="{{ $catalogue->name }}"></a>
                                    </div>
                                    <div class="des">
                                        <p>{{ $catalogue->name }}</p>
                                        <p>
                                            <a href="{{ route('news_lhc.show', $catalogue->slug) }}"
                                               type="{{ $catalogue->name }}">{{ trans('button.detail') }}</a>
                                            <a href="{{ $catalogue->url }}" target="_blank"
                                               title="{{ $catalogue->name }}">{{ trans('button.download') }}</a>
                                        </p>
                                    </div>
                                </div>
                            @empty
                                 <p class="alert alert-info">
                                     {{ trans('page.no_data') }}
                                 </p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            {{ $catalogues->links('vendor.pagination.long-hau') }}
        </div>

    </section>
@endsection