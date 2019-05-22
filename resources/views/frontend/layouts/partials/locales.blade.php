<ul class="navbar-language pull-right">
@php $route_translation = TranslateUrl::$locales; @endphp
@if(count($route_translation))
    @foreach($composer_locales as $localeCode => $properties)
        @continue($localeCode == $composer_locale || $localeCode == 'ko' || $localeCode == 'ja')
        <li><a rel="alternate" hreflang="{{ $localeCode }}" href="{{ $route_translation[$localeCode] }}" title="{{ $localeCode }}" style="background-image: url(/assets/images/flag-{{ $localeCode }}.png)"><img src="/assets/images/flag-{{ $localeCode }}.png" alt="{{ $localeCode }}"></a></li>
    @endforeach
@else
    @foreach($composer_locales as $localeCode => $properties)
        @continue($localeCode == $composer_locale || $localeCode == 'ko' || $localeCode == 'ja')
        <li><a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" title="{{ $localeCode }}" style="background-image: url(/assets/images/flag-{{ $localeCode }}.png)"><img src="/assets/images/flag-{{ $localeCode }}.png" alt="{{ $localeCode }}"></a></li>
    @endforeach
@endif
</ul>