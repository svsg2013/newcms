@extends('frontend.layouts.master')

@section('content')
    <section class="subHeader" style="background-image: url('{{ !empty($banner) ? $banner['image'] : 'http://fakeimg.pl/1600x600/0c8641/000?text=E-BROCHURE' }}')">
        <div class="container">
            <h1>{{ !empty($banner) ? $banner['name'] : 'E-BROCHURE' }}</h1>
        </div>
    </section>

    <section class="about about--document">
        <div class="container">
            <div class="about__content brochure__content">

                @include('frontend.layouts.partials.breadcrumb')

                <h2 class="content__heading">{{ trans('menu.e-brochure') }}</h2>
                <!-- list-->
                <div class="brochure__content__list">
                    @foreach($catalogues as $catalogue)
                        <div class="brochure__content__item">
                            <div class="brochure__content__hover">
                                <div class="brochure__content__img">
                                    <a href="{{ route('ebrochure.show', $catalogue->slug) }}" style="background-image:url({{ $catalogue->image }})">
                                        <img src="{{ $catalogue->image }}" alt="{{ $catalogue->name }}">
                                    </a>
                                </div>
                            </div>
                            <h4><a href="{{ route('ebrochure.show', $catalogue->slug) }}">{{ $catalogue->name }}</a></h4>
                            <div class="text-center brochure__link">
                                <a href="{{ route('ebrochure.show', $catalogue->slug) }}"
                                   type="{{ $catalogue->name }}">{{ trans('button.detail') }}</a>
                                <a href="{{ $catalogue->url }}" target="_blank"
                                   title="{{ $catalogue->name }}">{{ trans('button.download') }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{ $catalogues->links() }}
            </div>
        </div>
    </section>
@endsection