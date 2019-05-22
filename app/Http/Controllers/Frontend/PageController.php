<?php

namespace App\Http\Controllers\Frontend;

use App\Models\FaqCategory;
use Validator;
use App\Helper\TranslateUrl;
use App\Http\Requests\Frontend\ContactRequest;
use App\Http\Requests\Frontend\FaqsRequest;
use App\Http\Requests\Frontend\RfpRequest;
use App\Jobs\SubscribeJob;
use App\Mail\EMail;
use App\Mail\SendContactEmail;
use App\Mail\SendContactEmailConfirm;
use App\Mail\SendSubcribeToSystem;
use App\Models\Career;
use App\Models\PageBlock;
use App\Models\Ward;
use App\Models\Page;
use App\Repositories\CareerRepository;
use App\Repositories\ContactRepository;
use App\Repositories\NewsRepository;
use App\Repositories\PageRepository;
use App\Http\Controllers\Controller;
use App\Repositories\PartnerRepository;
use App\Repositories\ProductRepository;
use App\Repositories\FaqRepository;
use App\Repositories\FaqQuestionRepository;
use App\Repositories\FaqCategoryRepository;
use App\Repositories\BusinessRepository;
use App\Repositories\CountryRepository;
use App\Repositories\BrochuresRepository;
use App\Repositories\RfpRepository;
use App\Repositories\SliderRepository;
use App\Repositories\SystemRepository;
use App\Repositories\TeamRepository;
use App\Repositories\AchievementsRepository;
use App\Repositories\SharedValueRepository;
use App\Repositories\CityRepository;
use App\Repositories\SubscribeRepository;
use App\Repositories\LoanManagementRepository;
use Illuminate\Http\Request;
use Breadcrumb;
use Carbon\Carbon;
use function GuzzleHttp\default_ca_bundle;
use Mail;

# Models
use App\Models\City;
use App\Models\LoanJob;
use App\Models\Combo;
use App\Models\Document;
use App\Models\LoanGeneral;
use App\Models\LoanManagement;
use App\Models\AddressCategory;
use App\Models\Address;

class PageController extends Controller
{
    protected $page;
    protected $product;
    protected $news;
    protected $partner;
    protected $contact;
    protected $rfp;
    protected $faq;
    protected $faqquest;
    protected $faqcate;
    protected $business;
    protected $country;
    protected $achievements;
    protected $shared_value;
    protected $city;
    protected $subscribe;
    protected $loan_management;
    private $slider;
    private $brochures;
    private $team;
    private $system;
    private $career;

    public function __construct(
        PageRepository $page,
        ProductRepository $product,
        NewsRepository $news,
        PartnerRepository $partner,
        ContactRepository $contact,
        RfpRepository $rfp,
        FaqRepository $faq,
        FaqQuestionRepository $faqquest,
        FaqCategoryRepository $faqcate,
        BusinessRepository $business,
        CountryRepository $country,
        SliderRepository $slider,
        BrochuresRepository $brochures,
        TeamRepository $team,
        SystemRepository $system,
        AchievementsRepository $achievements,
        SharedValueRepository $shared_value,
        CareerRepository $career,
        CityRepository $city,
        SubscribeRepository $subscribe,
        LoanManagementRepository $loan_management
    ) {
        $this->page = $page;
        $this->product = $product;
        $this->news = $news;
        $this->partner = $partner;
        $this->contact = $contact;
        $this->rfp = $rfp;
        $this->faq = $faq;
        $this->faqquest = $faqquest;
        $this->faqcate = $faqcate;
        $this->business = $business;
        $this->country = $country;
        $this->slider = $slider;
        $this->brochures = $brochures;
        $this->team = $team;
        $this->system = $system;
        $this->achievements = $achievements;
        $this->shared_value = $shared_value;
        $this->career = $career;
        $this->city = $city;
        $this->subscribe = $subscribe;
        $this->loan_management = $loan_management;
    }

