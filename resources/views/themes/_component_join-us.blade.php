@include('themes.partials.breadcrumb')

<section class="joinCulture" id="join">
    <div class="container">
        <div class="joinCulture__content">
            <ul class="nav-link">
                <li class="{{$active_tab == 1 ? 'active' : ''}}"><a href="{{getPageUrlByCode('JOIN-US-WORKSPACE-CULTURE')}}">VĂN HÓA EASY CREDIT</a></li>
                <li class="{{$active_tab == 2 ? 'active' : ''}}"><a href="{{getPageUrlByCode('JOIN-US-WORKSPACE-WHY-EASY-CREDIT')}}">LÝ DO GIA NHẬP EASY CREDIT</a></li>
                <li class="{{$active_tab == 3 ? 'active' : ''}}"><a href="{{getPageUrlByCode('JOIN-US-WORKSPACE-MEET-PEOPLE')}}">CON NGƯỜI TẠI EASY CREDIT </a></li>
            </ul>

            {{$slot}}

            <div class="group-link text-center"><a class="btn btn-danger btn-lg" href="{{ !empty(\App\Models\PageBlock::where('code', 'JOIN-US-WORKSPACE-CULTURE-URL')->first()) ? \App\Models\PageBlock::where('code', 'JOIN-US-WORKSPACE-CULTURE-URL')->first()->url : '' }}">GIA NHẬP NGAY</a></div>
        </div>
    </div>
</section>

@include('themes.partials.register_career')