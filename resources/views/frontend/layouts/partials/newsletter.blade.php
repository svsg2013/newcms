<h3>{{ trans('page.subscribe') }}</h3>
<form method="POST" action="{{ route('subscribe.create') }}">
    <div class="newsletter">
        <input type="text" class="form-control" placeholder="{{ trans('page.email') }}">
        <button class="btn btn-lh" id="btn_subscribe">{{ trans('button.register') }} <i class="arrow_right"></i></button>
    </div><!-- /input-group -->
</form>