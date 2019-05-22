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

	        <h2 class="content__heading">{{ trans('f_career.careersLHC') }}</h2>
	        <div class="recruit__contact">
	            <h4>{{ trans('f_career.contact_info') }}</h4>
	            <h5>{{ trans('f_career.contact_room') }}</h5>
	            <p>
	                <span> <strong>Tel:</strong> 028.3781 8929 ext 264</span>
	                <span> <strong>Mobile:</strong> 0979.24.24.75</span>
	                <span> <strong>Email:</strong>
	                    <a href="mailto:trinh.nth@longhau.com.vn"> trinh.nth@longhau.com.vn</a>
	                </span>
	                <div class="recruit__form ">
	                    <form action="" class="form" data-toggle="validator">  
	                        <div class="form-group table">
	                            <div class="form-input">
	                                <div class="form-cell">
	                                    <input type="text" name="k" class="form-control" placeholder="{{trans('f_career.search__key')}}" value="{{ !empty($array_search['k']) ? $array_search['k'] : null }}"/>
	                                </div>
	                                <div class="form-cell">
	                                    <select class="form-control" name="c">
	                                        <option value="">{{ trans('f_career.category') }}</option>
	                                        @foreach($career_category as $cate)
												<option value="{{ $cate->id }}" {{ !empty($array_search['c']) && $array_search['c'] == $cate->id ? 'selected' : '' }}>{{ $cate->name }}</option>
	                                        @endforeach
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="form-cell-button">
	                                <input type="submit" class="btn-search btn">
	                            </div>
	                        </div>
	                    </form>
	                </div>
	        </div>
	        <!--// list-->
	        @if($careers->count())
		        <div class="recruit__list">
		            <div class="row">
		                @foreach($careers as $career)
			                <div class="col-md-6">
			                    <div class="recruit__item">
			                        <div class="item_height">
			                            <a href="{{ route('frontend.career_lhc.show',$career->slug) }}">{{ $career->name }}</a>
			                            <span class="recruit__date"> {{ $career->published_date_format }}</span>
			                        </div>
			                        <p class="recruit__date__2">
			                            <strong>{{ trans('f_career.expired_date') }}</strong>: {{ $career->expired_date_format }}</p>
			                    </div>
			                </div>
			            @endforeach
		            </div>
		        </div>
		        <!--// pagin -->
		        <div class="pagination">
		          	{{ $careers->appends($array_search ?? [])->links('vendor.pagination.long-hau') }}
		        </div>
	        @else
				<p class="alert alert-info" style="margin-top: 10px">{{ trans('message.no_data') }}</p>
			@endif
	    </div>
	    <!-- / recruitment content -->
	</div>
	<!-- / container -->
	</section>

@endsection