    public function index()
    {
        $page = $this->page->findBySlug('/');

        $blocks = [];

        if ($page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');
        }

        if (request()->get('debug')) {
            dd($blocks);
        }

        foreach ($page->translations as $translation) {
            TranslateUrl::addWithLink($translation->locale, "/{$translation->locale}");
        }

        $metadata = $page->meta;

        // $city = $this->city->getCity();

        $city = \App\Models\CityTranslation::orderBy('name')->where('locale', app()->getLocale())->whereHas('city', function($query) {
            $query->active();
        })->with(['city' => function($query){
            $query->active();
        }])->get();

        $city->transform(function ($value) {
            return $value['city'];
        });

        $loan_job = LoanJob::select('id', 'name')->active()->get();
        $loan_document = Document::select('id', 'name')->active()->get();
        $combo = Combo::select('id', 'name')->active()->get();
        
        if (view()->exists(THEME_PATH_VIEW . ".{$page->theme}")) {
            return view(THEME_PATH_VIEW . ".{$page->theme}", compact('page', 'blocks', 'metadata', 'city', 'loan_job', 'combo', 'loan_document'));
        }

        abort(404);
    }

    public function show($slug)
    {
        $with = [
            'translations',
            'parentBlocks',
            'parentBlocks.children',
            'meta'
        ];

        $page = $this->page->findBySlug($slug, $with);

        $blocks = [];

        if ($page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');//->toArray();
        }

        if (request()->get('debug')) {
            dd($blocks);
        }

        foreach ($page->translations as $translation) {
            $url = $translation->slug ? $translation->slug : COMING_SOON;
            TranslateUrl::addWithLink($translation->locale, "/{$translation->locale}/{$url}");
        }

        $metadata = $page->meta;

        if (!$metadata || !$metadata->title) {
            $metadata = (object)[
                'title' => $page->title,
                'description' => $page->description,
                'key_word' => '3forcom'
            ];
        }

        if ($page->parent_id) {
            $parent = $page->parent;
            if ($parent) {
                Breadcrumb::add($parent->title, $parent->url);
            }
        }

        Breadcrumb::add($page->title);

        if (view()->exists(THEME_PATH_VIEW . ".{$page->theme}")) {
            $with = [];

            if ($page->theme == 'about-our-company-achievment') {
                $achievements_top = $this->achievements->topAchievements($limit = 1, $is_top = true);

                $achievements = $this->achievements->topAchievements($is_top = false);

                $with = [
                    'achievements_top' => $achievements_top,
                    'achievements' => $achievements
                ];
            }

            if ($page->theme == 'about-our-company-csv') {
                $shared_value_top = $this->shared_value->topSharedValue($limit = 1, $is_top = true);

                $shared_value = $this->shared_value->topSharedValue($is_top = false);

                $with = [
                    'shared_value_top' => $shared_value_top,
                    'shared_value' => $shared_value
                ];
            }


            switch ($page->theme) {

                case 'join-us-workspace-meet-people':{
                    $master = $this->team->getMaster();
                    if ($master) {
                       $team = $this->team->getAll([$master->id]);
                    } else {
                        $team = $this->team->getAll();
                    }
                    $with = compact('master', 'team');
                }
                
                break;

                case 'join-us-career-opportunities':{
                    $filter = request()->all();
                    $career = $this->career->listCareers(20, $filter);
                    $count_hot = $this->career->datatable()->where('is_top', 1)->where('status','PUBLISH')->where('expired_date', '>=', Carbon::now())->count();
                    $count_new = Career::where('expired_date', '>=', Carbon::now())->where('created_at', '>=', Carbon::now()->subDays(7))->where('status','PUBLISH')->count();
                    $count_is_manager = $this->career->datatable()->where('is_manager', 1)->where('status','PUBLISH')->where('expired_date', '>=', Carbon::now())->count();

                    $city = \App\Models\CityCareerTranslation::orderBy('name')->where('locale', app()->getLocale())->whereHas('city_career', function($query) {
                        $query->active();
                    })->with(['city_career' => function($query){
                        $query->active();
                    }])->get();

                    $city->transform(function ($value) {
                        return $value['city_career'];
                    });

                    $with = compact('career', 'count_hot', 'count_new', 'count_is_manager', 'city');
                }
                
                break;

                case 'join-us-faq':{
                    $faq_category = $this->faqcate->getCategoryByType(FaqCategory::JOIN_EASYCREDIT);
                    $with = compact('faq_category');
                } 
                
                break;

                case 'join-us-news-tips':{
                    $input = request()->all();
                    if (!isset($input['type'])) {
                        $input['type'] = 2;
                    }
                    $news = $this->news->searchNews($input, 6);
                    $with = compact('news');
                } 
                
                break;

                default:
            }

            if ($page->theme == 'news-promitions') {
                $news_top = $this->news->topNews($limit = 3, $is_top = true);

                $news_video = $this->news->topNews($limit = 2, $video = true);

                $news = $this->news->topNews($is_top = false);

                $with = [
                    'news_top' => $news_top,
                    'news_video' => $news_video,
                    'news' => $news
                ];
            }

            if ($page->theme == 'news-event') {

                $news_top = $this->news->newsEvent($limit = 3, $is_top = true);

                $news_video = $this->news->newsEvent($limit = 2, $video = true);

                $news = $this->news->newsEvent($is_top = false);

                $with = [
                    'news_top' => $news_top,
                    'news_video' => $news_video,
                    'news' => $news
                ];
            }

            if ($page->theme == 'solution-cash-loan') {
                // $city = $this->city->getCity();

                $city = \App\Models\CityTranslation::orderBy('name')->where('locale', app()->getLocale())->whereHas('city', function($query) {
                    $query->active();
                })->with(['city' => function($query){
                    $query->active();
                }])->get();

                $city->transform(function ($value) {
                    return $value['city'];
                });

                $loan_job = LoanJob::select('id', 'name')->active()->get();
                $loan_document = Document::select('id', 'name')->active()->get();
                $combo = Combo::select('id', 'name')->active()->get();

                $with = [
                    'city' => $city,
                    'loan_job' => $loan_job,
                    'loan_document' => $loan_document,
                    'combo' => $combo
                ];
            }

            if ($page->theme == 'customer-disbursement') {
                
                $locale = \App::getLocale();

                $address_category = "SELECT address_category.id as id, address_category_translation.name as name
                        FROM address_category
                        INNER JOIN address_category_translation
                        ON address_category.id = address_category_translation.address_category_id
                        AND address_category_translation.locale = '{$locale}'
                        WHERE address_category.type LIKE '%GET_DISBURSEMENTS%'
                        GROUP BY address_category.id
                        ";

                $address_category = \DB::select($address_category);

                $with = [
                    'address_category' => $address_category
                ];
                
            }

            if ($page->theme == 'customer-payment-method') {
                
                $locale = \App::getLocale();

                $address_category = "SELECT address_category.id as id, address_category_translation.name as name
                        FROM address_category
                        INNER JOIN address_category_translation
                        ON address_category.id = address_category_translation.address_category_id
                        AND address_category_translation.locale = '{$locale}'
                        WHERE address_category.type LIKE '%PAYMENT_METHOD%'
                        GROUP BY address_category.id
                        ";

                $address_category = \DB::select($address_category);

                $with = [
                    'address_category' => $address_category
                ];
                
            }

            if ($page->theme == 'customer-faq') {
                $faq_category = $this->faqcate->getCategoryByType('FOR_CUSTOMERS');

                $with = [
                    'faq_category' => $faq_category
                ];
            }

            return view(THEME_PATH_VIEW . ".{$page->theme}", compact('page', 'blocks', 'metadata', 'slug'))->with($with);
        }

        abort(404);
    }

    public function showTest($slug = 'co-hoi-nghe-nghiep')
    {
        $with = [
            'translations',
            'parentBlocks',
            'parentBlocks.children',
            'meta'
        ];

        $page = $this->page->findBySlug($slug, $with);

        $blocks = [];

        if ($page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');//->toArray();
        }

        if (request()->get('debug')) {
            dd($blocks);
        }

        foreach ($page->translations as $translation) {
            $url = $translation->slug ? $translation->slug : COMING_SOON;
            TranslateUrl::addWithLink($translation->locale, "/{$translation->locale}/{$url}");
        }

        $metadata = $page->meta;

        if (!$metadata || !$metadata->title) {
            $metadata = (object)[
                'title' => $page->title,
                'description' => $page->description,
                'key_word' => '3forcom'
            ];
        }

        if ($page->parent_id) {
            $parent = $page->parent;
            if ($parent) {
                Breadcrumb::add($parent->title, $parent->url);
            }
        }

        Breadcrumb::add($page->title);

        if (view()->exists(THEME_PATH_VIEW . ".{$page->theme}")) {
            $with = [];

            switch ($page->theme) {
                case 'join-us-career-opportunities':{
                    $filter = request()->all();
                    $career = $this->career->listCareers(20, $filter);
                    $count_hot = $this->career->datatable()->where('is_top', 1)->where('status','PUBLISH')->where('expired_date', '>=', Carbon::now())->count();
                    $count_new = Career::where('expired_date', '>=', Carbon::now())->where('created_at', '>=', Carbon::now()->subDays(7))->where('status','PUBLISH')->count();
                    $count_is_manager = $this->career->datatable()->where('is_manager', 1)->where('status','PUBLISH')->where('expired_date', '>=', Carbon::now())->count();

                    $city = \App\Models\CityCareerTranslation::orderBy('name')->where('locale', app()->getLocale())->whereHas('city_career', function($query) {
                        $query->active();
                    })->with(['city_career' => function($query){
                        $query->active();
                    }])->get();

                    $city->transform(function ($value) {
                        return $value['city_career'];
                    });

                    $with = compact('career', 'count_hot', 'count_new', 'count_is_manager', 'city');
                }
                break;
                default:
            }
            return view(THEME_PATH_VIEW . ".join-us-career-opportunities-test", compact('page', 'blocks', 'metadata', 'slug'))->with($with);
        }
        abort(404);
    }

