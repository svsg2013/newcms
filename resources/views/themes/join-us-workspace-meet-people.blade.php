@extends('frontend.layouts.master')

@section('style')
@endsection

@section('content')
    @component('themes._component_join-us',['blocks'=>$blocks, 'active_tab'=>3])
        @if($blocks->has('PEOPLE') && $bt = $blocks->get('PEOPLE')->first())
            <div class="joinCulturePeople">
                <h2 class="heading">{!! $bt->name !!}</h2>
                <div class="joinCulturePeople__intro">
                    {!! $bt->content !!}
                </div>

                @if($master)
                    <div class="joinCulturePeople__headingItem">
                        <div class="row">
                            <div class="col-md-9" data-animated-effect="fadeInLeft">
                                <div class="joinCulturePeople__headingItem__image">
                                    <div class="image"><a style="background-image:url('{{$master->avatar}}')" href="javascript:void(0)"  data-id="{{$master->id}}" class="show_team_info"><img
                                                    src="{{$master->avatar}}" alt=""></a></div>
                                </div>
                            </div>
                            <div class="col-md-11" data-animated-effect="fadeInRight" data-animated-delay="200">
                                <div class="joinCulturePeople__headingItem__info">
                                    <h4>{{$master->name}}</h4>
                                    <h5>{{$master->position}}</h5>
                                    <p class="des">{{$master->description}}</p>
                                    <div class="text-right"><a href="javascript:void(0)"  data-id="{{$master->id}}" class="show_team_info">
                                            Xem thêm<i class="arrow_carrot-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="gridPeople">
                    @foreach($team as $item)
                        <div class="gridPeople__wrap">
                            <div class="gridPeople__item">
                                <div class="gridPeople__item__image">
                                    <div class="image"><a style="background-image:url('{{$item->avatar}}')" class="show_team_info" data-id="{{$item->id}}"
                                                          href="javascript:void(0)"><img src="{{$item->avatar}}" alt=""></a></div>
                                </div>
                                <div class="gridPeople__item__info">
                                    <h4>{{$item->name}}</h4>
                                    <p>{{$item->position}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal fade peoplePopupInner" id="peoplePopup" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="joinCulturePeople__popup">
                            <div class="popupSlider">
                                @if($master)
                                    <div class="popupSlider__item">
                                        <div class="popupSlider__item__image">
                                            <div class="image">
                                                <a style="background-image:url('{{$master->avatar}}')" href="javascript:void(0)"  data-id="{{$master->id}}" class="show_team_info"><img src="{{$master->avatar}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="popupSlider__item__info">
                                            <h4>{{$master->name}}</h4>
                                            <p>{{$master->position}}</p>
                                        </div>
                                    </div>
                                @endif
                                @foreach($team as $item)
                                    <div class="popupSlider__item">
                                        <div class="popupSlider__item__image">
                                            <div class="image"><a
                                                        style="background-image:url('{{$item->avatar}}')"
                                                        href="javascript:void(0)"  data-id="{{$item->id}}" class="show_team_info"><img src="{{$item->avatar}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="popupSlider__item__info">
                                            <h4>{{$item->name}}</h4>
                                            <p>{{$item->position}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="popupContent">
                                <div class="popupContent__intro">
                                    <div class="popupContent__intro__image">
                                        <div class="image popup-avatar-bg" style="background-image: url('assets/images')">
                                            <img class="popup-avatar-im" src="">
                                        </div>
                                    </div>
                                    <div class="popupContent__intro__info">
                                        <h4 class="popup-name"></h4>
                                        <p class="popup-position"></p>
                                    </div>
                                </div>
                                <div class="popupContent__des">
                                    <h2 class="popup-description"></h2>
                                    <div class="popupGrid">
                                        <div class="popupGrid__item">
                                            <div class="popupGrid__item__icon"><img src="assets/images/icons/ic-join.svg" alt="">
                                            </div>
                                            <div class="popupGrid__item__info">
                                                <h4>Gia nhập</h4>
                                                <p class="popup-join_at"></p>
                                            </div>
                                        </div>
                                        <div class="popupGrid__item">
                                            <div class="popupGrid__item__icon"><img src="assets/images/icons/ic-workon.svg" alt="">
                                            </div>
                                            <div class="popupGrid__item__info">
                                                <h4>Giá trị công việc</h4>
                                                <p class="popup-job_value"></p>
                                            </div>
                                        </div>
                                        <div class="popupGrid__item">
                                            <div class="popupGrid__item__icon"><img src="assets/images/icons/ic-enjoy.svg" alt="">
                                            </div>
                                            <div class="popupGrid__item__info">
                                                <h4>Sở thích</h4>
                                                <p class="popup-favorite"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="popupContent__content popup-content">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    @endcomponent
@endsection

@push('add_script')
    <script>
        $('.show_team_info').click(function () {
            var id = $(this).data('id');
            $.get('{{route('frontend.get_team')}}',{id},function (res) {
                if(res.success){
                    let data = res.data;
                    console.log(data.avatar);
                    $('.popup-avatar-bg').css('background-image',"url('"+data.avatar_large+"')");
                    $('.popup-avatar-im').attr('src',data.avatar_large);
                    $('.popup-join_at').html(data.join_at);
                    $('.popup-name').html(data.name);
                    $('.popup-description').html(data.description);
                    $('.popup-job_value').html(data.job_value);
                    $('.popup-favorite').html(data.favorite);
                    $('.popup-content').html(data.content);
                    $('#peoplePopup').modal('show');
                }
            });
        });
    </script>
@endpush