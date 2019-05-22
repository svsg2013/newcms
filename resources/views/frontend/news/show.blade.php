@extends('frontend.layouts.master')

@section('content')

<section class="breadcrumbs breadcrumbs--blue" style="background-image: url('/assets/images/banner-new-tips.jpg')" data-paroller-factor="0.4"
    data-paroller-factor-xs="0.2" data-paroller-factor-sm="0.3">
    <div class="container text-center">
        <h1>TIN TỨC</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/" title="Trang chủ">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tin Tức</li>
            </ol>
        </nav>
    </div>
</section>
<section class="joinCulture">
    <div class="container">
        <div class="joinCultureNews">
            <div class="joinCultureNews__title joinCultureWhyContent__title">
                <h3>{{ $data->title }}</h3>
                <span class="text-photo"> {{ rebuild_date('l d F Y', Carbon\Carbon::createFromFormat('Y-m-d', $data->publish_at)->timestamp) }}</span>
                
                {!! $data->content !!}
            </div>
        </div>
    </div>
</section>

@endsection