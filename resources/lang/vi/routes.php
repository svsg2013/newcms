<?php
return [
    'product_index' => 'san-pham',
    'product_show' => 'san-pham/{slug}',
    'product_book' => 'dat-giu-cho',
    'product_register' => 'dang-ky-tham-quan',
    'career_page_detail' => '{page_slug}/chi-tiet/{career_slug}.html',

    'news_category' => 'truyen-thong/{category_slug}', // loai tin
    'news_show' => 'truyen-thong/{category_slug}/{slug}', // chi tiet
    'library_photo' => 'truyen-thong/thu-vien-anh',
    'library_photo_show' => 'truyen-thong/thu-vien-anh/{slug}',
    'video_clip' => 'truyen-thong/video-clip',
    'video_clip_show' => 'truyen-thong/video-clip/{slug}',
    'news_lhc' => 'truyen-thong/ban-tin-lhc',
    'news_lh_show' =>'truyen-thong/ban-tin-lhc/{slug}',

    'faqs' => 'cau-hoi-thuong-gap',
    'coming_soon' => 'trang-dang-duoc-cap-nhat',
    'ebrochure' => 'e-brochure',
    'ebrochure_show' => 'e-brochure/{slug}',

    'career_index' => 'tuyen-dung',//cho mac dinh vao lhc
    'career_lhc' => 'tuyen-dung/lhc-tuyen-dung',
    'career_lhc_show' => 'tuyen-dung/lhc-tuyen-dung/{slug}',
    'career_investors' => 'tuyen-dung/nha-dau-tu-tuyen-dung',
    'career_investors_show' => 'tuyen-dung/nha-dau-tu-tuyen-dung/{slug}',
    'legal_documents' => 'cap-nhat-tai-lieu-phap-ly',
    'legal_documents_show' => 'cap-nhat-tai-lieu-phap-ly/{slug}',


    // Không có trong router, chỉ dùng trans
    'page_home' => '',
    'page_solutions' => '/giai-phap',
    'page_capabilities' => '/nang-luc',


    'page_resources' => '/tai-nguyen',
    'page_resources_show' => '/tai-nguyen/{slug}',


    'page_contact' => 'vi/lien-he',
    'page_term_condition' => 'vi/dieu-khoan-va-dieu-kien',
    'page_submit_rfp' => 'vi/gui-rfp',
    'page_investment-consultancy' => '/tu-van-dau-tu',
    'page_investment-incentives' => '/uu-dai-dau-tu',
    'page_service-one-gate' => '/dich-vu-mot-cua',
    'page_before-investment' => '/thu-tuc-truoc-dau-tu',
    'page_after-investment' => '/thu-tuc-sau-dau-tu',
    'page_consultancy-materials' => '/tai-lieu-tu-van',
    'page_regulations' => '/quy-dinh-quy-che',
    'page_sustainable-development' => '/phat-trien-ben-vung',
    'page_technical-infrastructure' => '/ha-tang-ky-thuat',
    'page_social-infrastructure' => '/ha-tang-xa-hoi',
    'career_inviroment' => '/tuyen-dung/moi-truong-lam-viec',

    'page_dream' => 'vi/giac-mo',
    'page_live'=>'vi/cuoc-song',
    'page_general'=>'vi/tong-quan',
    'page_news'=>'vi/tin-tuc',
    // 'page_news_detail'=>'tin-tuc/{slug}',
    'page_brochures'=>'vi/tai-lieu-quang-cao',
    'achievements' => 'thanh-tuu/{slug}',
    'shared_value' => 'tao-lap-gia-tri-chung/{slug}',
    'news_promitions' => 'tin-khuyen-mai/{slug}',
    'news' => 'tin-tuc/{slug}',

    'landing' => [
        'partner' => [
            'detail' => 'vay-tien/{partner_code}'
        ]
    ]
];