@if($partners->count())
<div class="teams">
    @foreach($partners as $rs)
        <div class="team team--customer">
            <div class="team__content team__content--customer">
                <div class="team__content__img">
                    <div class="overlay"></div>
                    <img src="{{ $rs->photo ? $rs->photo : '/assets/images/no-image-customer.jpg' }}" alt="{{ $rs->name }}">
                    <img class="last-img" src="{{ $rs->logo }}"
                         alt="{{ $rs->name }}" style="max-width: 141px;">
                </div>
            </div>

            <div class="team__expand">
                <div class="team__expand__inner">
                    <div class="row">
                        <a class="team__expand__close" href="#">
                            <i class="icon_close"></i>
                        </a>
                        <div class="col-md-4">
                            <div class="image">
                                <img src="{{ $rs->photo ? $rs->photo : '/assets/images/no-image-customer.jpg' }}" alt="{{ $rs->name }}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <p class="title">{{ $rs->name }}</p>
                            {!! $rs->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $partners->appends($input_search ?? [])->links('vendor.pagination.long-hau') }}
@else
    <p class="alert alert-info">{{ trans('layout.no_data') }}</p>
@endif