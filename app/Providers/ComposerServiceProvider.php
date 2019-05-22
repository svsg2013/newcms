<?php

namespace App\Providers;

use App\Http\ViewComposers\GlobalComposer;
use App\Models\Page;
use App\Models\Partner;
use App\Models\System;
use App\Repositories\PartnerRepository;
use App\Repositories\PartnerRepositoryEloquent;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $locales = \LaravelLocalization::getSupportedLocales();

            $popup = \App\Models\Popup::where('code', 'LOAN_CACULATOR')->first();

            $active_popup = false;
            $content_popup = '';

            $policyPageId = System::content('cookie_policy_page','');
            $pageModel = Page::findOrFail($policyPageId);
            $policyUrl = $pageModel->getUrl();
            $policyContent = System::content('cookie_policy_content', '');
            $policyContent = str_replace(['[policy_url]','[/policy_url]'],['<a href="' . $policyUrl . '">','</a>'],$policyContent);

            if(!empty($popup)) {
                $active_popup = $popup->active_popup;
                $content_popup = $popup->content;
            }
            
            $view->with('composer_locales', $locales);
            $view->with('composer_locale', \App::getLocale());
            $view->with('composer_active_popup', $active_popup);
            $view->with('composer_content_popup', $content_popup);
            $view->with('policyContent', $policyContent);
        });

        View::composer([
            'frontend.layouts.master'
        ], GlobalComposer::class);

        // Admin permission
        View::composer([
            'admin.layouts.partials.menu',
            'admin.dashboard.index',
        ], function ($view) {
            $auth = \Auth::user();
            $value = [];
            if($auth){
                $value =  $auth->getPermissions()->pluck('slug')->toArray();
            }

            $view->with('composer_auth_permissions', $value);
        });

        View::composer([
            'frontend.layouts.partials.header'
        ], function ($view) {
            $locale = \App::getLocale();
            $menu_header = \Cache::remember("{$locale}_menu_header", CACHE_TIME, function () {
                return getHeaderHtml();
            });

            $view->with('composer_menu_header', $menu_header);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
