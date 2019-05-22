<?php

use Illuminate\Database\Seeder;
use App\Models\PageBlock;
use App\Models\Page;

class BlockPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // const TYPE_URL = 'TYPE_URL';
    // const TYPE_NAME = 'TYPE_NAME';
    // const TYPE_DESCRIPTION = 'TYPE_DESCRIPTION';
    // const TYPE_IMAGE_MAP = 'TYPE_IMAGE_MAP';
    // const TYPE_CONTENT = 'TYPE_CONTENT';
    // const TYPE_ICON = 'TYPE_ICON';
    // const TYPE_PHOTO = 'TYPE_PHOTO';
    // const TYPE_PHOTO_TRANSLATION = 'TYPE_PHOTO_TRANSLATION';
    // const TYPE_MULTI_PHOTOS = 'TYPE_MULTI_PHOTOS';

    public function run()
    {

        //PageBlock::truncate();

        $pageBlocks = [

            // Trang chu
            [
                "page_code" => "HOME",
                "parent_code" => "",
                "code" => "HOME-SLIDER",
                "types" => ["TYPE_MULTI_PHOTOS"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "",
                "code" => "HOME-WHY-CHOOSE",
                "types" => ["TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-WHY-CHOOSE",
                "code" => "HOME-WHY-CHOOSE-CONTENT-1",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-WHY-CHOOSE",
                "code" => "HOME-WHY-CHOOSE-CONTENT-2",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-WHY-CHOOSE",
                "code" => "HOME-WHY-CHOOSE-CONTENT-3",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "",
                "code" => "HOME-FINANCIAL-SOLUTIONOF-EASY-CREDIT",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "",
                "code" => "HOME-LOANS-YOU-CAN-TRUST",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_URL", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "",
                "code" => "HOME-FINANCIAL-SOLUTION",
                "types" => ["TYPE_PHOTO", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "",
                "code" => "HOME-STEP-TO-GET-FAST-LOAN",
                "types" => ["TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-STEP-TO-GET-FAST-LOAN",
                "code" => "HOME-STEP-TO-GET-FAST-LOAN-1",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-STEP-TO-GET-FAST-LOAN",
                "code" => "HOME-STEP-TO-GET-FAST-LOAN-2",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-STEP-TO-GET-FAST-LOAN",
                "code" => "HOME-STEP-TO-GET-FAST-LOAN-3",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "",
                "code" => "HOME-OUR-PROMISE-TO-YOU",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO", "TYPE_URL"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "",
                "code" => "HOME-WHAT-OUR-CUSTOMERS-SAY",
                "types" => ["TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-WHAT-OUR-CUSTOMERS-SAY",
                "code" => "HOME-WHAT-OUR-CUSTOMERS-SAY-1",
                "types" => ["TYPE_ICON", "TYPE_PHOTO", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-WHAT-OUR-CUSTOMERS-SAY",
                "code" => "HOME-WHAT-OUR-CUSTOMERS-SAY-2",
                "types" => ["TYPE_ICON", "TYPE_PHOTO", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-WHAT-OUR-CUSTOMERS-SAY",
                "code" => "HOME-WHAT-OUR-CUSTOMERS-SAY-3",
                "types" => ["TYPE_ICON", "TYPE_PHOTO", "TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "",
                "code" => "HOME-WHEN-YOU-NEED-US",
                "types" => ["TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-WHEN-YOU-NEED-US",
                "code" => "HOME-WHEN-YOU-NEED-US-1",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-WHEN-YOU-NEED-US",
                "code" => "HOME-WHEN-YOU-NEED-US-2",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "HOME-WHEN-YOU-NEED-US",
                "code" => "HOME-WHEN-YOU-NEED-US-3",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "HOME",
                "parent_code" => "",
                "code" => "HOME-YOU-CARE",
                "types" => ["TYPE_PHOTO" ,"TYPE_DESCRIPTION", "TYPE_URL"]
            ],

            // gioi-thieu-chung
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "",
                "code" => "ABOUT-INTRODUCTION-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "",
                "code" => "ABOUT-INTRODUCTION-WELCOME",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "",
                "code" => "ABOUT-INTRODUCTION-OVERVIEW",
                "types" => ["TYPE_DESCRIPTION", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "",
                "code" => "ABOUT-INTRODUCTION-WHO-WE-ARE",
                "types" => ["TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "",
                "code" => "ABOUT-INTRODUCTION-DIFFERENT",
                "types" => ["TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "",
                "code" => "ABOUT-INTRODUCTION-HISTORY",
                "types" => ["TYPE_DESCRIPTION", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "ABOUT-INTRODUCTION-HISTORY",
                "code" => "ABOUT-INTRODUCTION-HISTORY-1",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_ICON"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "ABOUT-INTRODUCTION-HISTORY",
                "code" => "ABOUT-INTRODUCTION-HISTORY-2",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_ICON"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "ABOUT-INTRODUCTION-HISTORY",
                "code" => "ABOUT-INTRODUCTION-HISTORY-3",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_ICON"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "",
                "code" => "ABOUT-INTRODUCTION-LEADERS",
                "types" => ["TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "ABOUT-INTRODUCTION-LEADERS",
                "code" => "ABOUT-INTRODUCTION-LEADERS-1",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "ABOUT-INTRODUCTION-LEADERS",
                "code" => "ABOUT-INTRODUCTION-LEADERS-2",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "ABOUT-INTRODUCTION-LEADERS",
                "code" => "ABOUT-INTRODUCTION-LEADERS-3",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "ABOUT-INTRODUCTION",
                "parent_code" => "ABOUT-INTRODUCTION-LEADERS",
                "code" => "ABOUT-INTRODUCTION-LEADERS-4",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO"]
            ],
            // end gioi-thieu-chung


            // tam-nhin-va-su-menh
            [
                "page_code" => "ABOUT-VISION-MISSION",
                "parent_code" => "",
                "code" => "ABOUT-VISION-MISSION-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "ABOUT-VISION-MISSION",
                "parent_code" => "",
                "code" => "ABOUT-VISION-MISSION-OUR-VISION",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            // TẦM NHÌN CỦA EASY CREDIT
            [
                "page_code" => "ABOUT-VISION-MISSION",
                "parent_code" => "ABOUT-VISION-MISSION-OUR-VISION",
                "code" => "ABOUT-VISION-MISSION-OUR-VISION-1",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_PHOTO", "TYPE_ICON"]
            ],
            // SỨ MỆNH CỦA EASY CREDIT
            [
                "page_code" => "ABOUT-VISION-MISSION",
                "parent_code" => "ABOUT-VISION-MISSION-OUR-VISION",
                "code" => "ABOUT-VISION-MISSION-OUR-VISION-2",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_PHOTO", "TYPE_ICON"]
            ],
            // GIÁ TRỊ CỐT LÕI
            [
                "page_code" => "ABOUT-VISION-MISSION",
                "parent_code" => "",
                "code" => "ABOUT-VISION-MISSION-OUR-CORE-VALUES",
                "types" => ["TYPE_NAME"]
            ],
            // LÀM MỌI THỨ TRỞ NÊN DỄ DÀNG
            [
                "page_code" => "ABOUT-VISION-MISSION",
                "parent_code" => "ABOUT-VISION-MISSION-OUR-CORE-VALUES",
                "code" => "ABOUT-VISION-MISSION-OUR-CORE-VALUES-1",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_ICON"]
            ],
            // KHÔNG NGỪNG CẢI TIẾN
            [
                "page_code" => "ABOUT-VISION-MISSION",
                "parent_code" => "ABOUT-VISION-MISSION-OUR-CORE-VALUES",
                "code" => "ABOUT-VISION-MISSION-OUR-CORE-VALUES-2",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_ICON"]
            ],
            // TƯƠNG THÍCH VỚI KHÁCH HÀNG
            [
                "page_code" => "ABOUT-VISION-MISSION",
                "parent_code" => "ABOUT-VISION-MISSION-OUR-CORE-VALUES",
                "code" => "ABOUT-VISION-MISSION-OUR-CORE-VALUES-3",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_ICON"]
            ],
            // LUÔN HỖ TRỢ
            [
                "page_code" => "ABOUT-VISION-MISSION",
                "parent_code" => "ABOUT-VISION-MISSION-OUR-CORE-VALUES",
                "code" => "ABOUT-VISION-MISSION-OUR-CORE-VALUES-4",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_ICON"]
            ],
            // TẠO LẬP GIÁ TRỊ CHUNG
            [
                "page_code" => "ABOUT-VISION-MISSION",
                "parent_code" => "",
                "code" => "ABOUT-VISION-CREATE-GENERAL-VALUES",
                "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_URL", "TYPE_PHOTO"]
            ],
            // end tam-nhin-va-su-menh


            // cam-ket-cua-chung-toi
            [
                "page_code" => "ABOUT-OUR-COMMITMENT",
                "parent_code" => "",
                "code" => "ABOUT-OUR-COMMITMENT-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            // KHÔNG CHỈ NÓI MÀ CÒN HÀNH ĐỘNG
            [
                "page_code" => "ABOUT-OUR-COMMITMENT",
                "parent_code" => "",
                "code" => "ABOUT-OUR-COMMITMENT-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            // CAM KẾT CỦA CHÚNG TÔI
            [
                "page_code" => "ABOUT-OUR-COMMITMENT",
                "parent_code" => "",
                "code" => "ABOUT-OUR-COMMITMENT-CONTENT",
                "types" => ["TYPE_NAME"]
            ],
            [
                "page_code" => "ABOUT-OUR-COMMITMENT",
                "parent_code" => "ABOUT-OUR-COMMITMENT-CONTENT",
                "code" => "ABOUT-OUR-COMMITMENT-CONTENT-1",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "ABOUT-OUR-COMMITMENT",
                "parent_code" => "ABOUT-OUR-COMMITMENT-CONTENT",
                "code" => "ABOUT-OUR-COMMITMENT-CONTENT-2",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "ABOUT-OUR-COMMITMENT",
                "parent_code" => "ABOUT-OUR-COMMITMENT-CONTENT",
                "code" => "ABOUT-OUR-COMMITMENT-CONTENT-3",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_PHOTO"]
            ],
            // BẠN QUAN TÂM VÀ SẴN SÀNG ĐỂ NHẬN KHOẢN VAY NHANH NHẤT ?
            [
                "page_code" => "ABOUT-OUR-COMMITMENT",
                "parent_code" => "",
                "code" => "ABOUT-OUR-COMMITMENT-REGISTER",
                "types" => ["TYPE_NAME", "TYPE_URL", "TYPE_PHOTO"]
            ],
            // end cam-ket-cua-chung-toi
            

            // doi-tac-lien-ket
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "",
                "code" => "ABOUT-OUR-PARTNERS-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            // QUYỀN LỢI DÀNH RIÊNG CHO ĐỐI TÁC
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "",
                "code" => "ABOUT-OUR-PARTNERS-GENERAL",
                "types" => ["TYPE_DESCRIPTION", "TYPE_CONTENT"]
            ],
            // ĐỐI TÁC DỊCH VỤ
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "",
                "code" => "ABOUT-OUR-PARTNERS-SERVICE",
                "types" => ["TYPE_NAME"]
            ],
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "ABOUT-OUR-PARTNERS-SERVICE",
                "code" => "ABOUT-OUR-PARTNERS-SERVICE-1",
                "types" => ["TYPE_PHOTO", "TYPE_URL"]
            ],
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "ABOUT-OUR-PARTNERS-SERVICE",
                "code" => "ABOUT-OUR-PARTNERS-SERVICE-2",
                "types" => ["TYPE_PHOTO", "TYPE_URL"]
            ],
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "ABOUT-OUR-PARTNERS-SERVICE",
                "code" => "ABOUT-OUR-PARTNERS-SERVICE-3",
                "types" => ["TYPE_PHOTO", "TYPE_URL"]
            ],
            // ĐỐI TÁC THANH TOÁN
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "",
                "code" => "ABOUT-OUR-PARTNERS-PAY",
                "types" => ["TYPE_NAME"]
            ],
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "ABOUT-OUR-PARTNERS-PAY",
                "code" => "ABOUT-OUR-PARTNERS-PAY-1",
                "types" => ["TYPE_PHOTO", "TYPE_URL"]
            ],
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "ABOUT-OUR-PARTNERS-PAY",
                "code" => "ABOUT-OUR-PARTNERS-PAY-2",
                "types" => ["TYPE_PHOTO", "TYPE_URL"]
            ],
            // ĐỐI TÁC VẬN HÀNH
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "",
                "code" => "ABOUT-OUR-PARTNERS-OPERATE",
                "types" => ["TYPE_NAME"]
            ],
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "ABOUT-OUR-PARTNERS-OPERATE",
                "code" => "ABOUT-OUR-PARTNERS-OPERATE-1",
                "types" => ["TYPE_PHOTO", "TYPE_URL"]
            ],


            
            // WOULD YOU LIKE TO KNOW ABOUT
            [
                "page_code" => "ABOUT-OUR-PARTNERS",
                "parent_code" => "",
                "code" => "ABOUT-OUR-PARTNERS-FOOTER",
                "types" => ["TYPE_DESCRIPTION"]
            ],
            // end doi-tac-lien-ket

            

            // thanh-tuu
            [
                "page_code" => "ABOUT-OUR-COMPANY-ACHIEVMENT",
                "parent_code" => "",
                "code" => "ABOUT-OUR-ACHIEVMENT-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            // TỰ HÀO VỀ ĐỘI NGŨ TRẺ
            [
                "page_code" => "ABOUT-OUR-COMPANY-ACHIEVMENT",
                "parent_code" => "",
                "code" => "ABOUT-OUR-ACHIEVMENT-GENERAL",
                "types" => ["TYPE_DESCRIPTION", "TYPE_CONTENT"]
            ],
            // LOOKING FOR YOURDREAM JOB?
            [
                "page_code" => "ABOUT-OUR-COMPANY-ACHIEVMENT",
                "parent_code" => "",
                "code" => "ABOUT-OUR-ACHIEVMENT-FOOTER",
                "types" => ["TYPE_NAME", "TYPE_URL", "TYPE_PHOTO"]
            ],
            // end thanh-tuu


            // tao-lap-gia-tri-chung
            [
                "page_code" => "ABOUT-OUR-COMPANY-CSV",
                "parent_code" => "",
                "code" => "ABOUT-OUR-COMPANY-CSV-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            // TRIẾT LÝ TẠO LẬP GIÁ TRỊ CHUNG TẠI EASY CREDIT
            [
                "page_code" => "ABOUT-OUR-COMPANY-CSV",
                "parent_code" => "",
                "code" => "ABOUT-OUR-COMPANY-CSV-GENERAL",
                "types" => ["TYPE_DESCRIPTION", "TYPE_CONTENT"]
            ],
            // TÀI CHÍNH THÔNG MINH
            [
                "page_code" => "ABOUT-OUR-COMPANY-CSV",
                "parent_code" => "",
                "code" => "ABOUT-OUR-COMPANY-CSV-FINANCE",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "ABOUT-OUR-COMPANY-CSV",
                "parent_code" => "ABOUT-OUR-COMPANY-CSV-FINANCE",
                "code" => "ABOUT-OUR-COMPANY-CSV-FINANCE-1",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "ABOUT-OUR-COMPANY-CSV",
                "parent_code" => "ABOUT-OUR-COMPANY-CSV-FINANCE",
                "code" => "ABOUT-OUR-COMPANY-CSV-FINANCE-2",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "ABOUT-OUR-COMPANY-CSV",
                "parent_code" => "ABOUT-OUR-COMPANY-CSV-FINANCE",
                "code" => "ABOUT-OUR-COMPANY-CSV-FINANCE-3",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "ABOUT-OUR-COMPANY-CSV",
                "parent_code" => "ABOUT-OUR-COMPANY-CSV-FINANCE",
                "code" => "ABOUT-OUR-COMPANY-CSV-FINANCE-4",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "ABOUT-OUR-COMPANY-CSV",
                "parent_code" => "ABOUT-OUR-COMPANY-CSV-FINANCE",
                "code" => "ABOUT-OUR-COMPANY-CSV-FINANCE-5",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_CONTENT"]
            ],
            // end tao-lap-gia-tri-chung


            // vay-tieu-dung-tin-chap
            [
                "page_code" => "SOLUTION-CASH-LOAN",
                "parent_code" => "",
                "code" => "SOLUTION-CASH-LOAN-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            // TẠI SAO CHỌN VAY TIÊU DÙNG TÍN CHẤP TẠI EASY CREDIT
            [
                "page_code" => "SOLUTION-CASH-LOAN",
                "parent_code" => "",
                "code" => "SOLUTION-CASH-LOAN-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "SOLUTION-CASH-LOAN",
                "parent_code" => "SOLUTION-CASH-LOAN-GENERAL",
                "code" => "SOLUTION-CASH-LOAN-GENERAL-1",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_ICON", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "SOLUTION-CASH-LOAN",
                "parent_code" => "SOLUTION-CASH-LOAN-GENERAL",
                "code" => "SOLUTION-CASH-LOAN-GENERAL-2",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_ICON", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "SOLUTION-CASH-LOAN",
                "parent_code" => "SOLUTION-CASH-LOAN-GENERAL",
                "code" => "SOLUTION-CASH-LOAN-GENERAL-3",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_ICON", "TYPE_CONTENT"]
            ],
            // ĐIỀU KHOẢN VÀ ĐIỀU KIỆN
            [
                "page_code" => "SOLUTION-CASH-LOAN",
                "parent_code" => "",
                "code" => "SOLUTION-CASH-LOAN-RULES",
                "types" => [""]
            ],
            [
                "page_code" => "SOLUTION-CASH-LOAN",
                "parent_code" => "SOLUTION-CASH-LOAN-RULES",
                "code" => "SOLUTION-CASH-LOAN-RULES-1",
                "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_URL"]
            ],
            [
                "page_code" => "SOLUTION-CASH-LOAN",
                "parent_code" => "SOLUTION-CASH-LOAN-RULES",
                "code" => "SOLUTION-CASH-LOAN-RULES-2",
                "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_URL"]
            ],
            // CAM KẾT CỦA CHÚNG TÔI
            [
                "page_code" => "SOLUTION-CASH-LOAN",
                "parent_code" => "",
                "code" => "SOLUTION-CASH-LOAN-COMMITMENT",
                "types" => ["TYPE_NAME"]
            ],
            [
                "page_code" => "SOLUTION-CASH-LOAN",
                "parent_code" => "",
                "code" => "SOLUTION-CASH-LOAN-COMMITMENT-DETAIL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_PHOTO"]
            ],
            // BẠN ĐÃ AN TÂM VÀ SẴN SÀNG TÌM HIỂU THỦ TỤC VAY
            [
                "page_code" => "SOLUTION-CASH-LOAN",
                "parent_code" => "",
                "code" => "SOLUTION-CASH-LOAN-FOOTER",
                "types" => ["TYPE_NAME", "TYPE_URL", "TYPE_PHOTO"]
            ],
            // end vay-tieu-dung-tin-chap


            
            // khach-hang-cua-easycredit
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "",
                "code" => "SOLUTION-OUR-CUSTOMERS-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            // BẠN MUỐN TRỞ THÀNH KHÁCH HÀNG CỦA EASY CREDIT
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "",
                "code" => "SOLUTION-OUR-CUSTOMERS-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "SOLUTION-OUR-CUSTOMERS-GENERAL",
                "code" => "SOLUTION-OUR-CUSTOMERS-GENERAL-1",
                "types" => ["TYPE_PHOTO", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "SOLUTION-OUR-CUSTOMERS-GENERAL",
                "code" => "SOLUTION-OUR-CUSTOMERS-GENERAL-2",
                "types" => ["TYPE_PHOTO", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "SOLUTION-OUR-CUSTOMERS-GENERAL",
                "code" => "SOLUTION-OUR-CUSTOMERS-GENERAL-3",
                "types" => ["TYPE_PHOTO", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            // GIẤY TỜ CẦN CUNG CẤP
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "",
                "code" => "SOLUTION-OUR-CUSTOMERS-DOCUMENTS",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "SOLUTION-OUR-CUSTOMERS-DOCUMENTS",
                "code" => "SOLUTION-OUR-CUSTOMERS-DOCUMENTS-1",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "SOLUTION-OUR-CUSTOMERS-DOCUMENTS",
                "code" => "SOLUTION-OUR-CUSTOMERS-DOCUMENTS-2",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "SOLUTION-OUR-CUSTOMERS-DOCUMENTS",
                "code" => "SOLUTION-OUR-CUSTOMERS-DOCUMENTS-3",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            // CHIA SẺ CỦA KHÁCH HÀNG
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "",
                "code" => "SOLUTION-OUR-CUSTOMERS-SHARE",
                "types" => ["TYPE_NAME"]
            ],
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "SOLUTION-OUR-CUSTOMERS-SHARE",
                "code" => "SOLUTION-OUR-CUSTOMERS-SHARE-1",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_PHOTO", "TYPE_DESCRIPTION", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "SOLUTION-OUR-CUSTOMERS-SHARE",
                "code" => "SOLUTION-OUR-CUSTOMERS-SHARE-2",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_PHOTO", "TYPE_DESCRIPTION", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "SOLUTION-OUR-CUSTOMERS-SHARE",
                "code" => "SOLUTION-OUR-CUSTOMERS-SHARE-3",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_PHOTO", "TYPE_DESCRIPTION", "TYPE_CONTENT"]
            ],
            // GIỜ ĐÂY BẠN ĐÃ SẴN SÀNG TRỞ THÀNH KHÁCH HÀNG CỦA CHÚNG TÔI
            [
                "page_code" => "SOLUTION-OUR-CUSTOMERS",
                "parent_code" => "",
                "code" => "SOLUTION-OUR-CUSTOMERS-FOOTER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_URL"]
            ],
            // end khach-hang-cua-easycredit



            // thu-tuc-vay
            [
                "page_code" => "SOLUTION-LOAN-PROCEDURE",
                "parent_code" => "",
                "code" => "SOLUTION-LOAN-PROCEDURE-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            // Thủ tục vay tiêu dùng tín chấp tại EASY CREDIT
            [
                "page_code" => "SOLUTION-LOAN-PROCEDURE",
                "parent_code" => "",
                "code" => "SOLUTION-LOAN-PROCEDURE-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            // HƯỚNG DẪN ĐĂNG KÝ
            [
                "page_code" => "SOLUTION-LOAN-PROCEDURE",
                "parent_code" => "",
                "code" => "SOLUTION-LOAN-PROCEDURE-APPLY",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-LOAN-PROCEDURE",
                "parent_code" => "SOLUTION-LOAN-PROCEDURE-APPLY",
                "code" => "SOLUTION-LOAN-PROCEDURE-APPLY-1",
                "types" => ["TYPE_NAME", "TYPE_ICON", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-LOAN-PROCEDURE",
                "parent_code" => "SOLUTION-LOAN-PROCEDURE-APPLY",
                "code" => "SOLUTION-LOAN-PROCEDURE-APPLY-2",
                "types" => ["TYPE_NAME", "TYPE_ICON", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-LOAN-PROCEDURE",
                "parent_code" => "SOLUTION-LOAN-PROCEDURE-APPLY",
                "code" => "SOLUTION-LOAN-PROCEDURE-APPLY-3",
                "types" => ["TYPE_NAME", "TYPE_ICON", "TYPE_DESCRIPTION"]
            ],
            // CHUẨN BỊ HỒ SƠ
            [
                "page_code" => "SOLUTION-LOAN-PROCEDURE",
                "parent_code" => "",
                "code" => "SOLUTION-LOAN-PROCEDURE-DOCUMENTS",
                "types" => ["TYPE_NAME"]
            ],
            [
                "page_code" => "SOLUTION-LOAN-PROCEDURE",
                "parent_code" => "SOLUTION-LOAN-PROCEDURE-DOCUMENTS",
                "code" => "SOLUTION-LOAN-PROCEDURE-DOCUMENTS-1",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-LOAN-PROCEDURE",
                "parent_code" => "SOLUTION-LOAN-PROCEDURE-DOCUMENTS",
                "code" => "SOLUTION-LOAN-PROCEDURE-DOCUMENTS-2",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-LOAN-PROCEDURE",
                "parent_code" => "SOLUTION-LOAN-PROCEDURE-DOCUMENTS",
                "code" => "SOLUTION-LOAN-PROCEDURE-DOCUMENTS-3",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            // BẠN SẴN SÀNG TRẢI NGHIỆM THỦ TỤC VAY ĐƠN GIẢNTẠI EASY CREDIT
            [
                "page_code" => "SOLUTION-LOAN-PROCEDURE",
                "parent_code" => "",
                "code" => "SOLUTION-LOAN-PROCEDURE-FOOTER",
                "types" => ["TYPE_PHOTO", "TYPE_NAME", "TYPE_URL"]
            ],
            // end thu-tuc-vay



            // bao-hiem
            [
                "page_code" => "SOLUTION-INSURANCE",
                "parent_code" => "",
                "code" => "SOLUTION-INSURANCE-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            // BẢO HIỂM KHOẢN VAY LÀ GÌ
            [
                "page_code" => "SOLUTION-INSURANCE",
                "parent_code" => "",
                "code" => "SOLUTION-INSURANCE-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "SOLUTION-INSURANCE",
                "parent_code" => "SOLUTION-INSURANCE-GENERAL",
                "code" => "SOLUTION-INSURANCE-GENERAL-1",
                "types" => ["TYPE_PHOTO", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-INSURANCE",
                "parent_code" => "SOLUTION-INSURANCE-GENERAL",
                "code" => "SOLUTION-INSURANCE-GENERAL-2",
                "types" => ["TYPE_PHOTO", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-INSURANCE",
                "parent_code" => "SOLUTION-INSURANCE-GENERAL",
                "code" => "SOLUTION-INSURANCE-GENERAL-3",
                "types" => ["TYPE_PHOTO", "TYPE_DESCRIPTION"]
            ],
            // THÔNG TIN CÁC GÓI BẢO HIỂM
            [
                "page_code" => "SOLUTION-INSURANCE",
                "parent_code" => "",
                "code" => "SOLUTION-INSURANCE-PACKAGE",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "SOLUTION-INSURANCE",
                "parent_code" => "SOLUTION-INSURANCE-PACKAGE",
                "code" => "SOLUTION-INSURANCE-PACKAGE-1",
                "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SOLUTION-INSURANCE",
                "parent_code" => "SOLUTION-INSURANCE-PACKAGE",
                "code" => "SOLUTION-INSURANCE-PACKAGE-2",
                "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_DESCRIPTION"]
            ],
            // LÀM CÁCH NÀO ĐỂTHAM GIA BẢO HIỂM
            [
                "page_code" => "SOLUTION-INSURANCE",
                "parent_code" => "",
                "code" => "SOLUTION-INSURANCE-JOIN",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            // BẠN ĐÃ YÊN TÂM VỚI KHOẢN VAY TẠI EASY CREDIT
            [
                "page_code" => "SOLUTION-INSURANCE",
                "parent_code" => "",
                "code" => "SOLUTION-INSURANCE-FOOTER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_URL"]
            ],
            // end bao-hiem



            // cach-thuc-nhan-khoan-vay
            [
                "page_code" => "CUSTOMER-HOW-GET-LOAN",
                "parent_code" => "",
                "code" => "CUSTOMER-HOW-GET-LOAN-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            // 2 WAYS TO GET THE LOAN
            [
                "page_code" => "CUSTOMER-HOW-GET-LOAN",
                "parent_code" => "",
                "code" => "CUSTOMER-HOW-GET-LOAN-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "CUSTOMER-HOW-GET-LOAN",
                "parent_code" => "CUSTOMER-HOW-GET-LOAN-GENERAL",
                "code" => "CUSTOMER-HOW-GET-LOAN-GENERAL-1",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_ICON", "TYPE_CONTENT", "TYPE_URL"]
            ],
            [
                "page_code" => "CUSTOMER-HOW-GET-LOAN",
                "parent_code" => "CUSTOMER-HOW-GET-LOAN-GENERAL",
                "code" => "CUSTOMER-HOW-GET-LOAN-GENERAL-2",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_ICON", "TYPE_CONTENT", "TYPE_URL"]
            ],
            [
                "page_code" => "CUSTOMER-HOW-GET-LOAN",
                "parent_code" => "CUSTOMER-HOW-GET-LOAN-GENERAL",
                "code" => "CUSTOMER-HOW-GET-LOAN-GENERAL-3",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_ICON", "TYPE_CONTENT", "TYPE_URL"]
            ],
            [
                "page_code" => "CUSTOMER-HOW-GET-LOAN",
                "parent_code" => "",
                "code" => "CUSTOMER-HOW-GET-LOAN-FOOTER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_URL"]
            ],
            // end cach-thuc-nhan-khoan-vay

            

            // nhan-khoan-giai-ngan
            [
                "page_code" => "CUSTOMER-DISBURSEMEMT",
                "parent_code" => "",
                "code" => "CUSTOMER-DISBURSEMEMT-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            // GIẢI NGÂN NHANH CHÓNG, NHẬN TIỀN DỄ DÀNG CÙNG EASY CREDIT
            [
                "page_code" => "CUSTOMER-DISBURSEMEMT",
                "parent_code" => "",
                "code" => "CUSTOMER-DISBURSEMEMT-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            // CÁCH THỨC NHẬN GIẢI NGÂN
            [
                "page_code" => "CUSTOMER-DISBURSEMEMT",
                "parent_code" => "",
                "code" => "CUSTOMER-DISBURSEMEMT-METHOD",
                "types" => ["TYPE_NAME"]
            ],
            [
                "page_code" => "CUSTOMER-DISBURSEMEMT",
                "parent_code" => "CUSTOMER-DISBURSEMEMT-METHOD",
                "code" => "CUSTOMER-DISBURSEMEMT-METHOD-1",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "CUSTOMER-DISBURSEMEMT",
                "parent_code" => "CUSTOMER-DISBURSEMEMT-METHOD",
                "code" => "CUSTOMER-DISBURSEMEMT-METHOD-2",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_CONTENT"]
            ],
            // TẠI SAO CHỌN EASY CREDIT
            [
                "page_code" => "CUSTOMER-DISBURSEMEMT",
                "parent_code" => "",
                "code" => "CUSTOMER-DISBURSEMEMT-WHY-CHOOSE",
                "types" => ["TYPE_NAME"]
            ],
            [
                "page_code" => "CUSTOMER-DISBURSEMEMT",
                "parent_code" => "CUSTOMER-DISBURSEMEMT-WHY-CHOOSE",
                "code" => "CUSTOMER-DISBURSEMEMT-WHY-CHOOSE-1",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "CUSTOMER-DISBURSEMEMT",
                "parent_code" => "CUSTOMER-DISBURSEMEMT-WHY-CHOOSE",
                "code" => "CUSTOMER-DISBURSEMEMT-WHY-CHOOSE-2",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "CUSTOMER-DISBURSEMEMT",
                "parent_code" => "CUSTOMER-DISBURSEMEMT-WHY-CHOOSE",
                "code" => "CUSTOMER-DISBURSEMEMT-WHY-CHOOSE-3",
                "types" => ["TYPE_ICON", "TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            // BẠN MUỐN NHẬN GIẢI NGÂNCHỈ TRONG 24H
            [
                "page_code" => "CUSTOMER-DISBURSEMEMT",
                "parent_code" => "",
                "code" => "CUSTOMER-DISBURSEMEMT-FOOTER",
                "types" => ["TYPE_PHOTO", "TYPE_NAME", "TYPE_URL"]
            ],
            // end nhan-khoan-giai-ngan



            // phuong-thuc-thanh-toan
            [
                "page_code" => "CUSTOMER-PAYMENT-METHOD",
                "parent_code" => "",
                "code" => "CUSTOMER-PAYMENT-METHOD-BANNER",
                "types" => ["TYPE_PHOTO", "TYPE_NAME"]
            ],
            // THANH TOÁN KHOẢN TRẢ HẰNG THÁNG TIỆN LỢI MỌI LÚC MỌI NƠI
            [
                "page_code" => "CUSTOMER-PAYMENT-METHOD",
                "parent_code" => "",
                "code" => "CUSTOMER-PAYMENT-METHOD-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            // PHƯƠNG THỨC THANH TOÁN
            [
                "page_code" => "CUSTOMER-PAYMENT-METHOD",
                "parent_code" => "",
                "code" => "CUSTOMER-PAYMENT-METHOD-DETAIL",
                "types" => ["TYPE_NAME"]
            ],
            [
                "page_code" => "CUSTOMER-PAYMENT-METHOD",
                "parent_code" => "CUSTOMER-PAYMENT-METHOD-DETAIL",
                "code" => "CUSTOMER-PAYMENT-METHOD-DETAIL-1",
                "types" => ["TYPE_NAME", "TYPE_ICON", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "CUSTOMER-PAYMENT-METHOD",
                "parent_code" => "CUSTOMER-PAYMENT-METHOD-DETAIL",
                "code" => "CUSTOMER-PAYMENT-METHOD-DETAIL-2",
                "types" => ["TYPE_NAME", "TYPE_ICON", "TYPE_CONTENT"]
            ],
            // THANH TOÁN KHOẢN VAY CHƯA BAO GIỜ TIỆN LỢI NHƯ VẬY!
            [
                "page_code" => "CUSTOMER-PAYMENT-METHOD",
                "parent_code" => "",
                "code" => "CUSTOMER-PAYMENT-METHOD-FOOTER",
                "types" => ["TYPE_NAME", "TYPE_URL", "TYPE_PHOTO"]
            ],
            // end phuong-thuc-thanh-toan

        

            // cau-hoi-thuong-gap (danh-cho-khach-hang)
            [
                "page_code" => "CUSTOMER-FAQ",
                "parent_code" => "",
                "code" => "CUSTOMER-FAQ-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            // CÂU HỎI THƯỜNG GẶP VỀ KHOẢN VAY VÀ THANH TOÁN TẠI EASY CREDIT
            [
                "page_code" => "CUSTOMER-FAQ",
                "parent_code" => "",
                "code" => "CUSTOMER-FAQ-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_PHOTO"]
            ],
            // BẠN CHƯA TÌM ĐƯỢC CÂU TRẢ LỜI CHO THÔNG TIN CẦN HỎI
            [
                "page_code" => "CUSTOMER-FAQ",
                "parent_code" => "",
                "code" => "CUSTOMER-FAQ-CALL",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_PHOTO", "TYPE_URL"]
            ],
            // FOOTER
            [
                "page_code" => "CUSTOMER-FAQ",
                "parent_code" => "",
                "code" => "CUSTOMER-FAQ-FOOTER",
                "types" => [""]
            ],
            [
                "page_code" => "CUSTOMER-FAQ",
                "parent_code" => "CUSTOMER-FAQ-FOOTER",
                "code" => "CUSTOMER-FAQ-FOOTER-1",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_ICON"]
            ],
            [
                "page_code" => "CUSTOMER-FAQ",
                "parent_code" => "CUSTOMER-FAQ-FOOTER",
                "code" => "CUSTOMER-FAQ-FOOTER-2",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_ICON"]
            ],
            [
                "page_code" => "CUSTOMER-FAQ",
                "parent_code" => "CUSTOMER-FAQ-FOOTER",
                "code" => "CUSTOMER-FAQ-FOOTER-3",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_ICON"]
            ],
            // end cau-hoi-thuong-gap



            // khuyen-mai
            [
                "page_code" => "NEWS-PROMOTIONS",
                "parent_code" => "",
                "code" => "NEWS-PROMOTIONS-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "NEWS-PROMOTIONS",
                "parent_code" => "",
                "code" => "NEWS-PROMOTIONS-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "NEWS-PROMOTIONS",
                "parent_code" => "",
                "code" => "NEWS-PROMOTIONS-GENERAL-DETAIL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_PHOTO", "TYPE_URL"]
            ],
            [
                "page_code" => "NEWS-PROMOTIONS",
                "parent_code" => "",
                "code" => "NEWS-PROMOTIONS-SIGN-UP",
                "types" => ["TYPE_NAME", "TYPE_URL"]
            ],
            [
                "page_code" => "NEWS-PROMOTIONS",
                "parent_code" => "",
                "code" => "NEWS-PROMOTIONS-FOOTER",
                "types" => ["TYPE_NAME", "TYPE_URL", "TYPE_PHOTO"]
            ],
            // end khuyen-mai



            // tieu-khoan-va-dieu-kien-giao-dich-chung
            [
                "page_code" => "TERMS-AND-CONDITION",
                "parent_code" => "",
                "code" => "TERMS-AND-CONDITION-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "TERMS-AND-CONDITION",
                "parent_code" => "",
                "code" => "TERMS-AND-CONDITION-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION", "TYPE_CONTENT", "TYPE_URL"]
            ],
            // end tieu-khoan-va-dieu-kien-giao-dich-chung



            // canh-bao-bao-mat
            [
                "page_code" => "CONFIDENTIALITY-NOTICE",
                "parent_code" => "",
                "code" => "CONFIDENTIALITY-NOTICE-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "CONFIDENTIALITY-NOTICE",
                "parent_code" => "",
                "code" => "CONFIDENTIALITY-NOTICE-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            // end canh-bao-bao-mat


            
            // search
            [
                "page_code" => "SEARCH-RESULT",
                "parent_code" => "",
                "code" => "SEARCH-RESULT-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "SEARCH-RESULT",
                "parent_code" => "",
                "code" => "SEARCH-RESULT-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "SEARCH-RESULT",
                "parent_code" => "",
                "code" => "SEARCH-RESULT-CONTACT",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            // End search
            


            // Gia nhap Easy credit
            [
                "page_code" => "JOIN-EASY-CREDIT",
                "parent_code" => "",
                "code" => "JOIN-EASY-CREDIT-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "JOIN-EASY-CREDIT",
                "parent_code" => "",
                "code" => "JOIN-EASY-CREDIT-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT"]
            ],
            [
                "page_code" => "JOIN-EASY-CREDIT",
                "parent_code" => "JOIN-EASY-CREDIT-GENERAL",
                "code" => "JOIN-EASY-CREDIT-GENERAL-1",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_URL"]
            ],
            [
                "page_code" => "JOIN-EASY-CREDIT",
                "parent_code" => "JOIN-EASY-CREDIT-GENERAL",
                "code" => "JOIN-EASY-CREDIT-GENERAL-2",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_URL"]
            ],
            [
                "page_code" => "JOIN-EASY-CREDIT",
                "parent_code" => "JOIN-EASY-CREDIT-GENERAL",
                "code" => "JOIN-EASY-CREDIT-GENERAL-3",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_URL"]
            ],
            [
                "page_code" => "JOIN-EASY-CREDIT",
                "parent_code" => "JOIN-EASY-CREDIT-GENERAL",
                "code" => "JOIN-EASY-CREDIT-GENERAL-4",
                "types" => ["TYPE_NAME", "TYPE_PHOTO", "TYPE_URL"]
            ],
            [
                "page_code" => "JOIN-EASY-CREDIT",
                "parent_code" => "",
                "code" => "JOIN-EASY-CREDIT-URL",
                "types" => ["TYPE_NAME", "TYPE_URL"]
            ],
            // End Gia nhap easy credit



            // tin-tuc
            [
                "page_code" => "NEWS",
                "parent_code" => "",
                "code" => "NEWS-BANNER",
                "types" => ["TYPE_NAME", "TYPE_PHOTO"]
            ],
            [
                "page_code" => "NEWS",
                "parent_code" => "",
                "code" => "NEWS-GENERAL",
                "types" => ["TYPE_NAME", "TYPE_DESCRIPTION"]
            ],
            [
                "page_code" => "NEWS",
                "parent_code" => "",
                "code" => "NEWS-GENERAL-DETAIL",
                "types" => ["TYPE_NAME", "TYPE_CONTENT", "TYPE_PHOTO", "TYPE_URL"]
            ],
            [
                "page_code" => "NEWS",
                "parent_code" => "",
                "code" => "NEWS-SIGN-UP",
                "types" => ["TYPE_NAME", "TYPE_URL"]
            ],
            [
                "page_code" => "NEWS",
                "parent_code" => "",
                "code" => "NEWS-FOOTER",
                "types" => ["TYPE_NAME", "TYPE_URL", "TYPE_PHOTO"]
            ],
            // end tin-tuc
        ];

        $position = 0;
        foreach ($pageBlocks as $key => $pageBlock) {
            if ($this->checkExistByCode($pageBlock['code'])) {
                continue;
            }

            if ($pageBlocks[$position]['page_code'] != $pageBlock['page_code']) {
                $position = 0;
            }

            $pageBlock['position'] = $position;
            $pageBlock['page_id'] = $this->getIdPageByCode($pageBlock['page_code']);
            if ($pageBlock['parent_code']) {
                $pageBlock['parent_id'] = $this->getIdPageBlockByCode($pageBlock['parent_code']);
            }
            $pageBlock['types'] = json_encode($pageBlock['types']);
            unset($pageBlock['page_code']);
            unset($pageBlock['parent_code']);
            PageBlock::create($pageBlock);

            // Add Translation

            $position++;
        }
    }

    private function getIdPageByCode($code)
    {
        return Page::where('code', $code)->first()->id;
    }

    private function getIdPageBlockByCode($code)
    {
        return PageBlock::where('code', $code)->first()->id;
    }

    private function checkExistByCode($code)
    {
        return (PageBlock::where('code', $code)->first()) ? true : false;
    }
}