    public function subscribe()
    {
        $email = request()->input('email');
        $this->dispatch(new SubscribeJob($email));
        if (request()->isJson() || request()->wantsJson() || request()->ajax()) {
            return restSuccess(trans('message.subscribe_success'));
        }
        return redirect()->back()->with('success', trans('message.subscribe_success'));
    }

    public function urlSubscribe(Request $request)
    {
        
        $input = $request->only('email', 'type');

        $validator = Validator::make($request->all(), [
            "email"        => "required|email"
        ]);
        
        if ($validator->fails()) {
            return restFail($validator->errors());
        }

        if ($this->subscribe->create($input)) {

            $locale = \App::getLocale();

            $email_receive_subcribe = \System::content('email_subcribe', 'career@easycredit.vn');

            \Mail::send('emails.contact2subcribe', compact('input'), function ($message) use ($email_receive_subcribe) {
                $message->to($email_receive_subcribe)->subject("Contact message received at " . date('H:i d:m:Y'));
            });
            
            return restSuccess();
        }

        return restFail();
    }

    public function storeContact(ContactRequest $request)
    {
        $input = $request->all();

        $this->contact->create($input);

        $system_email = \System::content('contact_email', env('CONTACT_EMAIL'));

        $input_email = $input['email'];

        //Send to visitor
        \Mail::send('emails.contact2visitor', compact('input'), function ($message) use ($input_email) {
            $message->to($input_email)->subject("Contact message received at " . date('H:i d:m:Y'));
        });

        if ($system_email) {
            //Send to admin
            \Mail::send('emails.contact2admin', compact('input'), function ($message) use ($system_email) {
                $message->to($system_email)->subject("Contact message received at " . date('H:i d:m:Y'));
            });
        }

        return redirect()->back()->with('success', trans('message.contact_sent_success'));
    }

