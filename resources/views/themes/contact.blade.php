@extends('frontend.layouts.master')

@section('style')
@endsection

@section('content')
    <div id="contact">
        @if(!empty($blocks['CONTACT-US']) && count($blocks['CONTACT-US']))
        <div class="bannerInner bannerInner--contact" style="background-image:url({{$blocks['CONTACT-US'][0]['photo']}});"><img src="{{$blocks['CONTACT-US'][0]['photo']}}" alt="{{$blocks['CONTACT-US'][0]['name']}}">
            <div class="container">
                <div class="bannerInner__inner">
                    <div class="bannerInner__info">
                        <h1>{{$blocks['CONTACT-US'][0]['name']}}</h1>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="mainContact">
            <div class="container">
                <ul class="contactInfo text-center clearfix">
                    <li class="contactInfo_item">
                        <div class="contactInfo_item__wrap"><img src="/assets/images/ic-mail.png" alt=""></div><a href="mailto:{{$system['email']['content']}}">{{$system['email']['content']}}</a>
                    </li>
                    <li class="contactInfo_item">
                        <div class="contactInfo_item__wrap"><img src="/assets/images/ic-phone.png" alt=""></div><a href="tel:{{$system['phone']['content']}}">{{$system['phone']['content']}}</a>
                    </li>
                </ul>
            </div>
            <div class="contactMap d-flex justify-content-center">
                <div class="container">
                    <div class="contactMap_wrap">
                        <div class="contactMap_wrap__background" style="background-image:url(/assets/images/map-contact.png);"><img src="/assets/images/map-contact.png" alt=""></div>
                    </div>
                    <div class="contactMap_wrap contactMap_wrap--width">
                        <h3 >{{trans('contact.find_us')}}</h3>
                        <h5>{{trans('contact.sales_office')}}</h5>
                        <p>{!! $system['address']['content'][$composer_locale] ?? '' !!}</p>
                        <h5>{{trans('contact.show_units_office')}}</h5>
                        <p>{!! $system['address_show_room']['content'][$composer_locale] ?? ''  !!}</p>
                        <p>{{trans('contact.phone')}}: {{$system['phone_bottom']['content']}}</p>
                    </div>
                </div>
            </div>
            <div class="contactForm clearfix">
                <div class="container">
                    <div class="contactForm__wrapper">
                        <div class="contactForm__inner clearfix" id="contactForm">
                            <div class="contactForm_title">
                                <h2>{{trans('contact.enquiry')}}</h2>
                            </div>
                            <div class="contactForm_form">
                                <form action="{{route('page.storeContact')}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label>{{trans('contact.full_name')}}</label>
                                        <input class="form-control" title="{{trans('contact.full_name')}}" name="name" required type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('contact.phone')}}</label>
                                        <input class="form-control" title="{{trans('contact.phone')}}" type="text" required name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" title="Email" required name="email" type="email">
                                    </div>
                                    @if(!empty($blocks['HEAR']) && count($blocks['HEAR']))
                                        <div class="form-group">
                                            <label>{{$blocks['HEAR'][0]['name']}}</label>
                                            <div class="wrap-select">
                                                <select class="form-control selectpicker" title="{{$blocks['HEAR'][0]['name']}}" name="hear">
                                                    @foreach($blocks['HEAR'][0]->children as $index=>$dr)
                                                        <option value="{{$dr->name}}" {{!$index ? 'selected' : ''}}>{{$dr->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if(!empty($blocks['INTERESTED']) && count($blocks['INTERESTED']))
                                        <div class="form-group">
                                            <label>{{trans('contact.project_interested_in')}}</label>
                                            <div class="wrap-select">
                                                <select class="form-control selectpicker" title="{{trans('contact.project_interested_in')}}" name="interested">
                                                    @foreach($blocks['INTERESTED'][0]->children as $index=>$dr)
                                                        <option value="{{$dr->name}}" {{!$index ? 'selected' : ''}}>{{$dr->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label>{{trans('contact.message')}}</label>
                                        <textarea class="form-control" minlength="20" required maxlength="1024" title="{{trans('contact.message')}}" name="content" rows="5"></textarea>
                                    </div>
                                    <button class="btn-send" type="submit">{{trans('button.submit')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection