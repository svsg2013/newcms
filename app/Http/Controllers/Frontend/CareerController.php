<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\TranslateUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CareerRepository;
use App\Repositories\CareerCategoryRepository;
use App\Http\Requests\Frontend\CareerApplyRequest;
use App\Models\Career;
use App\Models\Slider;
use Breadcrumb;
use Mail;

class CareerController extends Controller
{
	protected $career;
	protected $category;

	public function __construct(
		CareerRepository $career,
		CareerCategoryRepository $category)
	{
		$this->career = $career;
		$this->category = $category;
	}

    public function index(Request $request) //defaut lhc-career
    {
        // root
        Slider::setSlider('CAREERS');

        Breadcrumb::add(trans('menu.careers'), route('careers.index'));
        Breadcrumb::add(trans('menu.career_lhc'), null);

    	$array_search = $request->all();

    	$careers = $this->career->search($array_search);

        if (!empty($array_search) && is_array($array_search) && !empty($array_search['page'])) {
            unset($array_search['page']);
        }

    	$career_category = $this->category->listCareerCategory();

        return view('frontend.career.careerlhc.index',compact(
            'careers',
            'career_category',
            'array_search'
            ));
    }

    public function showLHC($slug)
    {	
        Slider::setSlider('CAREERS');

    	$careers = $this->career->findBySlug($slug);

        Breadcrumb::add(trans('menu.careers'), route('careers.index'));
        Breadcrumb::add(trans('menu.career_lhc'), route('careers.index'));
        Breadcrumb::add($careers->name, null);

    	$related = $this->career->related($careers);

    	// translation
        foreach ($careers->translations as $translation) {

            TranslateUrl::add($translation->locale, 'routes.career_lhc_show', ['slug' => $translation->slug]);
        }

    	return view('frontend.career.careerlhc.show', compact(
    		'careers',
    		'related',
            'slug'
    	));
    }

    public function apply(CareerApplyRequest $request,$page_slug, $career_slug) //CareerApplyRequest
    {
        $career = $this->career->findBySlug($career_slug);
        $input = $request->all();
        $input['career_id'] = $career->id;
        $this->career->apply($input);

        // $system_email = \System::content('contact_email', env('CONTACT_EMAIL'));

        // if ($system_email) {
        //     $input['position'] = $career->name;
        //     Mail::send('emails.career_apply', compact('input'), function ($message) use ($system_email) {
        //         $message->to($system_email)
        //             ->subject(trans('emails.new_application') . " " . date('H:i d:m:Y'));
        //     });

        //     //Send to visitor
        //     Mail::send('emails.confirm_email_apply', compact('input'), function ($message) use ($input) {
        //         $message->to($input['email'])
        //             ->subject(trans('emails.career_confirm_email') . " " . date('H:i d:m:Y'));
        //     });
        // }

        return redirect()->back()->with('success', trans('message.career_apply_success'));
    }

    public function investors()
    {
        Slider::setSlider('CAREERS');

        Breadcrumb::add(trans('menu.careers'), route('careers.index'));
        Breadcrumb::add(trans('menu.career_investors'), null);

        $careers = $this->career->listCareers()->where('employer','INVESTORS');

        return view('frontend.career.investors.index',compact('careers'));
    }

    public function showInvestors($slug)
    {
        Slider::setSlider('CAREERS');

        $careers = $this->career->findBySlug($slug);

        Breadcrumb::add(trans('menu.careers'), route('careers.index'));
        Breadcrumb::add(trans('menu.career_investors'), route('careers.index'));
        Breadcrumb::add($careers->name, null);

        $related = $this->career->related($careers);

        // translation
        foreach ($careers->translations as $translation) {

            TranslateUrl::add($translation->locale, 'routes.career_investors_show', ['slug' => $translation->slug]);
        }

        return view('frontend.career.investors.show', compact(
            'careers',
            'related',
            'slug'
        ));
    }
}
