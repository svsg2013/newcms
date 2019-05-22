@extends('frontend.layouts.master')

@section('style')
    <style>
        .error{ color: #a94442; }
    </style>
@endsection
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
            @include('frontend.career.sub_navbar')

            <div class="recruitment__content">
                
                @include('frontend.layouts.partials.message')

                @include('frontend.layouts.partials.breadcrumb')

                <!--//info-->
                <div class="recruit__detail">
                    <h2 class="recruit__heading">{{ $careers->name }}</h2>
                    <div class="wrap__date">
                        <div class="row">
                            <div class="col-xs-6 break480">
                                <span class="recruit__date">{{ $careers->published_date_format }}</span>
                            </div>
                            <div class="col-xs-6 text-right break480">
                                <span class="recruit__date__2">
                                    <strong>{{ trans('f_career.expired_date') }}</strong>: {{ $careers->expired_date_format }}</span>
                            </div>
                        </div>
                    </div>
                    <!--// info content-->
                    <div class="recruit__info">
                        {!! $careers->content !!}
                    </div>
                </div>
                <!--// form result if accept apply is show button else hide-->
            </div>
        </div>
        <!-- / recruitment content -->
        </div>
        <!-- / container -->
    </section>
    <!--section slider-->
    <section class="recruitment__position">
        <div class="container">
            <div class="headings text-center">
                <h2>
                    <span>{{ trans('f_career.other')}}</span>
                </h2>
            </div>
            <!-- slider-->
            <div class="recruitment__position__inner">
                <div class="recruitment__position_slide">
                    @foreach($related as $relate)
	                    <div class="recruitment__position_slide__item">
	                        <div class="recruit__item">
	                            <div class="item_height">
	                                <a href="{{ route('frontend.investors.show',$relate->slug) }}">{{ $relate->name }}</a>
	                                <span class="recruit__date"> {{ $relate->published_date_format }} </span>
	                            </div>
	                            <p class="recruit__date__2">
	                                <strong>{{ trans('f_career.expired_date')}} </strong>: {{ $relate->expired_date_format }} </p>
	                        </div>
	                    </div>
	                @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    @if($composer_locale !== 'en')
        <script type="text/javascript" src="/assets/plugins/jquery-validation/localization/messages_{{ $composer_locale }}.js"></script>
    @endif
    <script>
        $(document).ready(function () {

            $("form[name='form_validate']").validate({
                ignore: "",
                rules: {
                    position: {required: true},
                    name: {required: true, minlength:2},
                    email: {required: true, email:true},
                    attach_file: {required: true},
                    phone: {required: true, minlength:8, maxlength:15, digits: true},
                    content: {required: true, minlength:2}
                }
            });
        });
    </script>
@endsection



