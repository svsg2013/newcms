@extends('frontend.layouts.master')

@section('content')
    <section class="coming">
        <div class="coming__inner">
            <div class="coming__content">
                <h1>{{ trans('coming.title') }}</h1>
                <h2>{{ trans('coming.description') }}</h2>
                <ul>
                    <li><i class="icon_pin"></i><b>{{ trans('coming.address') }}:</b> {{ System::content('address', '#') }}</li>
                    <li><i class="icon_mobile"></i><b>{{ trans('coming.hotline') }}:</b> 0906 938 599</li>
                    <li><i class="icon_phone"></i><b>{{ trans('coming.phone') }}:</b> ({{ System::content('phone', '#') }}</li>
                    <li><i class="icon_printer-alt"></i><b>{{ trans('coming.fax') }}:</b> {{ System::content('fax', '#') }}</li>
                    <li><i class="icon_profile"></i><b>{{ trans('coming.sales') }}:</b> (028) 3937 5599</li>
                    <li><i class="icon_mail"></i><b>{{ trans('coming.email') }}:</b> {{ System::content('email', '#') }}</li>
                </ul>
            </div>
        </div>
    </section>
@endsection