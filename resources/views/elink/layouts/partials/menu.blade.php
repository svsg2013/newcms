<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info" style="height: 100px;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, .3)"></div>
            <div class="info-container">
                <div class="image pull-left">
                    <img src="/assets/elink/images/user.png" width="48" height="48" alt="User"/>
                </div>
                <div class="name" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">{{ 'Company' }}</div>
                <div class="email">{{ 'Company' }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href=""
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>{!! trans('elink_menu.sign_out') !!}</a>
                                <form id="logout-form" action="{{ route('elink.logout') }}" method="GET" style="display: none;">
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

                <li class="">
                    <a href="#">
                        <i class="material-icons">settings</i>
                        <span>QL Trang chu</span>
                    </a>
                </li>

                <li class="">
                    <a href="#">
                        <i class="material-icons">settings</i>
                        <span>QL Trang Gioi thieu</span>
                    </a>
                </li>

                
                <li class="{!! currentPageMenu(["*elink/news*"]) !!}">
                    <a href="{!! route("elink.news.index") !!}">
                        <i class="material-icons">fiber_new</i>
                        <span>{!! trans("elink_menu.news") !!}</span>
                    </a>
                </li>

                <li class="{!! currentPageMenu(["*"]) !!} hidden">
                    <a></a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy;{!! date("Y") !!} <a href="javascript:void(0);">elink {{ config('app.name') }}</a>
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
