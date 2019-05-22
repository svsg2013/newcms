@extends("admin.layouts.master")

@section("style")
    <style>
        a.info-box{
            cursor: pointer;
        }
        a.info-box:hover, a.info-box:focus{
            text-decoration: none !important;
            outline: none; !important;
        }
    </style>
@endsection

@section("content")
    <div class="row clearfix">
        @if(in_array('admin.product.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.product.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-red">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.products") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">{{ $count_product }}</div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.news.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.news.index") !!}" class="info-box hover-expand-effect">
                    <div class="icon bg-cyan ">
                        <i class="material-icons">view_list</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.news") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">{{ $count_news }}</div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.career.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.career.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-orange">
                        <i class="material-icons">event_seat</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.careers") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">{{ $count_career }}</div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.branch.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.branch.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-blue-grey">
                        <i class="material-icons">device_hub</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.branches") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">{{ $count_branch }}
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.contact.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.contact.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-pink">
                        <i class="material-icons">contact_mail</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.contacts") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">
                            {{ $count_contact }}
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.page.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.page.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-light-blue">
                        <i class="material-icons">pages</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.pages") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">
                            {{ $count_page }}
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.faq.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.faq.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-light-green">
                        <i class="material-icons">question_answer</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.faqs") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">
                            {{ $count_faq }}
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.slider.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.slider.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-amber">
                        <i class="material-icons">perm_media</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.sliders") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">
                            {{ $count_slider }}
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.gallery.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.gallery.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-purple">
                        <i class="material-icons">video_library</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.galleries") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">
                            {{ $count_gallery }}
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.image360.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.image360.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-brown">
                        <i class="material-icons">filter</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.image360") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">
                            {{ $count_image_360 }}
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.user.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.user.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-black">
                        <i class="material-icons">account_box</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.users") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">
                            {{ $count_user }}
                        </div>
                    </div>
                </a>
            </div>
        @endif
    </div>
@endsection