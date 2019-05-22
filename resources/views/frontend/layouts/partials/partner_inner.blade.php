@if($composer_partner->count())
<section class="sec-padding-5 {{is_home_page() ? '' : 'section-primary'}}">
    <div class="container">
        <div class="row">
            <div id="owl-demo11" class="owl-carousel owl-theme">
                @foreach($composer_partner as $par)
                <div class="item">

                    <img src="{{$par->logo}}" alt="">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@endif
