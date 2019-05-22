@extends('frontend.layouts.master')

@section('style')
    <style>
        .nation .chosen-container, .select-space + .chosen-container {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
@endsection


@section('main_extend') class="main consultantPage" style="background-image: url('{{ !empty($banner) ? $banner['image'] : 'http://fakeimg.pl/1600x600/0c8641/000?text=VISIT-REGISTRATION' }}')" @endsection

@section('content')
    <section class="subHeader">
        <div class="container">
            <h1>{{ !empty($banner) ? $banner['name'] : 'VISIT-REGISTRATION' }}</h1>
        </div>
    </section>

    @include('frontend.layouts.partials.breadcrumb')

    <section class="consultant">
        <div class="container">
            <div class="consultant__content">
                <div class="headings text-center">
                    <h2><span>{{ trans('register.title') }}</span></h2>
                </div>

                @include('frontend.layouts.partials.message')

                <form method="POST" action="{{ route('product.storeRegisterSightseeing') }}" class="form" data-toggle="validator">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company">{{ trans('register.company') }}</label>
                                <input type="text" name="company" id="company" placeholder="..."
                                       value="{{ old('company') }}" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ trans('register.name') }}</label>
                                <input type="text" name="name" id="name" placeholder="{{ trans('register.name') }}"
                                       value="{{ old('name') }}"
                                       class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <!-- / row -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">{{ trans('register.email') }}</label>
                                <input type="email" name="email" id="email" placeholder="example@gmail.com"
                                       value="{{ old('email') }}"
                                       class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">{{ trans('register.phone') }}</label>
                                <input type="tel" name="phone" id="phone" placeholder="0912345678" class="form-control"
                                       value="{{ old('phone') }}"
                                       required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <!-- / row -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="trades">{{ trans('register.business') }}</label>
                                <select name="business_id" id="trades" class="form-control select">
                                    <option value="">{{ trans('register.select') }}</option>
                                    @foreach($business as $key => $value)
                                        <option {{ old('business_id') ==  $value->id ? 'selected': '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group nation">
                                <label for="vietnam">{{ trans('register.country') }}</label>
                                @foreach($country as $key => $value)
                                    <label for="vietnam" class="radio">
                                        <input type="radio" {{ old('country_id') ==  $value->id ? 'checked': '' }} name="country_id" id="vietnam" value="{{ $value->id }}">
                                        <span>{{ $value->name }}</span>
                                    </label>
                                    @break($key === 0)
                                @endforeach
                                <label for="other" class="radio">
                                    <input type="radio" {{ old('country_id') ==  'other' ? 'checked': '' }} name="country_id" id="other" value="other">
                                    <span>{{ trans('register.country_other') }}</span>
                                </label>

                                <select name="country_other_id" id="nation-orther" class="form-control select">
                                    <option value="">{{ trans('register.select') }}</option>
                                    @foreach($country as $key => $value)
                                        @continue($key === 0)
                                        <option {{ old('country_other_id') ==  $value->id ? 'selected': '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- / row -->

                    <div class="form-group sightseeing">
                        <label>{{ trans('register.target') }}</label>

                        @foreach($targets as $key => $name)
                        <label for="target-{{ $key }}" class="checkbox">
                            <input type="checkbox" name="target[]" id="target-{{ $key }}" value="{{ $key }}" {{ !empty(old('target')) && is_array(old('target')) && in_array($key, old('target')) ? 'checked' : '' }}>
                            <span>{{ $name }}</span>
                        </label>
                        @endforeach

                        <input type="text" name="target_other" id="target_other" value="{{ old('target_other') }}"
                               placeholder="{{ trans('register.target_other') }}" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('register.number_people') }}</label>
                                <input type="number" name="number_people" value="{{ old('number_people') }}"  placeholder="{{ trans('register.number_people') }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!--
                                Empy or data-lang="en" - English
                                data-lang="vi" - Vietnamese
                                data-lang="ja" - Japanese
                                data-lang="kr" - Korean
                            -->
                            <div class="form-group input-daterange" data-lang="{{ $composer_locale }}" data-format='DD / {{ JS_DATE_TIME }}'>
                                <label for="mobile">{{ trans('register.register_time') }}</label>

                                <div>
                                    <span>{{ trans('register.from') }}</span>
                                    <span class="date"><input type="text" name="from" value="{{ old('from') }}" id="date-start" placeholder="{{ trans('register.select_date') }}" class="form-control"></span>
                                </div>

                                <div>
                                    <span>{{ trans('register.to') }}</span>
                                    <span class="date"><input type="text" value="{{ old('to') }}" name="to" id="date-end" placeholder="{{ trans('register.select_date') }}" class="form-control"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content">{{ trans('register.content') }}</label>
                        <textarea name="content" id="content" rows="5" placeholder="{{ trans('register.content') }}"
                                  class="form-control">{{ old('content') }}</textarea>
                    </div>

                    <div class="form-group">
                        {!! app('captcha')->display($attributes = [], $lang = $composer_locale) !!}
                        <input type="hidden" name="re_captcha">
                    </div>

                    <div class="form-group submit text-center">
                        <input type="hidden" name="locale" value="{{ $composer_locale }}">
                        <button class="btn btn-lh" type="submit"> {{ trans('button.register') }} <i class="arrow_right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- / container -->
    </section>
@endsection

@section('script')
    <script>
        jQuery(function ($) {
            $('input[name="country_id"]').change(function () {
                let _this = $(this);
                let val = _this.val();
                if (val === 'other') {
                    _this.closest('div').find('.chosen-container').css('opacity', '1');
                    _this.closest('div').find('.chosen-container').css('pointer-events', 'all');
                }
                else {
                    _this.closest('div').find('select').val('').trigger("chosen:updated");
                    _this.closest('div').find('.chosen-container').css('opacity', '0.5');
                    _this.closest('div').find('.chosen-container').css('pointer-events', 'none');
                }
            });

            $('#target-TARGET_OTHER').change(function () {
                let _this = $(this);
                if(_this.is(':checked')){
                    $('#target_other').css('opacity', '1');
                    $('#target_other').css('pointer-events', 'all');
                    $('#target_other').focus();
                }
                else{
                    $('#target_other').val('');
                    $('#target_other').css('opacity', '0.5');
                    $('#target_other').css('pointer-events', 'none');
                }
            });

            $('input[name="country_id"]:checked').change();
            $('#target-TARGET_OTHER').change();
        });
    </script>
@endsection