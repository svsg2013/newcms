@extends('frontend.layouts.master')

@section('style')

@endsection

@section('content')

@include('themes.partials.breadcrumb')

<div class="modal d-block joinCareerDetail">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="careerDetail__title">{{ $career->name }}</h2>
                <div class="row">
                    <div class="col-md-10">
                        <p><b>Làm việc tại: </b><span class="careerDetail__location">{{ $career->city_name }}</span></p>
                    </div>
                    <div class="col-md-10 text-md-right">
                        <p><span>Hạn nộp hồ sơ: </span><b class="careerDetail__time">{{ $career->expired_date_format }}</b></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-10 col-xl-6">
                        <p><b>Lương: </b><span class="careerDetail__salary">{{ $career->salary }}</span></p>
                    </div>
                    <div class="col-lg-10 col-xl-7">
                        <p><b>Hình thức làm việc: </b><span class="careerDetail__form">{{ $career->working_form }}</span></p>
                    </div>
                    <div class="col-lg-10 col-xl-7 text-xl-right">
                        <p><b>Chức vụ: </b><span class="careerDetail__position">{{ $career->category->name }}</span></p>
                    </div>
                    <div class="col-lg-10 col-xl-6">
                        <p><b>Số lượng cần tuyển: </b><span class="careerDetail__number">{{ $career->quantity }}</span></p>
                    </div>
                    <div class="col-lg-10 col-xl-7">
                        <p><b>Kinh nghiệm yêu cầu: </b><span class="careerDetail__experience">{{ $career->level->name }} </span></p>
                    </div>
                    <div class="col-lg-10 col-xl-7 text-xl-right">
                        <p><b>Thời gian làm việc: </b><span class="careerDetail__position">{{ !empty($career->working_time) ? \App\Models\Career::getWorkingTime($career->working_time) : '' }}</span></p>
                    </div>
                </div>
                <hr>
                <div class="careerDetail__row">
                    <h3 class="careerDetail__row__head">MÔ TẢ CÔNG VIỆC</h3>
                    <div class="careerDetail__row__content careerDetail__desc">
                        {!! $career->description !!}
                    </div>
                </div>
                <div class="careerDetail__row">
                    <h3 class="careerDetail__row__head">YÊU CẦU ỨNG VIÊN</h3>
                    <div class="careerDetail__row__content careerDetail__request">
                        {!! $career->request !!}
                    </div>
                </div>
                <div class="careerDetail__row">
                    <h3 class="careerDetail__row__head">QUYỀN LỢI ĐƯỢC HƯỞNG</h3>
                    <div class="careerDetail__row__content careerDetail__benefit">
                        {!! $career->benefit !!}
                    </div>
                </div>
                <div class="careerDetail__footer"><a class="btn btn-primary btn-sm" href="{{ route('frontend.get_career_detail',[
                                    'page_slug'     => $page_slug,
                                    'career_slug'   => $career_slug
                                ]) }}">Ứng tuyển ngay</a></div>
            </div>
        </div>
    </div>
</div>

@include('themes.partials.register_career')

@endsection

@push('add_script')

@endpush