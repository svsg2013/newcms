<?php
Route::get('remove-cache', function(){
    removeAllConfig();
    echo 'removed all caching';
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            #'localeSessionRedirect',
            'localizationRedirect',
            #'csrfTokenCheck'
        ]
    ],
    function () {

        Route::get('/', 'PageController@index')->name('page.home');

        // Route::get('qwertyuiop', 'PageController@showTest');
        
        Route::get('area/wards','PageController@getWard')->name('frontend.get_ward');

        Route::get('{page_slug}/{block_slug}.{page_id}.html','PageController@joinUsWhy')->name('frontend.join_us_why_detail');
        Route::get('{page_slug}/{career_slug}.html','PageController@getCareerDetail')->name('frontend.get_career_detail');
        Route::get(LaravelLocalization::transRoute('routes.career_page_detail'),'PageController@getCareerPageDetail')->name('frontend.get_career_page_detail');
        Route::post('{page_slug}/{career_slug}/career/apply','CareerController@apply')->name('frontend.post_career_apply');
        Route::get('team/information','TeamController@getTeamInfo')->name('frontend.get_team');

        // Loans
        Route::post('url-job', 'PageController@urlJob')->name('url.job');
        Route::post('url-doc', 'PageController@urlJob')->name('url.doc');
        Route::post('url-loan', 'PageController@urlLoan')->name('url.loan');
        Route::post('url-loan-not-api', 'PageController@urlLoanNotApi')->name('url.loan.not.api');
        Route::post('url-get-combo', 'PageController@urlGetCombo')->name('url.get.combo');
        Route::post('url-subscribe', 'PageController@urlSubscribe')->name('url.subscribe');

        Route::get('{page_slug}/news/{news_slug}.html','NewsController@getNewsDetail')->name('frontend.get_news_detail');

        // Route::post('subscribe/create', 'PageController@subscribe')->name('subscribe.create');
        Route::post('contact', 'PageController@storeContact')->name('page.storeContact');
        Route::post('send-rfp', 'PageController@storeRfp')->name('page.storeRfp');
        Route::get('search-faq', 'PageController@searchFAQ')->name('search.faq');
        Route::get('search-news-promitions/{slug}', 'PageController@searchNewsPromitions')->name('frontend.search.news.promitions');
        Route::post('loan-signin', 'LoanManagementController@loanSignin')->name('loan.signin.post');

        Route::get(LaravelLocalization::transRoute('routes.product_index'), 'ProductController@index')->name('product.index');
        Route::get(LaravelLocalization::transRoute('routes.product_show'), 'ProductController@show')->name('product.show');
        Route::get(LaravelLocalization::transRoute('routes.product_book'), 'ProductController@book')->name('product.book');

        Route::post('book-space', 'ProductController@storeBooking')->name('product.storeBooking');

        Route::get(LaravelLocalization::transRoute('routes.product_register'), 'ProductController@registerSightseeing')->name('product.register');
        Route::post('register-sightseeing', 'ProductController@storeRegisterSightseeing')->name('product.storeRegisterSightseeing');

        /***************
         * Truyền thông
         */
        // Gallery-thu-vien-anh -uu tien truoc tin tuc
        Route::get(LaravelLocalization::transRoute('routes.library_photo'), 'GalleryController@photos')->name('library_photo.index');
        Route::get(LaravelLocalization::transRoute('routes.library_photo_show'), 'GalleryController@showPhoto')->name('library_photo.show');

        // Gallery-thu-vien-videos
        Route::get(LaravelLocalization::transRoute('routes.video_clip'), 'GalleryController@videos')->name('video_clip.index');
        Route::get(LaravelLocalization::transRoute('routes.video_clip_show'), 'GalleryController@showVideo')->name('video_clip.show');

        // Cap-nhat-tai-lieu-phap-ly
        Route::get(LaravelLocalization::transRoute('routes.legal_documents'), 'NewsController@legaldocuments')->name('legaldocuments');
        Route::get(LaravelLocalization::transRoute('routes.legal_documents_show'), 'NewsController@showlegal')->name('legaldocuments.show');

        // Tin-tuc-phai-sau-dat-gallary
        // Route::get(trans('routes.page_news_detail'), 'NewsController@show')->name('news.show');

        // Route::get(trans('routes.page_resources_show'), 'ResourceController@show')->name('resource.show');

        // Route::get(LaravelLocalization::transRoute('routes.faqs'), 'PageController@faqs')->name('frontend.faqs');
        // Route::post('faqquest', 'PageController@storeFaqquest')->name('page.storeFaqquest');

        // Catalogue
        Route::get(LaravelLocalization::transRoute('routes.ebrochure'), 'CatalogueController@index')->name('ebrochure.index');
        Route::get(LaravelLocalization::transRoute('routes.ebrochure_show'), 'CatalogueController@show')->name('ebrochure.show');

        // Tuyen-dung
        Route::get(LaravelLocalization::transRoute('routes.career_index'), 'CareerController@index')->name("careers.index"); //mac dinh cho vao lhc
        Route::get(LaravelLocalization::transRoute('routes.career_lhc'), 'CareerController@index')->name("frontend.career_lhc");
        Route::get(LaravelLocalization::transRoute('routes.career_lhc_show'), 'CareerController@showLHC')->name("frontend.career_lhc.show");
        Route::post('/careers/apply', 'CareerController@apply')->name("frontend.career.apply");

        Route::get(LaravelLocalization::transRoute('routes.career_investors'), 'CareerController@investors')->name("frontend.investors");
        Route::get(LaravelLocalization::transRoute('routes.career_investors_show'), 'CareerController@showInvestors')->name("frontend.investors.show");

        Route::get(LaravelLocalization::transRoute('routes.coming_soon'), function (){
            return view('frontend.coming');
        })->name('page.coming_soon');

        Route::get(LaravelLocalization::transRoute('routes.achievements'), 'AchievementsController@show')->name("frontend.achievements.show");
        Route::get(LaravelLocalization::transRoute('routes.shared_value'), 'SharedValueController@show')->name("frontend.shared.value.show");
        Route::get(LaravelLocalization::transRoute('routes.news_promitions'), 'NewsPromitionsController@show')->name("frontend.news.promitions.show");
        Route::get(LaravelLocalization::transRoute('routes.news'), 'NewsPromitionsController@showNews')->name("frontend.news.show");

        Route::get(LaravelLocalization::transRoute('routes.landing.partner.detail'), 'LandingPartnerController@show')->name('landing_partner');

        Route::get('/dang-ky-thanh-cong', 'LandingIndexController@thankYou')->name('landing.index.thank_you');
        Route::get('/khong-dang-ky', 'LandingIndexController@failed')->name('landing.index.failed');
        Route::post('/action', 'LandingAjaxController@store')->name('landing.action');
        Route::post('/actionValidate', 'LandingAjaxController@registerValidate')->name('landing.action.validate');
        Route::post('/registerWithOutOTP', 'LandingAjaxController@registerWithOutOTP')->name('landing.register_without_send_otp');
        Route::post('/validatePhone', 'LandingAjaxController@validatePhone')->name('landing.validatePhone');
        Route::get('landing/ajax/careers.html', 'LandingAjaxController@career')->name('landing.ajax.careers');
        Route::get('landing/ajax/loan.html', 'LandingAjaxController@loan')->name('landing.ajax.loan');

        Route::get('search', 'PageController@search')->name('page.search');
        Route::get('{slug}', 'PageController@show')->name('page.show')->where('slug', '(.*)?');

    });