<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info" style="height: 100px;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, .3)"></div>
            <div class="info-container">
                <div class="image pull-left">
                    <img src="/assets/admin/images/user.png" width="48" height="48" alt="User"/>
                </div>
                <div class="name" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">{{ Auth::user()->name }}</div>
                <div class="email">{{ Auth::user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>{!! trans("admin_menu.sign_out") !!}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header"></li>
                <li class="{!! currentPageMenu(["*admin"]) !!}">
                    <a href="/admin">
                        <i class="material-icons">dashboard</i>
                        <span>{!! trans("admin_menu.dashboard") !!}</span>
                    </a>
                </li>
                @if(in_array('admin.page.index', $composer_auth_permissions))
                    <li class="{!! currentPageMenu(["*admin/pages*", '*admin/themes*']) !!}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">pages</i>
                            <span>{!! trans("admin_menu.pages") !!}</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{!! currentPageMenu(["*admin/pages"]) !!}">
                                <a href="{!! route("admin.page.index") !!}">
                                    <span>{!! trans("admin_menu.pages_list") !!}</span>
                                </a>
                            </li>

                            <li class="{!! currentPageMenu(["*admin/pages/create*"]) !!}">
                                <a href="{!! route("admin.page.create") !!}">
                                    <span>{!! trans("admin_menu.create_page") !!}</span>
                                </a>
                            </li>

                             <li class="{!! currentPageMenu(["*admin/themes*"]) !!}">
                                <a href="{!! route("admin.theme.index") !!}">
                                    <span>{!! trans("admin_menu.themes") !!}</span>
                                </a>
                            </li> 
                        </ul>
                    </li>
                @endif

                @if(in_array('admin.news.index', $composer_auth_permissions))
                    <li class="{!! currentPageMenu(["*admin/news*"]) !!}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>{!! trans("admin_menu.news") !!}</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{!! currentPageMenu(["*admin/news"]) !!}">
                                <a href="{!! route("admin.news.index") !!}">
                                    <span>{!! trans("admin_menu.news_list") !!}</span>
                                </a>
                            </li>
                            <li class="{!! currentPageMenu(["*admin/news/create"]) !!}">
                                <a href="{!! route("admin.news.create") !!}">
                                    <span>{!! trans("admin_menu.news_create") !!}</span>
                                </a>
                            </li>
                             <li class="{!! currentPageMenu(["*admin/news-categories*"]) !!}">
                                <a href="{!! route("admin.news_category.index") !!}">
                                    <span>{!! trans("admin_menu.categories") !!}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{--@if(in_array('admin.address.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu(["*admin/address*"]) !!}">--}}
                        {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                            {{--<i class="material-icons">add_location</i>--}}
                            {{--<span>Address</span>--}}
                        {{--</a>--}}
                        {{--<ul class="ml-menu">--}}
                            {{--<li class="{!! currentPageMenu(["*admin/address"]) !!}">--}}
                                {{--<a href="{!! route("admin.address.index") !!}">--}}
                                    {{--<span>List</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="{!! currentPageMenu(["*admin/address-category*"]) !!}">--}}
                                {{--<a href="{!! route("admin.address.category.index") !!}">--}}
                                    {{--<span>Categories</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif--}}

                {{--@if(in_array('admin.menu.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu(["*admin/menu*"]) !!}">--}}
                        {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                            {{--<i class="material-icons">menu</i>--}}
                            {{--<span>{!! trans("admin_menu.menu") !!}</span>--}}
                        {{--</a>--}}
                        {{--<ul class="ml-menu">--}}
                            {{--<li class="{!! currentPageMenu(["*admin/menu*"]) !!}">--}}
                                {{--<a href="{!! route("admin.menu.index") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.menu") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="{!! currentPageMenu(["*admin/menu-item*"]) !!}">--}}
                                {{--<a href="{!! route("admin.menu.item.index") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.menu_item") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif--}}

                 {{--@if(in_array('admin.brochures.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu(["*admin/brochures*"]) !!}">--}}
                        {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                            {{--<i class="material-icons">view_list</i>--}}
                            {{--<span>{!! trans("admin_menu.brochures") !!}</span>--}}
                        {{--</a>--}}
                        {{--<ul class="ml-menu">--}}
                            {{--<li class="{!! currentPageMenu(["*admin/brochures"]) !!}">--}}
                                {{--<a href="{!! route("admin.brochures.index") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.brochures_list") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="{!! currentPageMenu(["*admin/brochures/create"]) !!}">--}}
                                {{--<a href="{!! route("admin.brochures.create") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.brochures_create") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif --}}

                {{--@if(in_array('admin.career.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu([--}}
                            {{--"*admin/careers*",--}}
                            {{--"*admin/careers/create",--}}
                            {{--"*admin/careers/application-list",--}}
                            {{--"*admin/careers/categories*",--}}
                            {{--"*admin/careers/levels*",--}}
                            {{--"*admin/career-city*"--}}
                        {{--]) !!}">--}}
                        {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                            {{--<i class="material-icons">event_seat</i>--}}
                            {{--<span>{!! trans("admin_menu.careers") !!}</span>--}}
                        {{--</a>--}}
                        {{--<ul class="ml-menu">--}}
                            {{--<li class="{!! currentPageMenu(["*admin/careers"]) !!}">--}}
                                {{--<a href="{!! route("admin.career.index") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.careers_list") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="{!! currentPageMenu(["*admin/careers/create"]) !!}">--}}
                                {{--<a href="{!! route("admin.career.create") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.create_career") !!}</span></a>--}}
                            {{--</li>--}}
                            {{--<li class="{!! currentPageMenu(["*admin/careers/application-list"]) !!}">--}}
                                {{--<a href="{!! route("admin.career.application") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.applications") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}

                            {{--<li class="{!! currentPageMenu(["*admin/careers/categories*"]) !!}">--}}
                                {{--<a href="{!! route("admin.career_category.index") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.career_category") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}

                            {{--<li class="{!! currentPageMenu(["*admin/careers/levels*"]) !!}">--}}
                                {{--<a href="{!! route("admin.career_level.index") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.career_level") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{----}}
                            {{--<li class="{!! currentPageMenu(["*admin/career-city*"]) !!}">--}}
                                {{--<a href="{!! route("admin.city.career.index") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.city_career") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif--}}

                {{--@if(in_array('admin.faq.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu(["*admin/faqs*"]) !!}">--}}
                        {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                            {{--<i class="material-icons">question_answer</i>--}}
                            {{--<span>{!! trans("admin_menu.faqs") !!}</span>--}}
                        {{--</a>--}}
                        {{--<ul class="ml-menu">--}}
                            {{--<li class="{!! currentPageMenu(["*admin/faqs"]) !!}">--}}
                                {{--<a href="{!! route("admin.faq.index") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.faqs_list") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="{!! currentPageMenu(["*admin/faqs/categories*"]) !!}">--}}
                                {{--<a href="{!! route("admin.faq_category.index") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.categories") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}

                            {{--<li class="{!! currentPageMenu(["*admin/faqs/customer-questions*"]) !!}">--}}
                                {{--<a href="{!! route("admin.faq_question.index") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.faq_question") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif--}}

                {{--@if(in_array('admin.team.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu(["*admin/team*"]) !!}">--}}
                        {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                            {{--<i class="material-icons">supervisor_account</i>--}}
                            {{--<span>{!! trans("admin_menu.team") !!}</span>--}}
                        {{--</a>--}}
                        {{--<ul class="ml-menu">--}}
                            {{--<li class="{!! currentPageMenu(["*admin/team"]) !!}">--}}
                                {{--<a href="{!! route("admin.team.index") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.team_list") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="{!! currentPageMenu(["*admin/team/create"]) !!}">--}}
                                {{--<a href="{!! route("admin.team.create") !!}">--}}
                                    {{--<span>{!! trans("admin_menu.team_create") !!}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif--}}

                @if(in_array('admin.popup.index', $composer_auth_permissions))
                    <li class="{!! currentPageMenu(["*admin/popup*"]) !!}">
                        <a href="{!! route("admin.popup.index") !!}">
                            <i class="material-icons">check_circle_outline</i>
                            <span>{!! trans("admin_menu.popup") !!}</span>
                        </a>
                    </li>
                @endif

                {{--@if(in_array('admin.branch.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu(["*admin/branches*"]) !!}">--}}
                        {{--<a href="{!! route("admin.branch.index") !!}">--}}
                            {{--<i class="material-icons">device_hub</i>--}}
                            {{--<span>{!! trans("admin_menu.branches") !!}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endif--}}

                {{--@if(in_array('admin.achievements.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu(["*admin/achievements*"]) !!}">--}}
                        {{--<a href="{!! route("admin.achievements.index") !!}">--}}
                            {{--<i class="material-icons">check_circle_outline</i>--}}
                            {{--<span>{!! trans("admin_menu.achievements") !!}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endif--}}

                {{--@if(in_array('admin.city.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu(["*admin/city*"]) !!}">--}}
                        {{--<a href="{!! route("admin.city.index") !!}">--}}
                            {{--<i class="material-icons">location_city</i>--}}
                            {{--<span>{!! trans("admin_menu.city") !!}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endif--}}

                {{--@if(in_array('admin.contact.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu(["*admin/contacts*"]) !!}">--}}
                        {{--<a href="{!! route("admin.contact.index") !!}">--}}
                            {{--<i class="material-icons">contact_mail</i>--}}
                            {{--<span>{!! trans("admin_menu.contacts") !!}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endif--}}
                {{----}}
                {{--@if(in_array('admin.subscribe.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu(["*admin/subscribe*"]) !!}">--}}
                        {{--<a href="{!! route("admin.subscribe.index") !!}">--}}
                            {{--<i class="material-icons">subscriptions</i>--}}
                            {{--<span>{!! trans("admin_menu.subscribe") !!}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endif--}}

                {{--@if(in_array('admin.website.index', $composer_auth_permissions))--}}
                    {{--<li class="{!! currentPageMenu(["*admin/website*"]) !!}">--}}
                        {{--<a href="{!! route("admin.website.index") !!}">--}}
                            {{--<i class="material-icons">cloud</i>--}}
                            {{--<span>{!! trans("admin_menu.website") !!}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endif--}}

                @if(in_array('admin.slider.index', $composer_auth_permissions))
                    <li class="{!! currentPageMenu(["*admin/sliders*"]) !!}">
                        <a href="{!! route("admin.slider.index") !!}">
                            <i class="material-icons">perm_media</i>
                            <span>{!! trans("admin_menu.sliders") !!}</span>
                        </a>
                    </li>
                @endif

                <li class="header"></li>
                @if(in_array('admin.user.index', $composer_auth_permissions))
                    <li class="{!! currentPageMenu(["*admin/users*", '*admin/roles*']) !!}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_box</i>
                            <span>{!! trans("admin_menu.users") !!}</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{!! currentPageMenu(["*admin/users*"]) !!}">
                                <a href="{!! route("admin.user.index") !!}">
                                    <span>{!! trans("admin_menu.users") !!}</span>
                                </a>
                            </li>
                            <li class="{!! currentPageMenu(["*admin/roles*"]) !!}">
                                <a href="{!! route("admin.role.index") !!}">
                                    <span>{!! trans("admin_menu.roles") !!}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(in_array('admin.system.edit', $composer_auth_permissions))
                    <li class="{!! currentPageMenu(["*admin/system*"]) !!}">
                        <a href="{!! route("admin.system.edit", '0110') !!}">
                            <i class="material-icons">settings</i>
                            <span>{!! trans("admin_menu.system") !!}</span>
                        </a>
                    </li>
                @endif

                <li class="{!! currentPageMenu(["*"]) !!} hidden">
                    <a></a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy;{!! date("Y") !!} <a href="javascript:void(0);">Admin {{ config('app.name') }}</a>
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
