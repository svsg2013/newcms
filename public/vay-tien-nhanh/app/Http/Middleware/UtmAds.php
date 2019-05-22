<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class UtmAds
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
		if($request->has('utm_source')){
			Session::put('utmsource', $request->input('utm_source'));
		}
		if($request->has('utm_medium')){
			Session::put('utmmedium', $request->input('utm_medium'));
		}
		if($request->has('utm_campaign')){
			Session::put('utmcampaign', $request->input('utm_campaign'));
		}
		if($request->has('utm_content')){
			Session::put('utmcontent', $request->input('utm_content'));
		}
        return $next($request);
    }
}
