@extends('frontend.layouts.master')

@section('content')
    <section class="about about--awards">
        <div class="subHeader" style="background-image: url('/assets/images/tu-van/document-banner.png')">
            <div class="container">
                <h1>{{ trans('menu.faqs') }}</h1>
            </div>
        </div>
        <div class="container">
            <div class="faqs-page">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about__content faqs-page__content">

                            @include('frontend.layouts.partials.breadcrumb')

                            <h2 class="content__heading">{{ trans('menu.faqs') }}</h2>
                            <br/>
                            <h2 class="content__heading">
                                <i class="icon_question"></i>{{ trans($main_cate->name) }}</h2>

                            <div class="news-highlights news-highlights--faqs">
                                <div class="row">
                                    <div class="faqs__services col-md-6 news-highlights__item">
                                        <div class="faqsList">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12 faqs__services__scroll">
                                                    <div class="faqsBox">
                                                        <div class="faqs__footer">
                                                            <div class="faqs__footer__info" id="services-before" data-simplebar="init">
                                                                <div class="simplebar-track vertical" style="visibility: visible;">
                                                                    <div class="simplebar-scrollbar" style="top: 2px; height: 192px;"></div>
                                                                </div>
                                                                <div class="simplebar-track horizontal" style="visibility: hidden;">
                                                                    <div class="simplebar-scrollbar"></div>
                                                                </div>
                                                                <div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
                                                                    <div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
                                                                        <ul class="">
                                                                            @foreach($main_cate->faqs as $key => $faq)
                                                                            <li class="click-question {{ $key===0 ? 'active' : ''}}" data-value="{{'test'.$key}}">

                                                                                <a href="{{'#innertest'.$key}}" data-value="{{'test'.$key}}">
                                                                                    {{$faq->question}}
                                                                                </a>
                                                                            </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- / col -->
                                            </div>
                                            <!-- / row -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 news-highlights__item text-small">
                                        @foreach($main_cate->faqs as $key => $faq)
                                            <div class="news-highlights__item__text" id="{{'test'.$key}}">
                                                <div id="{{'innertest'.$key}}">
                                                    <p>{!! $faq->answer !!}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="news-highlights news-highlights--faqs-second">
                                <div class="row">
                                    <div class="col-md-12 news-highlights__item">
                                        <div class="panel-group" id="about" role="tablist" aria-multiselectable="true">
                                            <!--start panel -->
                                            @foreach($other_cate as $key => $other)
                                                <div class="panel">
                                                    <div class="panel-heading" role="tab" id="heading-1">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#about" href="{{'#'.$key}}" aria-expanded="false" aria-controls="{{ $key }}"
                                                                class="collapsed">
                                                                <i class="icon_question"></i>{{ $other->name}}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="{{ $key }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-1" aria-expanded="false">
                                                        <div class="panel-body">
                                                            <ul class="">
                                                                @foreach($other->faqs as $faqs)
                                                                    <li class="col-lg-12 sub-tab__text__item">
                                                                       {{ $faqs->question }}
                                                                        <div class="content">
                                                                            <p> {!! $faqs->answer !!}</p>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- / panel -->
                                            @endforeach
                                        </div>
                                        <!-- / panel group -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="consultant">

                            @include('frontend.layouts.partials.message')

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 consultant__content">
                                        <h2 class="content__heading">{{trans('admin_faq_question.FAQ_question')}}</h2>
                                        <form action="{{ route('page.storeFaqquest')}}" method="POST" class="form" data-toggle="validator">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="comp-name">{{ trans('admin_faq_question.name')}}*</label>
                                                        <input type="text" name="name" id="name" placeholder="{{ trans('admin_faq_question.name')}}" class="form-control" value="{{ old('name') }}" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email *</label>
                                                        <input type="email" name="email" id="email" placeholder="example@gmail.com" class="form-control" required value="{{ old('email') }}">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / row -->

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="question">{{ trans('admin_faq_question.question')}}*</label>
                                                        <textarea name="question" id="question" rows="5" placeholder="{{ trans('admin_faq_question.question')}}" class="form-control" value="{{ old('question') }}"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / row -->

                                            <div class="form-group submit text-center">
                                                <div class="captcha">
                                                    {!! app('captcha')->display($attributes = [], $lang = $composer_locale) !!}
                                                    <input type="hidden" name="re_captcha">
                                                </div>
                                                <button class="btn btn-lh" type="submit"> {{ trans('button.send')}}
                                                    <i class="arrow_right"></i>
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- / container -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / container -->

    </section>
@endsection
    