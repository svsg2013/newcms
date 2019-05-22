<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\NewsCategoryRepository::class, \App\Repositories\NewsCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CareerRepository::class, \App\Repositories\CareerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CareerApplyRepository::class, \App\Repositories\CareerApplyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductCategoryRepository::class, \App\Repositories\ProductCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NewsCategoryRepository::class, \App\Repositories\NewsCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NewsRepository::class, \App\Repositories\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BranchRepository::class, \App\Repositories\BranchRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ContactRepository::class, \App\Repositories\ContactRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SystemRepository::class, \App\Repositories\SystemRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PageRepository::class, \App\Repositories\PageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FaqRepository::class, \App\Repositories\FaqRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FaqCategoryRepository::class, \App\Repositories\FaqCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RoleRepository::class, \App\Repositories\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SliderRepository::class, \App\Repositories\SliderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Image360Repository::class, \App\Repositories\Image360RepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PartnerRepository::class, \App\Repositories\PartnerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ThemeRepository::class, \App\Repositories\ThemeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ImageMapRepository::class, \App\Repositories\ImageMapRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MenuRepository::class, \App\Repositories\MenuRepositoryEloquent::class);
        
        $this->app->bind(\App\Repositories\CountryRepository::class, \App\Repositories\CountryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TargetRepository::class, \App\Repositories\TargetRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BusinessRepository::class, \App\Repositories\BusinessRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FreeSpaceRepository::class, \App\Repositories\FreeSpaceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BookSpaceRepository::class, \App\Repositories\BookSpaceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RegisterSightRepository::class, \App\Repositories\RegisterSightRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FaqQuestionRepository::class, \App\Repositories\FaqQuestionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CareerFormRepository::class, \App\Repositories\CareerFormRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CareerCategoryRepository::class, \App\Repositories\CareerCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CareerLevelRepository::class, \App\Repositories\CareerLevelRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CareerDegreeRepository::class, \App\Repositories\CareerDegreeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GalleryRepository::class, \App\Repositories\GalleryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CatalogueRepository::class, \App\Repositories\CatalogueRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ElCompanyRepository::class, \App\Repositories\ElCompanyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ElCompanyMenuRepository::class, \App\Repositories\ElCompanyMenuRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ElNewsRepository::class, \App\Repositories\ElNewsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RfpRepository::class, \App\Repositories\RfpRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BrochuresRepository::class, \App\Repositories\BrochuresRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TeamRepository::class, \App\Repositories\TeamRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AchievementsRepository::class, \App\Repositories\AchievementsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SharedValueRepository::class, \App\Repositories\SharedValueRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ComboRepository::class, \App\Repositories\ComboRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\DocumentRepository::class, \App\Repositories\DocumentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LoanJobRepository::class, \App\Repositories\LoanJobRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LoanIncomeTypeRepository::class, \App\Repositories\LoanIncomeTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LoanSettingRepository::class, \App\Repositories\LoanSettingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LoanManagementRepository::class, \App\Repositories\LoanManagementRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AddressRepository::class, \App\Repositories\AddressRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AddressCategoryRepository::class, \App\Repositories\AddressCategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MenuItemRepository::class, \App\Repositories\MenuItemRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CityRepository::class, \App\Repositories\CityRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CityCareerRepository::class, \App\Repositories\CityCareerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SubscribeRepository::class, \App\Repositories\SubscribeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PopupRepository::class, \App\Repositories\PopupRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\WebsiteRepository::class, \App\Repositories\WebsiteRepositoryEloquent::class);

        $this->app->bind(\App\Repositories\LandingPartnerRepository::class, \App\Repositories\LandingPartnerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LandingTemplateRepository::class, \App\Repositories\LandingTemplateRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LandingCustomerRepository::class, \App\Repositories\LandingCustomerRepositoryEloquent::class);
    }
}
