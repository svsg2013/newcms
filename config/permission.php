<?php
return [
    'permission' => [
        'model' => 'Admin',
        'permissions' => [
            'admin.index' => 'Truy cập'
        ]
    ],

//    'product_category' => [
//        'model' => 'Product category',
//        'permissions' => [
//            'admin.product.category.index' => 'Product category index',
//            'admin.product.category.create' => 'Create product category',
//            'admin.product.category.edit' => 'Edit product category',
//            'admin.product.category.destroy' => 'Delete product category',
//        ]
//    ],

//    'product' => [
//        'model' => 'Sản phẩm',
//        'permissions' => [
//            'admin.product.index' => 'Truy cập',
//            'admin.product.create' => 'Tạo',
//            'admin.product.edit' => 'Sửa',
//            'admin.product.destroy' => 'Xóa'
//        ]
//    ],

    'menu' => [
        'model' => 'Quản lý Danh mục Menu',
        'permissions' => [
            'admin.menu.index' => 'Truy cập',
            'admin.menu.create' => 'Tạo',
            'admin.menu.edit' => 'Sửa',
            'admin.menu.destroy' => 'Xóa'
        ]
    ],

    'menu_item' => [
        'model' => 'Quản lý Menu',
        'permissions' => [
            'admin.menu.item.index' => 'Truy cập',
            'admin.menu.item.create' => 'Tạo',
            'admin.menu.item.edit' => 'Sửa',
            'admin.menu.item.destroy' => 'Xóa'
        ]
    ],

    'news_category' => [
        'model' => 'Loại tin tức',
        'permissions' => [
            'admin.news.category.index' => 'Truy cập',
            'admin.news.category.create' => 'Tạo',
            'admin.news.category.edit' => 'Sửa',
            'admin.news.category.destroy' => 'Xóa'
        ]
    ],

    'news' => [
        'model' => 'Tin tức',
        'permissions' => [
            'admin.news.index' => 'Truy cập',
            'admin.news.create' => 'Tạo',
            'admin.news.edit' => 'Sửa',
            'admin.news.destroy' => 'Xóa',
        ]
    ],

    // 'brochures' => [
    //     'model' => 'Tài liệu quảng cáo',
    //     'permissions' => [
    //         'admin.brochures.index' => 'Truy cập',
    //         'admin.brochures.create' => 'Tạo',
    //         'admin.brochures.edit' => 'Sửa',
    //         'admin.brochures.destroy' => 'Xóa',
    //     ]
    // ],



    'theme' => [
        'model' => 'Bản mẫu',
        'permissions' => [
            'admin.theme.index' => 'Truy cập',
            'admin.theme.create' => 'Tạo',
            'admin.theme.edit' => 'Sửa',
            'admin.theme.destroy' => 'Xóa',
        ]
    ],

    'page' => [
        'model' => 'Trang',
        'permissions' => [
            'admin.page.index' => 'Truy cập',
            'admin.page.create' => 'Tạo',
            'admin.page.edit' => 'Sửa',
            'admin.page.destroy' => 'Xóa'
        ]
    ],

   'career' => [
       'model' => 'Tuyển dụng',
       'permissions' => [
           'admin.career.index' => 'Truy cập',
           'admin.career.create' => 'Tạo',
           'admin.career.edit' => 'Sửa',
           'admin.career.destroy' => 'Xóa',
           'admin.career.application' => 'Ứng tuyển'
       ]
   ],

//    'branch' => [
//        'model' => 'Branch',
//        'permissions' => [
//            'admin.branch.index' => 'Branch index',
//            'admin.branch.create' => 'Create branch',
//            'admin.branch.edit' => 'Edit branch',
//            'admin.branch.destroy' => 'Delete branch'
//        ]
//    ],

    'contact' => [
        'model' => 'Liên hệ',
        'permissions' => [
            'admin.contact.index' => 'Truy cập',
            'admin.contact.destroy' => 'Xóa'
        ]
    ],

//    'rfp' => [
//        'model' => 'Rfp',
//        'permissions' => [
//            'admin.rfp.index' => 'Truy cập',
//            'admin.rfp.destroy' => 'Xóa'
//        ]
//    ],

    'faq' => [
        'model' => 'FAQs',
        'permissions' => [
            'admin.faq.index' => 'Truy cập',
            'admin.faq.create' => 'Tạo',
            'admin.faq.edit' => 'Sửa',
            'admin.faq.destroy' => 'Xóa'
        ]
    ],

    'city' => [
        'model' => 'City',
        'permissions' => [
            'admin.city.index' => 'Truy cập',
            'admin.city.create' => 'Tạo',
            'admin.city.edit' => 'Sửa',
            'admin.city.destroy' => 'Xóa'
        ]
    ],

    'city_career' => [
        'model' => 'City Career',
        'permissions' => [
            'admin.city.career.index' => 'Truy cập',
            'admin.city.career.create' => 'Tạo',
            'admin.city.career.edit' => 'Sửa',
            'admin.city.career.destroy' => 'Xóa'
        ]
    ],

    'subscribe' => [
        'model' => 'Đăng ký nhận tin',
        'permissions' => [
            'admin.subscribe.index' => 'Truy cập',
            'admin.subscribe.create' => 'Tạo',
            'admin.subscribe.edit' => 'Sửa',
            'admin.subscribe.destroy' => 'Xóa'
        ]
    ],

//    'image360' => [
//        'model' => 'Image 360',
//        'permissions' => [
//            'admin.image360.index' => 'Image 360 index',
//            'admin.image360.create' => 'Create image 360',
//            'admin.image360.edit' => 'Edit image 360',
//            'admin.image360.destroy' => 'Delete image 360'
//        ]
//    ],

    'slider' => [
        'model' => 'Băng rôn',
        'permissions' => [
            'admin.slider.index' => 'Truy cập',
            'admin.slider.create' => 'Tạo',
            'admin.slider.edit' => 'Sửa',
            'admin.slider.destroy' => 'Xóa'
        ]
    ],

//    'image_map' => [
//        'model' => 'Bản đồ hình ảnh',
//        'permissions' => [
//            'admin.image.map.index' => 'Truy cập',
//            'admin.image.map.create' => 'Tạo',
//            'admin.image.map.edit' => 'Sửa',
//            'admin.image.map.destroy' => 'Xóa',
//        ]
//    ],

    'partner' => [
        'model' => 'Đối tác',
        'permissions' => [
            'admin.partner.index' => 'Truy cập',
            'admin.partner.create' => 'Tạo',
            'admin.partner.edit' => 'Sửa',
            'admin.partner.destroy' => 'Xóa'
        ]
    ],

    'team' => [
        'model' => 'Đội ngũ',
        'permissions' => [
            'admin.team.index' => 'Truy cập',
            'admin.team.create' => 'Tạo',
            'admin.team.edit' => 'Sửa',
            'admin.team.destroy' => 'Xóa'
        ]
    ],

//    'book_space' => [
//        'model' => 'Đăng ký đặt chỗ',
//        'permissions' => [
//            'admin.book.space.index' => 'Truy cập',
//            'admin.book.space.show' => 'Hiển thị',
//            'admin.book.space.destroy' => 'Xóa'
//        ]
//    ],

//    'visit_registration' => [
//        'model' => 'Đăng ký tham quan',
//        'permissions' => [
//            'admin.visit.registration.index' => 'Truy cập',
//            'admin.visit.registration.show' => 'Hiển thị',
//            'admin.visit.registration.destroy' => 'Xóa'
//        ]
//    ],

    'general' => [
        'model' => 'Thông tin chung',
        'permissions' => [
            'admin.general.index' => 'Truy cập',
            'admin.general.create' => 'Tạo',
            'admin.general.edit' => 'Sửa',
            'admin.general.destroy' => 'Xóa'
        ]
    ],

    'user' => [
        'model' => 'Tài khoản',
        'permissions' => [
            'admin.user.index' => 'Truy cập',
            'admin.user.create' => 'Tạo',
            'admin.user.edit' => 'Sửa',
            'admin.user.destroy' => 'Xóa',
            'admin.user.set.permission' => 'Cấp quyền'
        ]
    ],

    'role' => [
        'model' => 'Vai trò',
        'permissions' => [
            'admin.role.index' => 'Truy cập',
            'admin.role.create' => 'Tạo',
            'admin.role.edit' => 'Sửa',
            'admin.role.destroy' => 'Xóa'
        ]
    ],

    'system' => [
        'model' => 'Hệ thống',
        'permissions' => [
            'admin.system.edit' => 'Sửa',
        ]
    ],


    'achievements' => [
        'model' => 'Thành tựu',
        'permissions' => [
            'admin.achievements.index' => 'Truy cập',
            'admin.achievements.create' => 'Tạo',
            'admin.achievements.edit' => 'Sửa',
            'admin.achievements.destroy' => 'Xóa'
        ]
    ],

    'shared_value' => [
        'model' => 'Tạo lập giá trị chung',
        'permissions' => [
            'admin.shared.value.index' => 'Truy cập',
            'admin.shared.value.create' => 'Tạo',
            'admin.shared.value.edit' => 'Sửa',
            'admin.shared.value.destroy' => 'Xóa'
        ]
    ],

    'combo' => [
        'model' => 'Quản lý Combo',
        'permissions' => [
            'admin.combo.index' => 'Truy cập',
            'admin.combo.create' => 'Tạo',
            'admin.combo.edit' => 'Sửa',
            'admin.combo.destroy' => 'Xóa'
        ]
    ],

    'document' => [
        'model' => 'Quản lý giấy tờ',
        'permissions' => [
            'admin.document.index' => 'Truy cập',
            'admin.document.create' => 'Tạo',
            'admin.document.edit' => 'Sửa',
            'admin.document.destroy' => 'Xóa'
        ]
    ],

    'loan_job' => [
        'model' => 'Quản lý công việc trong thông tin vay',
        'permissions' => [
            'admin.loan.job.index' => 'Truy cập',
            'admin.loan.job.create' => 'Tạo',
            'admin.loan.job.edit' => 'Sửa',
            'admin.loan.job.destroy' => 'Xóa'
        ]
    ],

    'loan_income_type' => [
        'model' => 'Quản lý loại thu nhập cho vay',
        'permissions' => [
            'admin.loan.income.type.index' => 'Truy cập',
            'admin.loan.income.type.create' => 'Tạo',
            'admin.loan.income.type.edit' => 'Sửa',
            'admin.loan.income.type.destroy' => 'Xóa'
        ]
    ],

    'loan_setting' => [
        'model' => 'Cài đặt thông tin vay',
        'permissions' => [
            'admin.loan.setting.index' => 'Truy cập',
            'admin.loan.setting.create' => 'Tạo',
            'admin.loan.setting.edit' => 'Sửa',
            'admin.loan.setting.destroy' => 'Xóa'
        ]
    ],

    'loan_management' => [
        'model' => 'Quản lý vay',
        'permissions' => [
            'admin.loan.management.index' => 'Truy cập',
            'admin.loan.management.create' => 'Tạo',
            'admin.loan.management.edit' => 'Sửa',
            'admin.loan.management.destroy' => 'Xóa'
        ]
    ],

    'address' => [
        'model' => 'Quản lý địa chỉ',
        'permissions' => [
            'admin.address.index' => 'Truy cập',
            'admin.address.create' => 'Tạo',
            'admin.address.edit' => 'Sửa',
            'admin.address.destroy' => 'Xóa',
            'admin.address.import' => 'Import'
        ]
    ],

    'address_category' => [
        'model' => 'Quản lý danh mục địa chỉ',
        'permissions' => [
            'admin.address.category.index' => 'Truy cập',
            'admin.address.category.create' => 'Tạo',
            'admin.address.category.edit' => 'Sửa',
            'admin.address.category.destroy' => 'Xóa'
        ]
    ],

    'popup' => [
        'model' => 'Quản lý Popup',
        'permissions' => [
            'admin.popup.index' => 'Truy cập',
            'admin.popup.create' => 'Tạo',
            'admin.popup.edit' => 'Sửa',
            'admin.popup.destroy' => 'Xóa'
        ]
    ],

    'website' => [
        'model' => 'Quản lý Link Website',
        'permissions' => [
            'admin.website.index' => 'Truy cập',
            'admin.website.create' => 'Tạo',
            'admin.website.edit' => 'Sửa',
            'admin.website.destroy' => 'Xóa'
        ]
    ],
//    'gallery' => [
//        'model' => 'Thư viện ảnh/video',
//        'permissions' => [
//            'admin.gallery.index' => 'Truy cập',
//            'admin.gallery.create' => 'Tạo',
//            'admin.gallery.edit' => 'Sửa',
//            'admin.gallery.destroy' => 'Xóa'
//        ]
//    ],

//    'catalogue' => [
//        'model' => 'Catalogue',
//        'permissions' => [
//            'admin.catalogue.index' => 'Truy cập',
//            'admin.catalogue.create' => 'Tạo',
//            'admin.catalogue.edit' => 'Sửa',
//            'admin.catalogue.destroy' => 'Xóa'
//        ]
//    ],

    'landing_partner' => [
        'model' => 'Quản lý Landing Partner',
        'permissions' => [
            'admin.landing.partner.index' => 'Truy cập',
            'admin.landing.partner.create' => 'Tạo',
            'admin.landing.partner.edit' => 'Sửa',
            'admin.landing.partner.destroy' => 'Xóa',
            'admin.landing.partner.restore' => 'Khôi phục'
        ]
    ],

    'landing_customer' => [
        'model' => 'Quản lý Landing Customer',
        'permissions' => [
            'admin.landing.customer.index' => 'Truy cập',
            'admin.landing.customer.create' => 'Tạo',
            'admin.landing.customer.edit' => 'Sửa',
            'admin.landing.customer.destroy' => 'Xóa'
        ]
    ],
];