    public function storeRfp(RfpRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('file_name')) {
            $file = $request->file('file_name');
            $file_name = date('dmY-His-') . $file->getClientOriginalName();
            $file->move(public_path('rfp'), $file_name);
            $input['file_name'] = $file_name;
        }
        $input['solution'] = implode(';;', $request->get('solution'));
        $this->rfp->create($input);
        session()->flash('success', trans('message.rfp_sent_success'));
        return redirect()->back();
    }

    public function faqs()
    {
        Breadcrumb::add(trans('menu.investment-consultancy'), trans('routes.page_investment-consultancy'));
        // add breadcrumb
        Breadcrumb::add(trans('menu.faqs'));

        $main_cate = $this->faqcate->faqs()->first();

        $other_cate = $this->faqcate->faqs()->where('id', '<>', $main_cate->id);

        return view('frontend.faqs', compact('main_cate', 'other_cate'));
    }

    public function storeFaqquest(FaqsRequest $request)
    {
        $input = $request->all();

        $this->faqquest->create($input);

        $system_email = \System::content('contact_email', env('CONTACT_EMAIL'));

        if ($system_email) {
            Mail::send('emails.question_customer', compact('input'), function ($message) use ($system_email) {
                $message->to($system_email)
                    ->subject(trans('emails.new_contact_email') . " " . date('H:i d:m:Y'));
            });
        }

        session()->flash('success', trans('message.request_faqs_sent_success'));

        return redirect()->back();
    }

    public function joinUsWhy($page_slug, $bolck_slug, $page_id)
    {
        $page = $this->page->findBySlug($page_slug);
        $blocks = [];
        if ($page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');
        }

        $page_block = PageBlock::find($page_id);

        return view('themes.join-us-workspace-why-easy-credit-detail', compact('page_block', 'blocks', 'page'));
    }

    public function getCareerDetail($page_slug, $career_slug)
    {
        $page = $this->page->findBySlug($page_slug);
        $blocks = [];
        if ($page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');
        }

        $career = $this->career->findBySlug($career_slug);

        if ($page->parent_id) {
            $parent = $page->parent;
            if ($parent) {
                Breadcrumb::add($parent->title, $parent->url);
            }
        }
        Breadcrumb::add($page->title);
        return view('themes.apply-career', compact('blocks', 'career', 'page_slug', 'career_slug'));
    }

    public function getCareerPageDetail($page_slug, $career_slug)
    {
        $page = $this->page->findBySlug($page_slug);
        $blocks = [];
        if ($page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');
        }

        $career = $this->career->findBySlug($career_slug);

        if ($page->parent_id) {
            $parent = $page->parent;
            if ($parent) {
                Breadcrumb::add($parent->title, $parent->url);
            }
        }
        Breadcrumb::add($page->title);
        return view('themes.career-page-detail', compact('blocks', 'career', 'page_slug', 'career_slug'));
    }

    public function searchNewsPromitions(Request $request, $slug)
    {
        $with = [
            'translations',
            'parentBlocks',
            'parentBlocks.children',
            'meta'
        ];

        $page = $this->page->findBySlug($slug, $with);

        $blocks = [];

        if ($page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');//->toArray();
        }

        if (request()->get('debug')) {
            dd($blocks);
        }

        foreach ($page->translations as $translation) {
            $url = $translation->slug ? $translation->slug : COMING_SOON;
            TranslateUrl::addWithLink($translation->locale, "/{$translation->locale}/{$url}");
        }

        $metadata = $page->meta;

        if (!$metadata || !$metadata->title) {
            $metadata = (object)[
                'title' => $page->title,
                'description' => $page->description,
                'key_word' => '3forcom'
            ];
        }

        if ($page->parent_id) {
            $parent = $page->parent;
            if ($parent) {
                Breadcrumb::add($parent->title, $parent->url);
            }
        }

        Breadcrumb::add($page->title);

        if (view()->exists(THEME_PATH_VIEW . ".{$page->theme}")) {
            $with = [];

            if ($page->theme == 'news-promitions') {
                $news_top = $this->news->topNews($limit = 3, $is_top = true);

                $news_video = $this->news->topNews($limit = 2, $video = true);

                $news = $this->news->topNews($is_top = false);

                $with = [
                    'news_top' => $news_top,
                    'news_video' => $news_video,
                    'news' => $news
                ];
            }

            $input = $request->only('key');

            $result = $this->news->searchNewsPromitions($input['key']);

            return view(THEME_PATH_VIEW . ".{$page->theme}", compact('page', 'blocks', 'metadata', 'slug', 'result'))->with($with);
        }

        return view('themes.apply-career', compact('page', 'blocks', 'career'));
    }

    public function getWard(Request $request)
    {
        $district_id = $request->get('district_id');
        return Ward::where('district_id', $district_id)->get()->map(function ($item) {
            $intval = intval($item->name);
            return [
                'id'=>$item->id,
                'name'=>$intval ? "Phường $intval" : $item->name
            ];
        });
    }

    public function urlJob(Request $request)
    {
        $data = $request->only('value_job', 'value_combo');
        
        $loan_job = LoanJob::find($data['value_job']);

        $combo = Combo::find((int)$data['value_combo']);
        
        $loan_income_type_id = null;
        if (count($combo)) {
            $loan_income_type_id = $combo->loan_income_type_id;
        }

        $loan_general = LoanGeneral::where('loan_job_id', $loan_job->id)->where('loan_income_type_id', $loan_income_type_id)->first();

        $loan_setting = null;
        if (count($loan_general)) {
            $loan_setting = $loan_general->loanSetting;
        }

        return restSuccess('Data', $loan_setting, 200);
    }

    public function urlLoan(Request $request)
    {
        // Message Validation
        $messsages = array(
            'job.required'          => 'Công việc hiện tại',
            'documents.required'    => 'Giấy tờ có thể cung cấp',
            'name.required'         => 'Họ và tên',
            'phone.required'        => 'Số điện thoại',
            'city.required'         => 'Tỉnh/Thành phố',
        );

        // Validation
        $validator = Validator::make($request->all(), [
            "job"           => "required",
            "documents"     => "required",
            "money"         => "required",
            "month"         => "required",
            "name"          => "required",
            "phone"         => "required|regex:/^\+?[^a-zA-Z]{5,}$/",
            "city"          => "required"
        ], $messsages);
        
        if ($validator->fails()) {
            return restFail($validator->errors());
        }

        $input = $request->all();

        $pay = calculatorLoan($input['money'], $input['interest_rate'], $input['month'], $input['coefficient']);

        $lead_id = $this->getLeadID();

        $data = [
            'name'              => $input['name'],
            'phone'             => $input['phone'],
            'email'             => $input['email'],
            'city_id'           => $input['city'],
            'job_id'            => $input['job'],
            'combo_id'          => $input['documents'],
            'duration'          => $input['month'],
            'amount'            => $input['money'],
            'monthly_payment'   => $pay,
            'lead_id'           => $lead_id,
            'status'            => $input['status']
        ];

        $inputCheckLead = [
            'partner_code' => $input['partner_code'],
            'phone_number' => $input['phone'],
            'identity_card_id' => ''
        ];

        $inputApi = [
            "partner_code"      => $input['partner_code'],
            "phone_number"      => $input['phone'],
            "identity_card_id"  => "",
            "customer_name"     => $input['name'],
            "province"          => !empty(City::find($input['city'])) ? City::find($input['city'])->name : '',
            "phone_number2"     => "",
            "customer_address"  => !empty(City::find($input['city'])) ? City::find($input['city'])->name : '',
            "product_code"      => "CL",
            "source"            => "ECL",
            "score_range"       => "0-0",
            "monthly_income"    => "",
            "ts_lead_id"        => $lead_id,
            "other_data"        => [
                "email"             => $input['email'],
            ]
        ];

        $token = getAPi();

        return $this->loan_management->ApiRequestCreate($token, $data, $inputApi, $inputCheckLead);
    }

    public function urlLoanNotApi(Request $request)
    {
        // Message Validation
        $messsages = array(
            'job.required'          => 'Công việc hiện tại',
            'documents.required'    => 'Giấy tờ có thể cung cấp',
            'name.required'         => 'Họ và tên',
            'phone.required'        => 'Số điện thoại',
            'city.required'         => 'Tỉnh/Thành phố',
        );

        // Validation
        $validator = Validator::make($request->all(), [
            "job"           => "required",
            "documents"     => "required",
            "money"         => "required",
            "month"         => "required",
            "name"          => "required",
            "phone"         => "required|regex:/^\+?[^a-zA-Z]{5,}$/",
            "city"          => "required"
        ], $messsages);
        
        if ($validator->fails()) {
            return restFail($validator->errors());
        }

        $input = $request->all();

        $pay = calculatorLoan($input['money'], $input['interest_rate'], $input['month'], $input['coefficient']);

        $lead_id = $this->getLeadID();

        $data = [
            'name'              => $input['name'],
            'phone'             => $input['phone'],
            'email'             => $input['email'],
            'city_id'           => $input['city'],
            'job_id'            => $input['job'],
            'combo_id'          => $input['documents'],
            'duration'          => $input['month'],
            'amount'            => $input['money'],
            'monthly_payment'   => $pay,
            'lead_id'           => $lead_id,
            'status'            => $input['status']
        ];

        // Limit the number of requests
        if (count(LoanManagement::where('phone', $input['phone'])->get()) <= 10) {
            LoanManagement::create($data);
        }

        return restSuccess();
    }

    private function getLeadID()
    {
        $lead_id = str_random(15);

        while (!empty(LoanManagement::where('lead_id', $lead_id)->first())) { // Nếu đã tồn tại trong table thì mới tạo lead_id khác
            $lead_id = str_random(15);
        }

        return $lead_id;
    }

    public function urlGetCombo(Request $request)
    {
        $input = $request->all();

        $id_job = $input['job_val_get_combo'];

        $job = LoanJob::findOrFail($id_job);

        // Get document unique id from combo collection
        $combo_id = $job->combos->pluck('id')->toArray();
        $id_document = \DB::table('document_combo')->whereIn('combo_id', $combo_id)->get()->pluck('document_id')->toArray();
        $id_document = array_unique($id_document);

        // Combo, Document of combo collection
        $combo = $job->combos;
        $document = Document::whereIn('id', $id_document)->get();

        $thead = '';
        $tbody = '';
        $button = '';
        if (!empty($combo)) {
            foreach ($combo as $key) {
                $thead .= '<th>'. $key->name . '</th>';
                $button .= '<td>
                                <div class="btn-wrap">
                                    <button class="btn btn-primary btn-sm btn-shadow choose_doc" data-val="'. $key->id .'">Chọn</button>
                                </div>
                            </td>';
            }
        }
        

        if (!empty($document) && !empty($combo)) {
            foreach ($document as $key) {
                $tbody .= '<tr>
                                <th>'. $key->name .'</th>';
                    
                foreach ($combo as $key2) {
                    $tbody .= '<td>';
                    $array_document = $key2->documents->pluck('id')->toArray();
                    if (in_array($key->id, $array_document)) {
                        $tbody .= '<img src="/assets/images/logo-small.svg" alt="">';
                    }
                    $tbody .= '</td>';
                }
                $tbody .= '</tr>';
            }
        }

        $html = '<table>
                    <thead>
                        <tr>
                            <th>Giấy tờ hợp lệ</th>
                            '. $thead .'
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            '. $tbody .'
                        </tr>
                        
                        <tr class="button">
                            <th></th>
                            '. $button .'
                        </tr>
                    </tbody>
                </table>';

        return $html;
    }

    public function search(Request $request)
    {
        $page_with_theme = Page::where('theme', 'search-result')->first();

        $slug = !empty($page_with_theme) ? $page_with_theme->slug : '';

        $input = $request->only('keyword');

        $keyword = $input['keyword'];

        $with = [
            'translations',
            'parentBlocks',
            'parentBlocks.children',
            'meta'
        ];

        $page = $this->page->findBySlug($slug, $with);

        $blocks = [];

        if ($page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');//->toArray();
        }

        if (request()->get('debug')) {
            dd($blocks);
        }

        foreach ($page->translations as $translation) {
            $url = $translation->slug ? $translation->slug : COMING_SOON;
            TranslateUrl::addWithLink($translation->locale, "/{$translation->locale}/{$url}");
        }

        $metadata = $page->meta;

        if (!$metadata || !$metadata->title) {
            $metadata = (object)[
                'title' => $page->title,
                'description' => $page->description,
                'key_word' => $page->title
            ];
        }

        if ($page->parent_id) {
            $parent = $page->parent;
            if ($parent) {
                Breadcrumb::add($parent->title, $parent->url);
            }
        }

        Breadcrumb::add($page->title);

        if (view()->exists(THEME_PATH_VIEW . ".{$page->theme}")) {
            $with = [];

            if ($page->theme == 'search-result') {
                $result = $this->page->search($keyword);
                $result_paginate = $this->page->search($keyword, $paginate = 10);

                $with = [
                    'result' => $result,
                    'result_paginate' => $result_paginate
                ];
            }

            return view(THEME_PATH_VIEW . ".{$page->theme}", compact('page', 'blocks', 'metadata', 'slug', 'result', 'keyword'))->with($with);
        }
    }

    public function searchFAQ(Request $request)
    {
        $page_with_theme = Page::where('theme', 'customer-faq')->first();

        $slug = !empty($page_with_theme) ? $page_with_theme->slug : '';

        $input = $request->only('keyword');

        $keyword = $input['keyword'];

        $with = [
            'translations',
            'parentBlocks',
            'parentBlocks.children',
            'meta'
        ];

        $page = $this->page->findBySlug($slug, $with);

        $blocks = [];

        if ($page->parentBlocks->count()) {
            $blocks = $page->parentBlocks->groupBy('code');//->toArray();
        }

        if (request()->get('debug')) {
            dd($blocks);
        }

        foreach ($page->translations as $translation) {
            $url = $translation->slug ? $translation->slug : COMING_SOON;
            TranslateUrl::addWithLink($translation->locale, "/{$translation->locale}/{$url}");
        }

        $metadata = $page->meta;

        if (!$metadata || !$metadata->title) {
            $metadata = (object)[
                'title' => $page->title,
                'description' => $page->description,
                'key_word' => $page->title
            ];
        }

        if ($page->parent_id) {
            $parent = $page->parent;
            if ($parent) {
                Breadcrumb::add($parent->title, $parent->url);
            }
        }

        Breadcrumb::add($page->title);

        if (view()->exists(THEME_PATH_VIEW . ".{$page->theme}")) {
            $with = [];

            if ($page->theme == 'customer-faq') {
                $result = $this->faq->searchFAQ($keyword);
                $result_paginate = $this->faq->searchFAQ($keyword, $paginate = 10);

                $with = [
                    'result' => $result,
                    'result_paginate' => $result_paginate
                ];
            }

            return view(THEME_PATH_VIEW . ".{$page->theme}", compact('page', 'blocks', 'metadata', 'slug', 'keyword'))->with($with);
        }
    }
}
