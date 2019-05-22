<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\TranslateUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CatalogueRepository;
use App\Models\Catalogue;
use Breadcrumb;
use App\Models\Slider;

class CatalogueController extends Controller
{
    protected $catalogue;

    public function __construct(CatalogueRepository $catalogue)
    {
        $this->catalogue = $catalogue;
    }

    public function index()
    {
        \Breadcrumb::add(trans('menu.e-brochure'), null);

        Slider::setSlider('E-BROCHURE');
        $banner = Slider::$banner;

        $type = Catalogue::TYPE_EBROCHURE;

        $catalogues = $this->catalogue->cataloguesByType($type);

        return view('frontend.brochure.index', compact('catalogues', 'banner'));
    }

    public function show($slug)
    {
        $catalogue = $this->catalogue->findBySlug($slug);

        \Breadcrumb::add(trans('menu.e-brochure'), route('ebrochure.index'));
        \Breadcrumb::add($catalogue->name, null);

        foreach ($catalogue->translations as $translation) {
            TranslateUrl::add($translation->locale, 'routes.ebrochure_show', ['slug' => $translation->slug]);
        }

        $other = $this->catalogue->otherCatalogues($catalogue->id, $catalogue->type, $limit = 5);

        return view('frontend.brochure.show', compact('catalogue', 'other'));
    }
}
