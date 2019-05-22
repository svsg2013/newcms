@extends('frontend.layouts.master')

@section('content')
    @php $banner = Slider::$banner; @endphp
    <section class="subHeader" style="background-image: url('{{ !empty($banner) ? $banner['image'] : 'http://fakeimg.pl/1600x600/0c8641/000?text=CAREERS' }}')">
        <div class="container">
            <h1>{{ trans('menu.careers') }}</h1>
        </div>
    </section>
    <section class="about about--document">
        <div class="container">
            <!-- Nav tabs -->
            @include('frontend.career.navbar')
            
            <div class="recruitment__content">
                
                @include('frontend.layouts.partials.breadcrumb')

                <h2 class="content__heading">{{ trans('f_career.investors')}}</h2>
                <div class="recruit__contact recruit__contact-ndt">
                    <h4>{{ trans('f_career.contact_info') }}</h4>
                    <h5>{{ trans('f_career.service_center') }}</h5>
                    <p>
                        <span><strong>Hotline</strong>: 0933922488 </span>
                        <span><strong>Email:</strong> <a href="mailto:vieclam@longhau.com.vn"> vieclam@longhau.com.vn</a></span>
                        <span><strong>Website:</strong><a href="http://www.vieclamlonghau.com"> www.vieclamlonghau.com</a> 
                        </span>
                </div>
                <!--// list-->
                <div class="recruit__list">
                    <div class="row">
                        @forelse($careers as $career)
                            <div class="col-md-6">
                                <div class="recruit__item">
                                    <div class="item_height">
                                        <a href="{{ route('frontend.investors.show',$career->slug) }}">{{ $career->name }}</a>
                                        <span class="recruit__date">{{ $career->published_date_format }}</span>
                                    </div>
                                    <p class="recruit__date__2">
                                        <strong>{{ trans('f_career.expired_date') }}</strong>: {{ $career->expired_date_format }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="alert alert-info">
                                 {{ trans('page.no_data') }}
                            </p>
                        @endforelse
                    </div>
                </div>
                <!--// pagin -->
                <div class="text-center">
                    <a class="btn btn-lh" href="http://www.vieclamlonghau.com/vi-vn/ungvien.aspx" target="_blank"> {{ trans('button.view_more')}} <i class="arrow_right"></i></a>
                </div>
            </div>
            <!-- / recruitment content -->
        </div>
        <!-- / container -->
    </section>
@endsection