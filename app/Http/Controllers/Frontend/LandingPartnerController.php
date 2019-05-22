<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\LandingCareer;
use App\Models\LandingDistrict;
use App\Models\LandingIncome;
use App\Models\LandingPartner;

class LandingPartnerController extends Controller
{
    public function show($partner_code)
    {
        $partner = LandingPartner::with([
            'templateData'
        ])->where('campaign_source', $partner_code)->firstOrFail();
        $template_code = strtolower($partner->template_code);
        $view = "frontend/landing_templates/{$template_code}";
        if ($template_code == 'template-02' || !view()->exists($view)) {
            abort(404);
        }
        $districts = LandingDistrict::orderBy('isorder')->get();
        $incomes = LandingIncome::orderBy('isorder')->get();
        $careers = LandingCareer::get();
        return view($view, compact(
            'partner',
            'districts',
            'incomes',
            'careers'
        ));
    }
}