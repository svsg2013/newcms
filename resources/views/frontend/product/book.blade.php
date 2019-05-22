@extends('frontend.layouts.master')

@section('style')
    <style>
        .nation .chosen-container, .select-space + .chosen-container {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
@endsection


@section('main_extend') class="main consultantPage" style="background-image: url('{{ !empty($banner) ? $banner['image'] : 'http://fakeimg.pl/1600x600/0c8641/000?text=RESERVATION-REGISTER' }}')" @endsection

@section('content')
    <section class="subHeader">
        <div class="container">
            <h1>{{ !empty($banner) ? $banner['name'] : 'RESERVATION-REGISTER' }}</h1>
        </div>
    </section>

    @include('frontend.layouts.partials.breadcrumb')

    <section class="consultant">
        <div class="container">
            <div class="consultant__content">
                <div class="headings text-center">
                    <h2><span>{{ trans('book.title') }}</span></h2>
                </div>

                @include('frontend.layouts.partials.message')

                <form method="POST" action="{{ route('product.storeBooking') }}" class="form" data-toggle="validator">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ trans('book.name') }}</label>
                                <input type="text" name="name" id="name" placeholder="{{ trans('book.name') }}"
                                       value="{{ old('name') }}"
                                       class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">{{ trans('book.phone') }}</label>
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
                                <label for="email">{{ trans('book.email') }}</label>
                                <input type="email" name="email" id="email" placeholder="example@gmail.com"
                                       value="{{ old('email') }}"
                                       class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company">{{ trans('book.company') }}</label>
                                <input type="text" name="company" id="company" placeholder="..."
                                       value="{{ old('company') }}" class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <!-- / row -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="trades">{{ trans('book.business') }}</label>
                                <select name="business_id" id="trades" class="form-control select">
                                    <option value="">{{ trans('book.select') }}</option>
                                    @foreach($business as $key => $value)
                                        <option {{ old('business_id') ==  $value->id ? 'selected': '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group nation">
                                <label for="vietnam">{{ trans('book.country') }}</label>
                                @foreach($country as $key => $value)
                                    <label for="vietnam" class="radio">
                                        <input type="radio" {{ old('country_id') ==  $value->id ? 'checked': '' }} name="country_id" id="vietnam" value="{{ $value->id }}">
                                        <span>{{ $value->name }}</span>
                                    </label>
                                    @break($key === 0)
                                @endforeach
                                <label for="other" class="radio">
                                    <input type="radio" {{ old('country_id') ==  'other' ? 'checked': '' }} name="country_id" id="other" value="other">
                                    <span>{{ trans('book.country_other') }}</span>
                                </label>

                                <select name="country_other_id" id="nation-orther" class="form-control select">
                                    <option value="">{{ trans('book.select') }}</option>
                                    @foreach($country as $key => $value)
                                        @continue($key === 0)
                                        <option {{ old('country_other_id') ==  $value->id ? 'selected': '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- / row -->

                    <div class="form-group purpose">
                        <label for="purpose">{{ trans('book.target') }}</label>
                        <select name="target_id" id="purpose" class="form-control select">
                            <option value="">{{ trans('book.select') }}</option>
                            @foreach($target as $value)
                                <option {{ old('target_id') ==  $value->id ? 'selected': '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>

                        <span>{{ trans('book.target_other') }}</span>
                        <input type="text" name="target_other" id="purpose-orther" value="{{ old('target_other') }}"
                               placeholder="{{ trans('book.target_other') }}" class="form-control">
                    </div>

                    <div class="form-group land">
                        <label for="purpose">{{ trans('book.product_index') }}</label>

                        @foreach($free_space as $tree)
                            <div>
                                <label class="checkbox">
                                    <input type="checkbox" name="free_space_id[]" value="{{ $tree->id }}" {{ !empty(old('free_space_id')) && in_array($tree->id , old('free_space_id')) ? 'checked': '' }}
                                           level="{{ $tree->level }}">
                                    <span>{{ $tree->name }}</span>
                                </label>
                                @if(!empty($tree->trees) && $tree->trees->count())
                                    <span class="select-space"
                                          style="opacity: 0.5">{{ trans('book.free_space') }}</span>

                                    <select name="free_space_id[]" id="land-plot"
                                            class="form-control select select-space"
                                            style="opacity: 0.5; pointer-events: none;">
                                        <option value="">{{ trans('book.select') }}</option>

                                        @foreach($tree->trees as $tree2)
                                            @if(!empty($tree2->trees) && $tree2->trees->count())
                                                <optgroup label="{{ $tree2->name }}">
                                                    @foreach($tree2->trees as $tree3)
                                                        <option {{ !empty(old('free_space_id')) && in_array($tree3->id , old('free_space_id')) ? 'selected': '' }} value="{{ $tree3->id }}">{{ $tree3->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option {{ !empty(old('free_space_id')) && in_array($tree2->id , old('free_space_id')) ? 'selected': '' }} value="{{ $tree2->id }}">{{ $tree2->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="content">{{ trans('book.content') }}</label>
                        <textarea name="content" id="content" rows="5" placeholder="{{ trans('book.content') }}"
                                  class="form-control">{{ old('content') }}</textarea>
                    </div>

                    <div class="form-group">
                        {!! app('captcha')->display($attributes = [], $lang = $composer_locale) !!}
                        <input type="hidden" name="re_captcha">
                    </div>

                    <div class="form-group submit text-center">
                        <input type="hidden" name="locale" value="{{ $composer_locale }}">
                        <button class="btn btn-lh" type="submit"> {{ trans('button.book') }} <i class="arrow_right"></i></button>
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
            $('input[name="free_space_id[]"]').change(function () {
                let _this = $(this);
                let level = _this.attr('level');
                if (level === '0') {
                    if (_this.is(':checked')) {
                        _this.closest('div').find('.select-space').css('opacity', '1');
                        _this.closest('div').find('.chosen-container').css('opacity', '1');
                        _this.closest('div').find('.chosen-container').css('pointer-events', 'all');
                    }
                    else {
                        _this.closest('div').find('select').val('').trigger("chosen:updated");
                        _this.closest('div').find('.select-space').css('opacity', '0.5');
                        _this.closest('div').find('.chosen-container').css('opacity', '0.5');
                        _this.closest('div').find('.chosen-container').css('pointer-events', 'none');
                    }
                }
            });

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

            $('input[name="free_space_id[]"]:checked').change();
            $('input[name="country_id"]:checked').change();
        });
    </script>
@endsection