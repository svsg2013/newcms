INSERT INTO `news_categories` (`id`, `code`, `position`, `created_at`, `updated_at`, `parent_id`) VALUES
	(1, '1', 0, '2018-08-13 14:42:05', '2018-08-13 14:42:26', NULL),
	(2, '2', 0, '2018-08-13 14:42:58', '2018-08-13 14:58:58', NULL),
	(3, '2', 0, '2018-08-13 14:43:27', '2018-08-13 14:59:05', NULL);
    (4, '3', 0, '2018-08-13 14:44:14', '2018-08-13 15:00:00', NULL);

INSERT INTO `news_category_translation` (`id`, `news_category_id`, `locale`, `slug`, `name`) VALUES
	(1, 1, 'en', 'promotion', 'Promotion'),
	(2, 1, 'vi', 'khuyen-mai', 'Khuyến mãi'),
	(3, 2, 'en', 'personal-information', 'Personal information'),
	(4, 2, 'vi', 'thong-tin-nhan-su', 'Thông tin nhân sự'),
	(5, 3, 'en', 'recruitment-consultant', 'Recruitment Consultant'),
	(6, 3, 'vi', 'tu-van-tuyen-dung', 'Tư vấn tuyển dụng');
    (7, 4, 'en', 'news', 'News'),
	(8, 4, 'vi', 'tin-tuc', 'Tin tức');

