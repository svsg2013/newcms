<div class="clearfix"></div>
<section class="section-side-image clearfix">
    <div class="img-holder col-md-12 col-sm-12 col-xs-12">
        <div class="background-imgholder" style="background:url(assets/images/header-inner-1.jpg);"><img class="nodisplay-image" src="http://via.placeholder.com/1500x1000" alt=""/> </div>
    </div>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 clearfix nopadding">
                <div class="header-inner less-height">
                    <div class="overlay">
                        <div class="text text-center">
                            @if(!empty($page) && !empty($page->title)  )
                            <h3 class="uppercase text-white less-mar-1 title">{{ isset($is_sub_page) ? trans('menu.resource') : $page->title  }}</h3>
                            <h6 class="uppercase text-white sub-title" style="margin-top: 10px;text-transform: initial">{{ $page->description }}</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class=" clearfix"></div>
<!--end header section -->

<section>
    <div class="pagenation-holder" style="padding: 15px 0 10px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @if(!empty($page) && !empty($page->title))
                    <h4 style="margin-top: 10px;margin-bottom: 8px;">{{ isset($is_sub_page) ? trans('menu.resource') : $page->title }}</h4>
                    @endif
                </div>
                <div class="col-md-6">
                    @include('frontend.layouts.partials.breadcrumb')
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!--end section-->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            @include('frontend.layouts.partials.alert')
        </div>
    </div>
</div>