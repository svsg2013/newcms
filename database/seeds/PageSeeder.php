<?php

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\PageTranslation;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    /*
        NOTES:
            code = the code of page
            theme = the theme of page
    */

    public function run()
    {
        
        //Page::truncate();
        //PageTranslation::truncate();

        $pages = [
            [
                'code' => 'HOME',
                'theme' => 'home',
                'active' => 1,
                //'title' => 'HOMEPAGE'
            ],
            [
                'code' => 'ABOUT-INTRODUCTION',
                'theme' => 'about-introduction',
                'active' => 1,
                //'title' => 'ABOUT-INTRODUCTION'
            ],
            [
                'code' => 'ABOUT-VISION-MISSION',
                'theme' => 'about-vision-mission',
                'active' => 1,
                //'title' => 'ABOUT-VISION-MISSION'
            ],
            [
                'code' => 'ABOUT-OUR-COMMITMENT',
                'theme' => 'about-our-commitment',
                'active' => 1,
                //'title' => 'ABOUT-OUR-COMMITMENT'
            ],
            [
                'code' => 'ABOUT-OUR-PARTNERS',
                'theme' => 'about-our-partners',
                'active' => 1,
                //'title' => 'ABOUT-OUR-PARTNERS'
            ],
            [
                'code' => 'ABOUT-OUR-COMPANY-ACHIEVMENT',
                'theme' => 'about-our-company-achievment',
                'active' => 1,
                //'title' => 'ABOUT-OUR-COMPANY-ACHIEVMENT'
            ],
            [
                'code' => 'ABOUT-OUR-COMPANY-CSV',
                'theme' => 'about-our-company-csv',
                'active' => 1,
                //'title' => 'ABOUT-OUR-COMPANY-CSV'
            ],
            [
                'code' => 'SOLUTION-CASH-LOAN',
                'theme' => 'solution-cash-loan',
                'active' => 1,
                //'title' => 'SOLUTION-CASH-LOAN'
            ],
            [
                'code' => 'SOLUTION-OUR-CUSTOMERS',
                'theme' => 'solution-our-customers',
                'active' => 1,
                //'title' => 'SOLUTION-OUR-CUSTOMERS'
            ],
            [
                'code' => 'SOLUTION-LOAN-CALCULATING',
                'theme' => 'solution-loan-calculating',
                'active' => 1,
                //'title' => 'SOLUTION-LOAN-CALCULATING'
            ],
            [
                'code' => 'SOLUTION-LOAN-PROCEDURE',
                'theme' => 'solution-loan-procedure',
                'active' => 1,
                //'title' => 'SOLUTION-LOAN-PROCEDURE'
            ],
            [
                'code' => 'SOLUTION-INSURANCE',
                'theme' => 'solution-insurance',
                'active' => 1,
                //'title' => 'SOLUTION-INSURANCE'
            ],
            [
                'code' => 'CUSTOMER-HOW-GET-LOAN',
                'theme' => 'customer-how-get-loan',
                'active' => 1,
                //'title' => 'CUSTOMER-HOW-GET-LOAN'
            ],
            [
                'code' => 'CUSTOMER-PAYMENT-METHOD',
                'theme' => 'customer-payment-method',
                'active' => 1,
                //'title' => 'CUSTOMER-PAYMENT-METHOD'
            ],
            [
                'code' => 'CUSTOMER-DISBURSEMEMT',
                'theme' => 'customer-disbursement',
                'active' => 1,
                //'title' => 'CUSTOMER-DISBURSEMEMT'
            ],
            [
                'code' => 'CUSTOMER-FAQ',
                'theme' => 'customer-faq',
                'active' => 1,
                //'title' => 'CUSTOMER-FAQ'
            ],
            [
                'code' => 'JOIN-US-CAREER-OPPORTUNITIES',
                'theme' => 'join-us-career-opportunities',
                'active' => 1,
                //'title' => 'JOIN-US-CAREER-OPPORTUNITIES'
            ],
            [
                'code' => 'JOIN-US-FAQ',
                'theme' => 'join-us-faq',
                'active' => 1,
                //'title' => 'JOIN-US-FAQ'
            ],
            [
                'code' => 'JOIN-US',
                'theme' => 'join-us',
                'active' => 1,
                //'title' => 'JOIN-US'
            ],
            [
                'code' => 'JOIN-US-NEWS-TIPS',
                'theme' => 'join-us-news-tips',
                'active' => 1,
                //'title' => 'JOIN-US-NEWS-TIPS'
            ],
            [
                'code' => 'JOIN-US-WORKSPACE-CULTURE',
                'theme' => 'join-us-workspace-culture',
                'active' => 1,
                //'title' => 'JOIN-US-WORKSPACE-CULTURE'
            ],
            [
                'code' => 'JOIN-US-WORKSPACE-MEET-PEOPLE',
                'theme' => 'join-us-workspace-meet-people',
                'active' => 1,
                //'title' => 'JOIN-US-WORKSPACE-MEET-PEOPLE'
            ],
            [
                'code' => 'JOIN-US-WORKSPACE-WHY-EASY-CREDIT',
                'theme' => 'join-us-workspace-why-easy-credit',
                'active' => 1,
                //'title' => 'JOIN-US-WORKSPACE-EASY-EASY-CREDIT'
            ],
            [
                'code' => 'JOIN-EASY-CREDIT',
                'theme' => 'join-easy-credit',
                'active' => 1
            ],
            [
                'code' => 'NEWS-PROMOTIONS',
                'theme' => 'news-promitions',
                'active' => 1,
                //'title' => 'NEWS-PROMOTIONS'
            ],
            [
                'code' => 'TERMS-AND-CONDITION',
                'theme' => 'terms-and-condition',
                'active' => 1,
                //'title' => 'TERMS-AND-CONDITION'
            ],
            [
                'code' => 'CONFIDENTIALITY-NOTICE',
                'theme' => 'confidentiality-notice',
                'active' => 1,
                //'title' => 'CONFIDENTIALITY-NOTICE'
            ],
            [
                'code' => 'SEARCH-RESULT',
                'theme' => 'search-result',
                'active' => 1,
                //'title' => 'SEARCH-RESULT'
            ],
            [
                'code' => 'NEWS',
                'theme' => 'news-event',
                'active' => 1,
                //'title' => 'NEWS'
            ],

        ];

        foreach ($pages as $key => $page) {
            if ($this->checkExistByCode($page['code'])) {
                continue;
            }
            
            $page = Page::create($page);
            
            $file = resource_path("views/themes/".$page->theme.".blade.php");
            if (!is_file($file)) {
                file_put_contents($file, '');
            }
        }

        foreach (Page::all() as $page) {
            if (!empty($page->title)) {
                continue;
            }

            $input['locale'] = App::getLocale();
            $input['page_id'] = $page->id;
            $input['title'] = $page->code;
            $input['slug'] = strtolower($page->code);
            $page_translation = PageTranslation::create($input);
        }
    }

    private function checkExistByCode($code)
    {
        return (Page::where('code', $code)->first()) ? true : false;
    }
}
