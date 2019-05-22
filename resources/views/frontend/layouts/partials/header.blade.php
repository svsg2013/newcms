<div class="cookie-alert">
    <div class="container">
        {!! $policyContent  !!}
    </div>
</div>
<header class="navbar navbar-expand-md">
    <div class="navbar__top">
        <div class="container">
            <div class="navbar__top__btns">
                <a class="btn btn-sm btn-outline-primary chat-script-btn" href="javascript:void(0)" title="Chat">
                    <img class="icon" src="/assets/images/icons/ic-chat.svg" alt="">
                    <span>Chat</span>
                </a>
                <a class="btn btn-sm btn-outline-primary btn-call" href="tel:{{System::content('phone','(038) 2222-9999')}}" title="Call: {{System::content('phone','(038) 2222-9999')}}">
                    <img class="icon" src="/assets/images/icons/ic-call.svg" alt="">
                    <span>{{ System::content('phone','(038) 2222-9999') }}</span>
                </a>
                <a class="btn btn-sm btn-danger @if($composer_active_popup == true) btn-loan-stop @endif" href="@if($composer_active_popup == false) https://portal.easycredit.vn/extranet/loanRequest.do @endif" title="Nhận khoản vay">
                    <span>
                        <i><img class="svg ic-global" src="/assets/images/icons/ic-global.svg" alt=""></i>Đăng ký vay trực tuyến
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="navbar__content">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                aria-expanded="false" aria-label="Toggle navigation">
                <span> </span>
                <span> </span>
                <span> </span>
                <span> </span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="{!! System::content('website_logo', null) !!}" alt="" height="35">
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                {!! $composer_menu_header !!}
            </div>
            <div class="navbar__search">
                <div class="navbar__search__form">
                    <form action="{{ route('page.search') }}" method="GET">
                        {{ csrf_field() }}
                        <input class="form-control" id="search-input" type="text" name="keyword" placeholder="Nhập và nhấn enter để tìm kiếm">
                    </form>
                </div>
                <button class="btn navbar__search__btn">
                    <img class="svg" src="/assets/images/icons/ic-search.svg" alt="">
                </button>
            </div>
        </div>
    </div>
    <div class="navbar__content__placeholder"></div>
    <div class="navbar__topSticky">
        <a class="btn btn-sm btn-danger btn-block @if($composer_active_popup == true) btn-loan-stop @endif" href="@if($composer_active_popup == false) https://portal.easycredit.vn/extranet/loanRequest.do @endif" title="Nhận khoản vay">
            <span>Đăng ký vay trực tuyến</span>
        </a>
        <div class="row">
            <div class="col-10">
                <a class="btn btn-sm btn-outline-primary btn-block btn-call" href="tel:{{System::content('phone','(038) 2222-9999')}}" title="Call: {{System::content('phone','(038) 2222-9999')}}">
                    <img class="icon" src="/assets/images/icons/ic-call.svg" alt="">
                    <span>{{System::content('phone','(038) 2222-9999')}}</span>
                </a>
            </div>
            <div class="col-10">
                <a class="btn btn-sm btn-outline-primary btn-block chat-script-btn" href="javascript:void(0)" title="Chat">
                    <img class="icon" src="/assets/images/icons/ic-chat.svg" alt="">
                    <span>Chat </span>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- End Header-->