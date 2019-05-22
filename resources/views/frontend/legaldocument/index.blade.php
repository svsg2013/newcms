@extends('frontend.layouts.master')

@section('content')
    <section class="about about--awards">
        @php $banner = Slider::$banner; @endphp
            <div class="subHeader" style="background-image: url('{{ !empty($banner) ? $banner['image'] : 'http://fakeimg.pl/1600x600/0c8641/000?text=REGULATIONS' }}')">
                <div class="container">
                    <h1>{{ trans('menu.legal-documents') }}</h1>
                </div>
            </div>
        <div class="container">
            <div class="document-page">
                <div class="row">
                    <div class="col-md-12">
                        
                        @include('frontend.legaldocument.partials.navbar')

                        <div class="about__content document-page__content">

                            @include('frontend.layouts.partials.breadcrumb')

                            <div class="text">
                                <h2 class="content__heading">{{ trans('menu.legal-documents') }}</h2>
                            </div>
                            <div class="document-page__content__highlight">
                                <div class="row">
                                    <div class="col-md-9 item">
                                    	@foreach($legaldocuments as $key => $rs)
		                                        <div class="item__image" style="background-image: url('{{ $rs->image }}'); background-repeat: no-repeat;">
		                                            <img src="{{ $rs->image }}" alt="{{ $rs->title }}">
		                                        </div>
		                                        <div class="item__des">
		                                            <p class="date">
		                                                <i class="arrow_carrot-right"></i>{{ $rs->publish_at_format }}</p>
		                                            <p><a href="{{ route('legaldocuments.show', $rs->slug ) }}">{{ $rs->title }}</a></p>
		                                        </div>
		                                    @break($key === 0)
		                                @endforeach
                                    </div>
                                    <div class="col-md-3 item">
                                        <div class="row">
                                        	@foreach($legaldocuments as $key => $rs)
                                        		@continue($key === 0 || $key > 2)
	                                            <div class="col-lg-12 news-list__item">
	                                                <div class="image" style="background-image: url('{{ $rs->image }}')">
	                                                    <div class="overlay"></div>
	                                                    <img src="{{ $rs->image }}" alt="{{ $rs->title }}">
	                                                    <span></span>
	                                                </div>
	                                                <div class="item__des">
	                                                    <p class="date">
	                                                        <i class="arrow_carrot-right"></i>{{ $rs->publish_at_format }}</p>
	                                                    <p><a href="{{ route('legaldocuments.show', $rs->slug ) }}">{{ $rs->title }}</a></p>
	                                                </div>
	                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- danh sach  -->
                            <div class="news-highlights news-highlights--document">
                                <div class="row">
	                                    <div class="col-md-6 news-highlights__item">
	                                        <ul>
                                            @foreach($list as $key => $rs)
                                                @if(count($list)/2 > $key )
                                               
	                                            <li class="{{ $key === 0 ? 'active' : '' }}" data-value="{{ $key + 1 }}">
	                                                <a href="{{ route('legaldocuments.show', $rs->slug ) }}">{{ $rs->title }}
	                                                <span class="date">
	                                                    <i class="arrow_carrot-right"></i>{{ $rs->publish_at_format }}</span></a>
	                                            </li>
                                                @endif
                                            @endforeach
	                                        </ul>
	                                    </div>
                                        <div class="col-md-6 news-highlights__item">
                                            <ul>
                                            @foreach($list as $key => $rs)
                                                @if(count($list)/2 <= $key )
                                                <li class="{{ $key === 0 ? 'active' : '' }}" data-value="{{ $key + 1 }}">
                                                    <a href="{{ route('legaldocuments.show', $rs->slug ) }}">{{ $rs->title }}
                                                    <span class="date">
                                                        <i class="arrow_carrot-right"></i>{{ $rs->publish_at_format }}</span></a>
                                                </li>
                                                @endif
                                            @endforeach
                                            </ul>
                                        </div>
                                   	
                                </div>
                            </div>

                            {{ $list->links('vendor.pagination.long-hau') }}

                        </div>
                    </div>
                </div>             
            </div>
        </div>
        <!-- / container -->
    </section>
@endsection