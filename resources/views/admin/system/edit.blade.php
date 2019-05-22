@extends("admin.layouts.master")

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {!! trans("admin_system.list") !!}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="body">

                    @include("admin.layouts.partials.message")

                    <form id="form-form" method="post"
                          action="{!! route("admin.system.update", '0110') !!}"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.contact_email') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" name="contact_email" class="form-control"
                                               value="{{ $system['contact_email']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.email') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" name="email" class="form-control"
                                               value="{{ $system['email']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.email_subcribe') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" name="email_subcribe" class="form-control"
                                               value="{{ $system['email_subcribe']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.phone') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="phone" class="form-control"
                                               value="{{ $system['phone']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.phone_faq') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="phone_faq" class="form-control"
                                               value="{{ $system['phone_faq']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.phone_bottom') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="phone_bottom" class="form-control"
                                               value="{{ $system['phone_bottom']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.fax') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="fax" class="form-control"
                                               value="{{ $system['fax']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.location') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="url" name="location" class="form-control"
                                               value="{{ $system['location']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                            @foreach($composer_locales as $key => $value)
                                <div class="col-md-4">
                                    <div class="font-bold col-green">{!! trans('admin_system.form.address') !!} ({{ $value['native'] }})</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="address[{{ $key }}]" class="form-control" value="{{ $system['address']['content'][$key] ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            @foreach($composer_locales as $key => $value)
                                <div class="col-md-4">
                                    <div class="font-bold col-green">{!! trans('admin_system.form.address_show_room') !!} ({{ $value['native'] }})</div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="address_show_room[{{ $key }}]" class="form-control" value="{{ $system['address_show_room']['content'][$key] ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <h4>{{ trans('admin_system.form.cookie_policy') }}</h4>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group form-float">
                                    <div class="font-bold col-green">{!! trans('admin_system.form.cookie_policy_page') !!}</div>
                                    <div class="form-line focused">
                                        <select id="cookie_policy_page" class="js-example-basic form-control" name="cookie_policy_page">
                                            <option value="">---</option>
                                            @foreach($pages as $page)
                                                <option value="{{ $page->id }}" {{ old('cookie_policy_page', $system['cookie_policy_page']['content'] ?? null) == $page->id ? 'selected' : '' }}>{{ $page->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="font-bold col-green">{!! trans('admin_system.form.cookie_policy_content') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea rows="7" id="cookie_policy_content" class="form-control no-resize" name="cookie_policy_content">{{ old('cookie_policy_content', $system['cookie_policy_content']['content'] ??  null) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <h4>{{ trans('admin_system.social') }}</h4>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.facebook') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="facebook" class="form-control"
                                               value="{{ !empty($system['facebook']) ?  $system['facebook']['content'] : null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.youtube') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="youtube" class="form-control"
                                               value="{{ $system['youtube']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.google') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="google" class="form-control"
                                               value="{{ $system['google']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.twitter') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="twitter" class="form-control"
                                               value="{{ $system['twitter']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.likedin') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="likedin" class="form-control"
                                               value="{{  $system['likedin']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.instagram') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="instagram" class="form-control"
                                               value="{{ $system['instagram']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.zalo') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="zalo" class="form-control"
                                               value="{{ $system['zalo']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4>{{ trans('admin_system.website_info') }}</h4>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.website_title') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="website_title" name="website_title" class="form-control"
                                               value="{{ $system['website_title']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.website_description') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="website_description" class="form-control"
                                               value="{{ $system['website_description']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.website_keywords') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" name="website_keywords" class="form-control"
                                               value="{{ $system['website_keywords']['content'] ?? null }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="font-bold col-green">{!! trans('admin_system.form.website_logo') !!}</div>
                                <div class="form-group">
                                    @component('admin.layouts.components.upload_photo', [
                                        'image' => $system['website_logo']['content'] ?? null, 
                                        'name' => 'website_logo',
                                    ])
                                    @endcomponent

                                    <!-- $news->image ?? null -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="font-bold col-green">{!! trans('admin_system.form.google_analytic') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea rows="7" id="google_analytic" class="form-control no-resize"
                                                  name="google_analytic">{{ $system['google_analytic']['content'] ?? null }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="font-bold col-green">{!! trans('admin_system.form.chat_script') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea rows="7" id="chat_script" class="form-control no-resize"
                                                  name="chat_script">{{ $system['chat_script']['content'] ?? null }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                            "cancel" => ''
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
