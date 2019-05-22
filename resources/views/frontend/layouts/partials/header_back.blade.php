@if(!is_home_page())
    <div class="topbar light topbar-padding">
        <div class="container">
            <div class="topbar-left-items">
                <ul class="toplist toppadding pull-left paddtop1">
                    <li class="rightl">{{trans('page.phone')}}:</li>
                    <li> {{ System::content('phone', '#') }}</li>
                </ul>
            </div>
            <!--end left-->

            <div class="topbar-right-items pull-right">
                <ul class="toplist toppadding">
                    <li><a href="{{ System::content('facebook', '#') }}"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{ System::content('twitter', '#') }}"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{ System::content('google', '#') }}"><i class="fa fa-google-plus"></i></a></li>
                    <li class="last"><a href="{{ System::content('likedin', '#') }}"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endif

<div class="col-md-12 nopadding">
    <div class="header-section style1 pin-style {{!is_home_page() ? 'white' : ''}}">
        <div class="container">
            <div class="mod-menu">
                <div class="row">
                    <div class="col-sm-2"><a href="/{{ $composer_locale !== 'vi' ? $composer_locale : '' }}"
                                             title="Three For Solution" class="logo style-2 mar-4">
                            <img style="display: block;width: 100%;transition: all 0.2s ease-in-out;"
                                 src="assets/images/logo/{{is_home_page() ? 'logo.svg' : 'logo-dark.png'}}"
                                 alt="{{env('APP_NAME')}}">
                        </a></div>
                    <div class="col-sm-10">
                        <div class="main-nav">
                            <ul class="nav navbar-nav top-nav">
                                <li class="search-parent"><a href="javascript:void(0)" title=""><i aria-hidden="true"
                                                                                                   class="fa fa-search"></i></a>
                                    <div class="search-box ">
                                        <div class="content">
                                            <form action="{{trans('routes.page_resources')}}" method="get">
                                                {{ csrf_field() }}
                                                <div class="form-control">
                                                    <input type="text" name="q" value="{{$q or null}}"
                                                           placeholder="{{trans('customer.search__key')}}"/>
                                                    <a onclick="$(this).closest('form').submit()"
                                                       class="search-btn mar-1"><i aria-hidden="true" class="fa fa-search"></i></a></div>
                                                <a href="javascript:void(0)" class="close-btn mar-1">x</a>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li class="right">
                                    <a href="#">
                                        {{$composer_locale}}
                                    </a> <span class="arrow"></span>
                                    <ul>
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li>
                                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                                   href="{{ transLang( $page->getUrlWithLang($localeCode),$localeCode, isset($is_sub_page) ) }}">{{ $properties['native'] }}
                                                    {{--<img style="text-align: right;float: right;" src="assets/images/flag-{{$localeCode}}.png" alt="">--}}
                                                    <span class="flag-short-name">{{$localeCode}}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="visible-xs menu-icon"><a href="javascript:void(0)"
                                                                    class="navbar-toggle collapsed"
                                                                    data-toggle="collapse" data-target="#menu"
                                                                    aria-expanded="false"> <i aria-hidden="true"
                                                                                              class="fa fa-bars"></i>
                                    </a></li>
                            </ul>
                            <div id="menu" class="collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{trans('routes.page_home')}}">{{trans('menu.home')}}</a>
                                    </li>
                                    <li><a href="{{trans('routes.page_solutions')}}">{{trans('menu.solution')}}</a>
                                    </li>
                                    <li><a href="{{trans('routes.page_capabilities')}}">{{trans('menu.capability')}}</a>
                                    </li>
                                    <li><a href="{{trans('routes.page_resources')}}">{{trans('menu.resource')}}</a>
                                    </li>
                                    <li><a href="{{trans('routes.page_contact')}}">{{trans('menu.contact')}}</a>
                                    </li>
                                    `
                                    <li><a href="{{trans('routes.page_submit_rfp')}}">{{trans('menu.submit_rfp')}}</a>
                                    </li>
                                    <li class="right visible-xs">
                                        <a href="#">
                                            {{$composer_locale}}
                                        </a> <span class="arrow"></span>
                                        <ul>
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <li>
                                                    <a rel="alternate" hreflang="{{ $localeCode }}"
                                                       href="{{ transLang( $page->getUrlWithLang($localeCode),$localeCode, isset($is_sub_page) ) }}">{{ $properties['native'] }}
                                                        {{--<img style="text-align: right;float: right;" src="assets/images/flag-{{$localeCode}}.png" alt="">--}}
                                                        <span class="flag-short-name">{{$localeCode}}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end menu-->

</div>
<!--end menu-->