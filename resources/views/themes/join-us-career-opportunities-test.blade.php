@extends('frontend.layouts.master')

@section('style')

@endsection

@section('content')

    @include('themes.partials.breadcrumb')

    {{--  @if($blocks && $blocks->has('JOB') && $bt = $blocks->get('JOB')->first())
    <section class="joinDesc">
        <div class="container">
            <h2 class="heading">{!! $bt->name !!}</h2>
            <div> {!! $bt->content !!} </div>
        </div>
    </section>
    @endif

    <section class="joinCareerCat">
        <div class="container">
            <div class="row">
                <div class="col-md-6"><a class="joinCareerCat__item" href="{{getPageUrlByCode('JOIN-US-CAREER-OPPORTUNITIES', ['type'=>1] )}}" title="VIỆC LÀM MỚI NHẤT"><span class="joinCareerCat__item__line"></span><span class="joinCareerCat__item__imgwrap"><span class="joinCareerCat__item__img" style="background-image: url(assets/images/career/new-job.jpg)"><img src="assets/images/career/new-job.jpg" alt="VIỆC LÀM&lt;br/&gt; MỚI NHẤT"></span></span><span class="joinCareerCat__item__inner"><span class="joinCareerCat__item__title">VIỆC LÀM<br/> MỚI NHẤT<em>({{$count_new}})</em></span></span></a></div>
                <div class="col-md-6"><a class="joinCareerCat__item" href="{{getPageUrlByCode('JOIN-US-CAREER-OPPORTUNITIES', ['type'=>2] )}}" title="VIỆC LÀM NỔI BẬT"><span class="joinCareerCat__item__line"></span><span class="joinCareerCat__item__imgwrap"><span class="joinCareerCat__item__img" style="background-image: url(assets/images/career/hot-job.jpg)"><img src="assets/images/career/hot-job.jpg" alt="VIỆC LÀM&lt;br/&gt; NỔI BẬT"></span></span><span class="joinCareerCat__item__inner"><span class="joinCareerCat__item__title">VIỆC LÀM<br/> NỔI BẬT<em>({{$count_hot}})</em></span></span></a></div>
                <div class="col-md-6"><a class="joinCareerCat__item" href="{{getPageUrlByCode('JOIN-US-CAREER-OPPORTUNITIES', ['type'=>3] )}}" title="VIỆC LÀM CẤP QUẢN LÝ"><span class="joinCareerCat__item__line"></span><span class="joinCareerCat__item__imgwrap"><span class="joinCareerCat__item__img" style="background-image: url(assets/images/career/management-job.jpg)"><img src="assets/images/career/management-job.jpg" alt="VIỆC LÀM CẤP QUẢN LÝ"></span></span><span class="joinCareerCat__item__inner"><span class="joinCareerCat__item__title">VIỆC LÀM CẤP QUẢN LÝ<em>({{$count_is_manager}})</em></span></span></a></div>
            </div>
        </div>
    </section>  --}}

    <section class="joinSearch">
        <form class="container" action="" method="get">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <input class="form-control" id="job" type="text" name="q" value="{{Request::get('q')}}" placeholder="Nhập từ khóa công việc">
                        <label class="fa fa-search" for="job"></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control select" id="department" name="category_id" title="Chọn chức vụ">
                            <option value="" selected>-- Chọn ban --</option>
                            @foreach(\App\Models\CareerCategory::all() as $item)
                                <option value="{{$item->id}}" {{Request::get('category_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control select" id="level" name="level_id" title="Mức kinh nghiệm">
                            <option value="" selected>-- Mức kinh nghiệm --</option>
                            @foreach(\App\Models\CareerLevel::all() as $item)
                                <option value="{{$item->id}}" {{Request::get('level_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control select" id="location" name="city_id" title="Chọn khu vực làm việc">
                            <option value="" selected>--Khu vực làm việc --</option>
                            @foreach($city as $item)
                                <option value="{{$item->id}}" {{Request::get('city_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button class="btn btn-default btn-block" type="submit">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <section class="joinCareerList">
        <div class="container">
            <div class="joinCareerList__content">
                @foreach($career as $item)
                <div class="joinCareerList__item">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-13 col-xl-14">
                            <h3>
                                <a href="{{ route('frontend.get_career_page_detail',[
                                    'page_slug'     => $page->slug,
                                    'career_slug'   => $item->slug
                                ]) }}">{{$item->name}}</a>
                            </h3>
                            <p><b>Địa điểm làm việc: </b>{{$item->city_name}}
                            </p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-2 text-center">
                            <a class="btn btn-link" href="#careerDetail" 
                                data-toggle="modal" 
                                data-title="{{$item->name}}" 
                                data-location="{{$item->city_name}}" 
                                data-link="{{route('frontend.get_career_detail',['page_slug'=>$page->slug,'career_slug'=>$item->slug] )}}" 
                                data-time="{{$item->expired_date_format}}" 
                                data-salary="{{$item->salary}}" 
                                data-number="{{$item->quantity}}" 
                                data-form="{{$item->working_form}}" 
                                data-experience="{{$item->level->name}}" 
                                data-workingtime="{{!empty($item->working_time) ? \App\Models\Career::getWorkingTime($item->working_time) : ''}}" 
                                data-position="{{$item->category->name}}" 
                                data-desc="{{$item->description}}" 
                                data-request="{{$item->request}}" 
                                data-benefit="{{$item->benefit}}">Xem chi tiết</a>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 text-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('frontend.get_career_detail',[
                                    'page_slug'     => $page->slug,
                                    'career_slug'   => $item->slug
                                ]) }}">Ứng tuyển</a></div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="paginationDot">
                {{$career->appends($_GET)->links()}}
            </div>
        </div>
    </section>
    <div class="modal fade joinCareerDetail" id="careerDetail" tabindex="-1" role="dialog" aria-labelledby="careerDetail" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="modal-body">
                    <h2 class="careerDetail__title">Career Detail</h2>
                    <div class="row">
                        <div class="col-md-10">
                            <p><b>Địa điểm làm việc: </b><span class="careerDetail__location"></span></p>
                        </div>
                        <div class="col-md-10 text-md-right">
                            <p><span>Hạn nộp hồ sơ: </span><b class="careerDetail__time"></b></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-10 col-xl-6">
                            <p><b>Lương: </b><span class="careerDetail__salary"></span></p>
                        </div>
                        <div class="col-lg-10 col-xl-7">
                            <p><b>Hình thức làm việc: </b><span class="careerDetail__form"></span></p>
                        </div>
                        <div class="col-lg-10 col-xl-7 text-xl-right">
                            <p><b>Ban/Bộ Phận: </b><span class="careerDetail__position"></span></p>
                        </div>
                        <div class="col-lg-10 col-xl-6">
                            <p><b>Số lượng cần tuyển: </b><span class="careerDetail__number"></span></p>
                        </div>
                        <div class="col-lg-10 col-xl-7">
                            <p><b>Kinh nghiệm yêu cầu: </b><span class="careerDetail__experience"></span></p>
                        </div>
                        <div class="col-lg-10 col-xl-7 text-xl-right">
                            <p><b>Thời gian làm việc: </b><span class="careerDetail__workingtime"></span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="careerDetail__row">
                        <h3 class="careerDetail__row__head">MÔ TẢ CÔNG VIỆC</h3>
                        <div class="careerDetail__row__content careerDetail__desc"></div>
                    </div>
                    <div class="careerDetail__row">
                        <h3 class="careerDetail__row__head">YÊU CẦU ỨNG VIÊN</h3>
                        <div class="careerDetail__row__content careerDetail__request"></div>
                    </div>
                    <div class="careerDetail__row">
                        <h3 class="careerDetail__row__head">QUYỀN LỢI ĐƯỢC HƯỞNG</h3>
                        <div class="careerDetail__row__content careerDetail__benefit"></div>
                    </div>
                    <div class="careerDetail__footer"><a class="btn btn-primary btn-sm" href="#">Ứng tuyển ngay</a></div>
                </div>
            </div>
        </div>
    </div>

    @include('themes.partials.register_career')
@endsection