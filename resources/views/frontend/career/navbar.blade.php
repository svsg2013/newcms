<ul class="nav nav-tabs" role="tablist">
    <li class="{{ Request::url() === route('frontend.career_lhc') || Request::url() === route('careers.index')  ? 'active' :'' }}">
	   <a  href="{{ route('frontend.career_lhc') }}" title="{{ trans('f_career.lhc') }}" >{{ trans('f_career.lhc') }}</a>
    </li>
    <li class="{{ Request::url() === route('frontend.investors') ? 'active' :'' }}">
        <a href="{{ route('frontend.investors') }}" title="{{ trans('f_career.investors') }}">{{ trans('f_career.investors') }}</a>
    </li>
    <li class="{{ Request::url() != route('frontend.investors') && Request::url() != route('frontend.career_lhc') && Request::url() != route('careers.index') ? 'active' :'' }}">
        <a href="{{ trans('routes.career_inviroment') }}" title="{{ trans('f_career.enviroment') }}">{{ trans('f_career.enviroment') }}</a>
    </li>
</ul>