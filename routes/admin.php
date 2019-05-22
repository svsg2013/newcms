<?php
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect']
    ],
    function () {
        Route::group(["prefix" => "admin"], function () {

            Auth::routes();

            Route::group(['middleware' => ['auth', "permission:admin.index"]], function () {

                Route::get('/', 'DashboardController@index')->name("admin.dashboard.index")->middleware("permission:admin.index");

                // Products
                Route::put('products/{id}/sort-photo', 'ProductController@sortPhoto')->name("admin.product.photo.sort")->middleware("permission:admin.product.edit");

                Route::get('products/create/load-block', 'ProductController@loadBlock')->name("admin.product.load.block")->middleware("permission:admin.product.create", 'permission:admin.product.edit');

                resourceAdmin('products', 'ProductController', 'product');

                resourceAdmin('news-categories', 'NewsCategoryController', 'news_category', 'news.category');

                resourceAdmin('news', 'NewsController', 'news');

                resourceAdmin('achievements', 'AchievementsController', 'achievements');

                resourceAdmin('shared-value', 'SharedValueController', 'shared.value');

                resourceAdmin('city', 'CityController', 'city');

                resourceAdmin('career-city', 'CityCareerController', 'city.career');

                resourceAdmin('menu', 'MenuController', 'menu');

                resourceAdmin('menu-item', 'MenuItemController', 'menu.item');
                Route::get('get-theme', 'MenuItemController@getTheme')->name('get.theme');
                Route::post('menu-item-sort', 'MenuItemController@sort')->name('admin.menu.item.sort');

                resourceAdmin('brochures', 'BrochuresController', 'brochures');

                resourceAdmin('combo', 'ComboController', 'combo');

                resourceAdmin('document', 'DocumentController', 'document');

                resourceAdmin('loan-setting', 'LoanSettingController', 'loan.setting');

                resourceAdmin('loan-job', 'LoanJobController', 'loan.job');

                resourceAdmin('loan-income-type', 'LoanIncomeTypeController', 'loan.income.type');

                resourceAdmin('loan-management', 'LoanManagementController', 'loan.management');
                Route::get('loan-management-export-excel', 'LoanManagementController@exportExcel')->name('loan.management.export.excel');

                resourceAdmin('address-category', 'AddressCategoryController', 'address.category');

                resourceAdmin('address', 'AddressController', 'address');
                Route::post('address/import', 'AddressController@import')->name('admin.address.import')->middleware("permission:admin.address.import");

                // Career
                Route::group(['prefix' => 'careers'], function () {
                    Route::get('application-list', 'CareerController@application')->name("admin.career.application")->middleware("permission:admin.career.application");
                    Route::get('application-list-datatable', 'CareerController@applicationDatatable')->name("admin.career.application.datatable")->middleware("permission:admin.career.application");
                    Route::get('application-export-excel', 'CareerController@exportExcel')->name('application.export.excel');

                    resourceAdmin('categories', 'CareerCategoryController', 'career_category', 'career');
                    resourceAdmin('levels', 'CareerLevelController', 'career_level', 'career');
                });

                resourceAdmin('careers', 'CareerController', 'career');

                // Contact
                resourceAdmin('contacts', 'ContactController', 'contact', 'contact', ['show', 'edit', 'create']);

                // Subscribe
                resourceAdmin('subscribes', 'SubscribeController', 'subscribe', 'subscribe', ['show', 'create']);
                Route::post('update-active-subscribe', 'SubscribeController@updateActiveSubscribe')->name('update.active.subscribe');
                Route::get('subcriber-export-excel', 'SubscribeController@exportExcel')->name('subcriber.export.excel');

                // Rfp
                resourceAdmin('rfps', 'RfpController', 'rfp', 'rfp', ['show', 'edit', 'create']);

                // Page
                resourceAdmin('themes', 'ThemeController', 'theme');

                Route::get('pages/create/load-block', 'PageController@loadBlock')->name("admin.page.load.block")->middleware("permission:admin.page.create", 'permission:admin.page.edit');
                resourceAdmin('pages', 'PageController', 'page');

                resourceAdmin('partners', 'PartnerController', 'partner');

                resourceAdmin('popup', 'PopupController', 'popup');

                resourceAdmin('team', 'TeamController', 'team');

                Route::get('image-maps/point-edit/{id}', 'ImageMapController@editPoint')->name("admin.page.point.edit")->middleware('permission:admin.image.map.edit');
                Route::put('image-maps/point-edit/{id}', 'ImageMapController@updatePoint')->name("admin.page.point.update")->middleware('permission:admin.image.map.edit');

                resourceAdmin('image-maps', 'ImageMapController', 'image_map', 'image.map');

                // General
                Route::group(['prefix' => 'general'], function () {

                    resourceAdmin('countries', 'CountryController', 'country', 'general');

                    resourceAdmin('targets', 'TargetController', 'target', 'general');

                    resourceAdmin('business', 'BusinessController', 'business', 'general');

                    Route::put('free-spaces/sort', 'FreeSpaceController@sort')->name("admin.free_space.sort")->middleware("permission:admin.general.edit");

                    resourceAdmin('free-spaces', 'FreeSpaceController', 'free_space', 'general');
                });

                resourceAdmin('sliders', 'SliderController', 'slider');

                resourceAdmin('website', 'WebsiteController', 'website');

                // FAQ
                resourceAdmin('faqs/categories', 'FaqCategoryController', 'faq_category', 'faq');
                resourceAdmin('faqs/customer-questions', 'FaqQuestionController', 'faq_question', 'faq', ['show', 'edit', 'create']);
                resourceAdmin('faqs', 'FaqController', 'faq');

                resourceAdmin('booking-spaces', 'BookSpaceController', 'book_space', 'book.space', ['create', 'edit']);

                resourceAdmin('visit-registration', 'RegisterSightseeingController', 'register_sightseeing', 'visit.registration', ['create', 'edit']);

                resourceAdmin('users', 'UserController', 'user');

                resourceAdmin('roles', 'RoleController', 'role');

                resourceAdmin('system', 'SystemController', 'system', 'system', ['show', 'index', 'create', 'destroy']);

                // E-catalog
//                resourceAdmin('catalogue', 'CatalogController', 'catalogue');

                // Gallery: image/video
                resourceAdmin('gallery', 'GalleryController', 'gallery');
                Route::put('gallery/{id}/sort-photo', 'GalleryController@sortPhoto')->name("admin.gallery.photo.sort")->middleware("permission:admin.gallery.edit");

                Route::get('landing-partners/{id}/template', "LandingPartnerController@template")->name("admin.landing_partner.template")->middleware("permission:admin.landing.partner.edit");
                Route::post('landing-partners/{id}/template', "LandingPartnerController@updateTemplate")->middleware("permission:admin.landing.partner.edit");

                resourceAdmin('landing-partners', 'LandingPartnerController', 'landing_partner', 'landing.partner');
                Route::put('landing-partners/{id}/restore', "LandingPartnerController@restore")->name("admin.landing_partner.restore")->middleware("permission:admin.landing.partner.restore");

                Route::post('landing-customers/export', 'LandingCustomerController@export')->middleware("permission:admin.landing.customer.index")->name('admin.landing_customer.export');
                resourceAdmin('landing-customers', 'LandingCustomerController', 'landing_customer', 'landing.customer');
            });
        });
    });
