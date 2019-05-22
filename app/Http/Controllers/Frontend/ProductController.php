<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\TranslateUrl;
use App\Http\Requests\Frontend\BookSpaceRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RegisterSightseeingRequest;
use App\Models\RegisterSight;
use App\Repositories\BookSpaceRepository;
use App\Repositories\BusinessRepository;
use App\Repositories\CountryRepository;
use App\Repositories\FreeSpaceRepository;
use App\Repositories\ProductRepository;
use App\Repositories\RegisterSightRepository;
use App\Repositories\TargetRepository;
use Breadcrumb;
use App\Models\Slider;

class ProductController extends Controller
{
    protected $product;
    protected $business;
    protected $target;
    protected $country;
    protected $free_space;
    protected $book_space;
    protected $register_sightseeing;

    public function __construct(
        ProductRepository $product,
        BusinessRepository $business,
        TargetRepository $target,
        CountryRepository $country,
        FreeSpaceRepository $free_space,
        BookSpaceRepository $book_space,
        RegisterSightRepository $register_sightseeing
    )
    {
        $this->product = $product;
        $this->business = $business;
        $this->target = $target;
        $this->country = $country;
        $this->free_space = $free_space;
        $this->book_space = $book_space;
        $this->register_sightseeing = $register_sightseeing;
    }

    public function index()
    {
        // add breadcrumb
        Breadcrumb::add(trans('product.products'));

        Slider::setSlider('PRODUCTS');
        $banner = Slider::$banner;

        $products = $this->product->listProducts()->groupBy('type');
        return view('frontend.product.index', compact('products', 'banner'));
    }

    public function show($slug)
    {
        $product = $this->product->findBySlug($slug);

        $metadata = $product->meta;

        if (!$metadata || !$metadata->title) {
            $metadata = (object)[
                'title' => $product->name,
                'description' => $product->description,
                'key_word' => 'Long Hậu, '.$product->name
            ];
        }

        if ($product->type === 'TYPE_SERVICE') {
            $products_other = $this->product->listProductsOther($product->id, null);
        } else {
            $products_other = $this->product->listProductsOther($product->id, $product->type);
        }

        // translation
        foreach ($product->translations as $translation) {
            TranslateUrl::add($translation->locale, 'routes.product_show', ['slug' => $translation->slug]);
        }

        // add breadcrumb
        Breadcrumb::add(trans('product.products'), route('product.index'));
        Breadcrumb::add($product->name);

        if ($product->type === 'TYPE_SERVICE') {
            return view('frontend.product.show_service', compact('product', 'products_other', 'metadata'));
        } else {
            return view('frontend.product.show', compact('product', 'products_other', 'metadata'));
        }
    }

    public function book()
    {
        // add breadcrumb
        Breadcrumb::add(trans('menu.investment-consultancy'), trans('routes.page_investment-consultancy'));
        Breadcrumb::add(trans('book.title'));

        Slider::setSlider('RESERVATION-REGISTER');

        $banner = Slider::$banner;

        $business = $this->business->all();
        $country = $this->country->all();
        $target = $this->target->all();
        $free_space = $this->free_space->arrTree(0);
        return view('frontend.product.book', compact('business', 'target', 'country', 'free_space', 'banner'));
    }

    public function storeBooking(BookSpaceRequest $request)
    {
        $input = $request->all();

        $this->book_space->create($input);

        session()->flash('success', trans('message.book_space_success'));

        return redirect()->back();
    }

    public function registerSightseeing()
    {
        // add breadcrumb
        Breadcrumb::add(trans('menu.investment-consultancy'), trans('routes.page_investment-consultancy'));
        Breadcrumb::add(trans('register.title'));

        Slider::setSlider('VISIT-REGISTRATION');

        $banner = Slider::$banner;

        $business = $this->business->all();
        $country = $this->country->all();
        $targets = RegisterSight::targets();
        return view('frontend.product.register', compact('business', 'targets', 'country', 'banner'));
    }

    public function storeRegisterSightseeing(RegisterSightseeingRequest $request)
    {
        $input = $request->all();

        $this->register_sightseeing->create($input);

        session()->flash('success', trans('message.register_sightseeing_success'));

        return redirect()->back();
    }
}
